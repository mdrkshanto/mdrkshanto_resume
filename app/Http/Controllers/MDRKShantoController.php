<?php

namespace App\Http\Controllers;

use App\Models\AdminHome;
use App\Models\AdminHomeSubtitle;
use App\Models\HomeButton;
use App\Models\SocialMediaLink;
use Illuminate\Http\Request;

class MDRKShantoController extends Controller
{
    private $homeName, $homeSubtitles, $socialMedias, $homeDownloadButton, $homeContactButton;

    public function index()
    {
        return view('welcome');
    }

    public function getContents()
    {
        $this->homeName = AdminHome::find(1, ['image', 'name']);
        $this->homeSubtitles = AdminHomeSubtitle::orderBy('subtitle', 'asc')->get(['subtitle']);
        $this->socialMedias = SocialMediaLink::orderBy('name', 'asc')->get(['name', 'icon', 'link']);
        $this->homeDownloadButton = HomeButton::where('name','download')->first('status','link');
        $this->homeContactButton = HomeButton::where('name','contact')->first('status','link');


        return response()->json([
            'name' => $this->homeName,
            'homeSubtitles' => $this->homeSubtitles,
            'socialMedias' => $this->socialMedias,
            'homeDownloadButton' => $this->homeDownloadButton,
            'homeContactButton' => $this->homeContactButton
        ], 200);
    }
}
