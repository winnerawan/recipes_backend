<?php

namespace App\Repository\Transformers;

class MenuTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'body' => $item->body,
            'image' => $item->image
        ];
    }
}