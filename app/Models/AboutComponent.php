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
        self::$aboutComponent->field_value = $request->field_type ? date('Y-m-d', strtotime($request->field_value)) : $request->field_value;
        self::$aboutComponent->field_type = boolval($request->field_type);
        self::$aboutComponent->field_status = boolval($request->field_status);
        self::$aboutComponent->save();
    }

    protected static function updateComponent($request, $id)
    {
        self::$about = About::where('name', 'about_content')->first();

        self::$aboutComponent = AboutComponent::find($id);

        self::$aboutComponent->about_id = self::$about->id;
        self::$aboutComponent->field_name = $request->field_name;
        self::$aboutComponent->field_value = $request->field_type ? date('Y-m-d', strtotime($request->field_value)) : $request->field_value;
        self::$aboutComponent->field_type = boolval($request->field_type);
        self::$aboutComponent->field_status = boolval($request->field_status);
        self::$aboutComponent->save();
    }

    protected static function deleteComponent($id)
    {
        AboutComponent::destroy($id);
    }


    public function about()
    {
        $this->belongsTo(About::class);
    }
}
