<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminHome extends Model
{
    use HasFactory;
    protected $guarded=[];

    private static $adminHome,$imageDirectory = 'images/home';

    protected static function createName($request)
    {
        self::$adminHome = new AdminHome();

        if ($request->file('image')){
            self::$adminHome->image = imageUrl($request->file('image'), self::$imageDirectory,600,600);
        }
        self::$adminHome->name = ucwords($request->name);
        self::$adminHome->save();
    }

    protected static function editName($request)
    {
        self::$adminHome = AdminHome::find(1);

        if ($request->file('image')){
            if (self::$adminHome->image){
                unlink(self::$adminHome->image);
            }
            self::$adminHome->image = imageUrl($request->file('image'), self::$imageDirectory,600,600);
        }
        self::$adminHome->name = ucwords($request->name);
        self::$adminHome->save();
    }

    public function subtitles()
    {
        return $this->hasMany(AdminHomeSubtitle::class);
    }
}
