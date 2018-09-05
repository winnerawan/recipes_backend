<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Controllers\ApiController;
use App\Repository\Transformers\CategoryTransformer;

class CategoryController extends ApiController
{
    protected $categoryTransformer;

    public function __construct(categoryTransformer $categoryTransformer)
    {
        $this->categoryTransformer = $categoryTransformer;
    }

    public function categories($app_id)
    {
        $categories = Category::getCategoriesByAppId($app_id)->paginate(10);

        return $this->respondWithPagination($categories, [
            'categories' => $this->categoryTransformer->transformCollection($categories->all())
        ], 'Records Found!');
    }
}
