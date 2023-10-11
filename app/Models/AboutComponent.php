<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutComponent extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $about, $aboutComponent;

    protected static function createNew($request)
    {
        self::$about = About::where('name', 'about_content')->first();

        self::$aboutComponent = new AboutComponent();

        self::$aboutComponent->about_id = self::$about->id;
        self::$aboutComponent->field_name = $request->field_name;
        self::$aboutComponent->field_value = $request->field_type ? strtotime(date('Y-m-d',$request->field_value)) : $request->field_value;
        self::$aboutComponent->field_type = $request->field_type ? 1 : 0;
        self::$aboutComponent->field_status = $request->field_status ? 1 : 0;
        self::$aboutComponent->save();
    }
}
