<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminHomeSubtitle extends Model
{
    use HasFactory;

    private static $subtitle;

    protected static function createNew($request)
    {
        self::$subtitle = new AdminHomeSubtitle();

        self::$subtitle->admin_home_id = 1;
        self::$subtitle->subtitle = ucwords($request->subtitle);
        self::$subtitle->save();
    }

    protected static function deleteOne($id)
    {
        AdminHomeSubtitle::destroy($id);
    }

    public function homeName(){
        return $this->belongsTo(AdminHome::class);
    }
}
