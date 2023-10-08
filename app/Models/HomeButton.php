<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeButton extends Model
{
    use HasFactory;

    private static $homeButton;

    protected static function createNew($request)
    {
        self::$homeButton = new HomeButton();
        self::$homeButton->name = $request->name;
        self::$homeButton->link = $request->link;
        self::$homeButton->save();
    }

    protected static function editButton($request)
    {
        self::$homeButton = HomeButton::where('name', $request->name)->first();

        self::$homeButton->link = $request->link;
        self::$homeButton->status = $request->status ? 1 : 0;
        self::$homeButton->save();
    }
}
