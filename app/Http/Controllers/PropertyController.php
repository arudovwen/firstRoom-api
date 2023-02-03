<?php

namespace App\Http\Controllers;

use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 10;
        $search = "";
        if ($request->limit && $request->has("limit")) {
            $limit =  $request->limit;
        }
        if ($request->search && $request->has("search")) {
            $search =  $request->search;
        }

        return Property::whereLike("property_title", $search)->with("propertyInfo")->paginate($limit);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'property_title' => 'required',
            'property_description' => 'required',
            'posting_type' => '',
            'property_type' => 'required',
            'advert_type' => 'required',


        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),

            ], 422);
        }

        $user = auth("sanctum")->user();

        $property = new Property();
        $property->property_title = $request->property_title;
        $property->property_description = $request->property_description;
        $property->posting_type = $request->posting_type;
        $property->property_type = $request->property_type;
        $property->advert_type = $request->advert_type;
        $property->user_id = $user->id;
        $property->save();

        return response()->json([
            'status' => true,
            'message' => 'created',
            'data' =>  $property->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Property::where("id", $id)->with("propertyInfo", "user", "roomInfo", "extraInfo", "exixtingFlatmate")->first();

        return  response()->json([
            "status" => true,
            "message" => "success",
            "data" => new PropertyResource(collect($data))
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {


        if ($request->has('property_title') && $request->filled('property_title') && !is_null($request->property_title)) {
            $property->property_title = $request->property_title;
        }

        if ($request->has('property_description') && $request->filled('property_description') && !is_null($request->property_description)) {
            $property->property_description = $request->property_description;
        }

        if ($request->has('posting_type') && $request->filled('posting_type') && !is_null($request->posting_type)) {
            $property->posting_type = $request->posting_type;
        }

        if ($request->has('property_type') && $request->filled('property_type') && !is_null($request->property_type)) {
            $property->property_type = $request->property_type;
        }

        if ($request->has('advert_type') && $request->filled('advert_type') && !is_null($request->advert_type)) {
            $property->advert_type = $request->advert_type;
        }

        if ($request->has('is_active') && $request->filled('is_active') && !is_null($request->is_active)) {
            $property->is_active = $request->is_active;
        }

        $property->save();

        return response()->json([
            'status' => true,
            'message' => 'updated',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return response()->json([
            'status' => true,
            'message' => 'deleted',

        ]);
    }
}
