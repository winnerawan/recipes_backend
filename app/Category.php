<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    public function menus()
    {
        return $this->hasMany(Menu::class, 'category_id');
    }

    public static function getCategoriesByUser($user_id)
    {
        $sql = "SELECT categories.id, categories.name FROM categories INNER JOIN apps ON apps.id = categories.app_id INNER JOIN users ON apps.id = users.id WHERE users.id = ".$user_id;
        return DB::select($sql);
    }

    public static function getCategoryByIdAndUser($category_id, $user_id)
    {
        $sql = "SELECT categories.id, categories.name FROM categories INNER JOIN apps ON apps.id = categories.app_id INNER JOIN users ON apps.id = users.id WHERE users.id =".$user_id." AND categories.id = ".$category_id;
        return DB::statement($sql);
    }

    public static function getCategoriesByAppId($app_id)
    {
        return Category::where('app_id', '=', $app_id);
    }

    public static function getCategoryByIdAndAppId($category_id, $app_id)
    {
        $sql = "SELECT categories.id, categories.name FROM categories INNER JOIN apps ON apps.id = categories.app_id WHERE apps.id = ".$app_id."AND categories.id =".$category_id;
        return DB::statement($sql);
    }
}
