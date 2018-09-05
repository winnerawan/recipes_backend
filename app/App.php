<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class App extends Model
{
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public static function getApps()
    {
        return App::all();
    }

    public static function getAppByUser($user_id)
    {
        $sql = "SELECT apps.id, apps.name FROM apps INNER JOIN users ON apps.id = users.id WHERE users.id = ".$user_id;
        return DB::select($sql);
    }
}
