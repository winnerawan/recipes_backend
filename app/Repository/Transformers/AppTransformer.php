<?php
namespace App\Repository\Transformers;

class AppTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'id' => $item->id,
            'name' => $item->name
        ];
    }
}