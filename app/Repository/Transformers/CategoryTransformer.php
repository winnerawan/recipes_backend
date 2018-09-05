<?php
namespace App\Repository\Transformers;

class CategoryTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'id' => $item->id,
            'name' => $item->name
        ];
    }
}