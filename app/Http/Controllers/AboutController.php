<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutComponent;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $about;

    public function createOrUpdateContent(Request $request)
    {
        $this->about = About::where('name', 'about_content')->first();

        if ($this->about) {
            $this->validate($request, [
                'name' => 'nullable|string|exists:abouts,name',
                'page_title' => 'required|string',
                'object' => 'nullable|string',
                'object_status' => 'nullable|boolean'
            ]);

            About::updateContent($request);
            return response()->json(['message' => 'About contents updated successfully.']);
        } else {
            if (count(About::all()) < 1) {
                $this->validate($request, [
                    'name' => 'nullable|string|unique:abouts,name',
                    'page_title' => 'required|string',
                    'object' => 'nullable|string',
                    'object_status' => 'nullable|boolean'
                ]);

                About::createNew($request);
                return response()->json(['message' => 'About contents created successfully.']);
            } else {
                return response()->json(['message' => 'You are trying something wrong.']);
            }
        }
    }

    public function getContent()
    {
        return response()->json(['aboutContent' => About::where('name', 'about_content')->first()]);
    }

    public function newComponent(Request $request)
    {
        $this->validate($request,[
            'field_name'=>'required|string',
            'field_type'=>'required|boolean',
            'field_status'=>'required|boolean'
        ]);
        if ($request->field_type){
            $this->validate($request,[
                'field_value'=>'required|date|date_format:Y-m-d'
            ]);
        }else{
            $this->validate($request,[
                'field_value'=>'required|string'
            ]);
        }
        AboutComponent::createNew($request);
        return response()->json(['message'=>'New component created successfully.']);
    }
}
