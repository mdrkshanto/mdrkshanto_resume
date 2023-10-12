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
            return response()->json(['message' => 'About contents updated successfully.'],200);
        } else {
            if (count(About::all()) < 1) {
                $this->validate($request, [
                    'name' => 'nullable|string|unique:abouts,name',
                    'page_title' => 'required|string',
                    'object' => 'nullable|string',
                    'object_status' => 'nullable|boolean'
                ]);

                About::createNew($request);
                return response()->json(['message' => 'About contents created successfully.'],200);
            } else {
                return response()->json(['message' => 'You are trying something wrong.'],200);
            }
        }
    }

    public function getContent()
    {
        return response()->json(['aboutContent' => About::where('name', 'about_content')->first()],200);
    }

    public function newComponent(Request $request)
    {
//        return strtotime('1990-03-09');

        if ($request->field_type) {
            $this->validate($request, [
                'field_name' => 'required|string',
                'field_value' => 'required|date|date_format:Y-m-d',
                'field_type' => 'required|boolean',
                'field_status' => 'required|boolean'
            ]);
        } else {
            $this->validate($request, [
                'field_name' => 'required|string',
                'field_value' => 'required|string',
                'field_type' => 'required|boolean',
                'field_status' => 'required|boolean'
            ]);
        }
        AboutComponent::createNew($request);
        return response()->json(['message' => 'New component created successfully.'],200);
    }

    public function getComponents()
    {
        return response()->json(['aboutComponents'=>AboutComponent::all()],200);
    }

    public function getComponent($id){
        return response()->json(['aboutComponent'=>AboutComponent::find($id)],200);
    }

    public function updateComponent(Request $request, $id)
    {
        if ($request->field_type) {
            $this->validate($request, [
                'field_name' => 'required|string',
                'field_value' => 'required|date|date_format:Y-m-d',
                'field_type' => 'required|boolean',
                'field_status' => 'required|boolean'
            ]);
        } else {
            $this->validate($request, [
                'field_name' => 'required|string',
                'field_value' => 'required|string',
                'field_type' => 'required|boolean',
                'field_status' => 'required|boolean'
            ]);
        }
        AboutComponent::updateComponent($request, $id);
        return response()->json(['message'=>'The component updated successfully.'],200);
    }

    public function deleteComponent($id)
    {
        AboutComponent::deleteComponent($id);
        return response()->json(['message'=>'The component deleted successfully.'],200);
    }
}
