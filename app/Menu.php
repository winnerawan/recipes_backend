<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Menu extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public static function getMenusByAppId($app_id)
    {
        //$sql = "SELECT * FROM menus INNER JOIN categories ON categories.id = menus.category_id WHERE categories.app_id = ".$app_id;
        return DB::table("menus")->join("categories", "categories.id", '=', "menus.category_id")->where("categories.app_id", "=", $app_id)->addSelect("menus.id", "menus.name", "menus.body", "menus.image");
    }

    public static function getMenusByCategoryAndAppId($category_id, $app_id)
    {
        // $sql = "SELECT * FROM menus INNER JOIN categories ON categories.id = menus.category_id WHERE categories.id = ".$category_id." AND apps.id =".$app_id;
        return DB::table("menus")->join("categories", "categories.id", "=", "menus.category_id")->join("apps", "apps.id". "=", "categories.app_id")->where("categories.id", "=", $category_id)->where("apps.id", "=", $app_id);
    }

    public static function getDetailMenuByIdAndAppId($menu_id, $app_id)
    {
        $sql = "SELECT * FROM menus INNER JOIN INNER JOIN categories ON categories.id = menus.category_id WHERE menus.id = ".$menu_id." AND categories.app_id = ".$app_id;
        return DB::select($sql);
    }

    public static function getMenus()
    {
        return Menu::all();
    }

    public static function getMenuByCategory($category_id)
    {
        return Menu::where('category_id', '=', $category_id);
    }

    public static function getDetailMenu($id)
    {
        return Menu::find($id);
    }

}
