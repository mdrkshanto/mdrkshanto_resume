<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $about;

    protected static function createNew($request)
    {
        self::$about = new About();

        self::$about->name = 'about_content';
        self::$about->page_title = ucwords($request->page_title);
        self::$about->object = $request->object;
        self::$about->object_status = $request->object_status ? 1 : 0;
        self::$about->save();
    }

    protected static function updateContent($request)
    {
        self::$about = About::where('name', 'about_content')->first();
        self::$about->page_title = ucwords($request->page_title);
        self::$about->object = $request->object;
        self::$about->object_status = $request->object_status ? 1 : 0;
        self::$about->save();
    }
}
