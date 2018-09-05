<?php
namespace App\Repository\Transformers;

class UserTransformer extends Transformer {

    public function trnasform($item)
    {
        return [

            'id' => $item->id,
            'name' => $item->name,
            'email' => $item->email,
            'password' => $item->password,
            'app' => [
                'app_id' => $item->app->id,
                'app_name' => $item->app->name
            ]
        ];
    }
}