<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Menu;
use App\Http\Controllers\ApiController;
use App\Repository\Transformers\MenuTransformer;

class MenuController extends ApiController
{
    protected $menuTransformer;

    public function __construct(menuTransformer $menuTransformer)
    {
        return $this->menuTransformer = $menuTransformer;
    }

    public function menus($app_id)
    {
        $menus = Menu::getMenusByAppId($app_id)->paginate(10);
        return $this->respondWithPagination($menus, [
            'menus' => $this->menuTransformer->transformCollection($menus->all())
        ], 'Records Found!'); 
    }

    public function menusCategory($category_id, $app_id)
    {
        $menus = Menu::getMenusByCategoryAndAppId($category_id, $app_id)->paginate(10);
        return $this->respondWithPagination($menus, [
            'menus' => $this->menuTransformer->transformCollection($menus->all())
        ], 'Records Found!'); 
    }
}
