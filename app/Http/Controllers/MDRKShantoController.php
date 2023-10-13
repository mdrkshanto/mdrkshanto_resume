<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutComponent;
use App\Models\AdminHome;
use App\Models\AdminHomeSubtitle;
use App\Models\HomeButton;
use App\Models\SocialMediaLink;
use Illuminate\Http\Request;

class MDRKShantoController extends Controller
{
    private $homeName, $homeSubtitles, $socialMedias, $homeDownloadButton, $homeContactButton, $aboutContent, $aboutComponents;

    public function index()
    {
        return view('welcome');
    }

    public function getContents()
    {
        $this->homeName = AdminHome::find(1, ['image', 'name']);
        $this->homeSubtitles = AdminHomeSubtitle::orderBy('subtitle', 'asc')->get(['subtitle']);
        $this->socialMedias = SocialMediaLink::orderBy('name', 'asc')->get(['name', 'icon', 'link']);
        $this->homeDownloadButton = HomeButton::where('name', 'download')->first(['status', 'link']);
        $this->homeContactButton = HomeButton::where('name', 'contact')->first(['status', 'link']);

        $this->aboutContent = About::where('name', 'about_content')->first(['page_title', 'object', 'object_status']);
        $this->aboutComponents = AboutComponent::where('field_status', '1')->get(['field_name', 'field_value', 'field_type']);


        return response()->json([
            'name' => $this->homeName,
            'homeSubtitles' => $this->homeSubtitles,
            'socialMedias' => $this->socialMedias,
            'homeDownloadButton' => $this->homeDownloadButton,
            'homeContactButton' => $this->homeContactButton,
            'aboutContent' => $this->aboutContent,
            'aboutComponents' => $this->aboutComponents
        ], 200);
    }
}
