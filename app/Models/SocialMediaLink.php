<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaLink extends Model
{
    use HasFactory;

    private static $socialMedia;

    protected static function createNew($request)
    {
        self::$socialMedia = new SocialMediaLink();

        self::$socialMedia->admin_home_id = 1;
        self::$socialMedia->name = ucwords($request->name);
        self::$socialMedia->icon = $request->icon;
        self::$socialMedia->link = $request->link;
        self::$socialMedia->save();
    }

    protected static function deleteOne($id)
    {
        SocialMediaLink::destroy($id);
    }
}
