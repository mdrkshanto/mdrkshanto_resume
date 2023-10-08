<?php

namespace App\Http\Controllers;

use App\Models\AdminHome;
use App\Models\AdminHomeSubtitle;
use App\Models\HomeButton;
use App\Models\SocialMediaLink;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function createName(Request $request)
    {
        $this->validate($request, [
            'image' => 'nullable|image',
            'name' => 'required'
        ]);
        $countName = count(AdminHome::all());

        if ($countName < 1) {
            AdminHome::createName($request);
        } else {
            AdminHome::editName($request);
        }
        return response()->json(['message' => 'Submitted Successfully.'], 200);
    }

    public function getHomeName()
    {
        return response()->json(['homeName' => AdminHome::find(1, ['image', 'name'])], 200);
    }

    public function createSubtitle(Request $request)
    {
        $this->validate($request, [
            'subtitle' => 'required|string'
        ]);
        AdminHomeSubtitle::createNew($request);
        return response()->json(['message' => 'Subtitle Created Successfully.'], 200);
    }

    public function getSubtitles()
    {
        return response()->json(['subtitles' => AdminHomeSubtitle::orderBy('subtitle', 'asc')->get(['id', 'subtitle'])], 200);
    }

    public function deleteSubtitle($id)
    {
        AdminHomeSubtitle::deleteOne($id);
        return response()->json(['message' => 'Subtitle Deleted Successfully.'], 200);
    }

    public function createSocialMedia(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:social_media_links,name',
            'icon' => 'required|string|unique:social_media_links,icon',
            'link' => 'required|string|unique:social_media_links,link'
        ]);
        SocialMediaLink::createNew($request);
        return response()->json(['message' => 'Social Media Link Created Successfully.'], 200);
    }

    public function getSocialMedia()
    {
        return response()->json(['allSocialMedia' => SocialMediaLink::orderBy('name', 'asc')->get(['id', 'name', 'icon', 'link'])], 200);
    }

    public function deleteSocialMedia($id)
    {
        SocialMediaLink::deleteOne($id);
        return response()->json(['message' => 'Social Media Link Deleted Successfully.'], 200);
    }

    public function createOrUpdateButton(Request $request)
    {
        $homeButton = HomeButton::where('name', $request->name)->first();
        if ($homeButton) {
            $this->validate($request, [
                'name' => 'required|string|exists:home_buttons,name',
                'link' => 'nullable|string|unique:home_buttons,link,' . $homeButton->id,
                'status' => 'nullable|boolean',
            ]);
            HomeButton::editButton($request);
            return response()->json(['message' => 'Button Updated Successfully.'], 200);
        } else {
            if (count(HomeButton::all()) < 2) {
                $this->validate($request, [
                    'name' => 'required|string|unique:home_buttons,name',
                    'link' => 'nullable|string|unique:home_buttons,link'
                ]);
                HomeButton::createNew($request);
                return response()->json(['message' => 'Button Created Successfully.'], 200);
            } else {
                return response()->json(['message' => 'Maximum Amount of Buttons Has Exist.'], 200);
            }
        }

    }

    public function getDownloadButton()
    {
        return response()->json(['cvDownloadHomeButton' => HomeButton::where('name', 'download')->first(['link', 'status'])], 200);
    }

    public function getContactButton()
    {
        return response()->json(['contactHomeButton' => HomeButton::where('name', 'contact')->first(['link', 'status'])], 200);
    }


    public function test()
    {
        return response()->json(['homeName' => AdminHome::find(1)], 200);
    }
}
