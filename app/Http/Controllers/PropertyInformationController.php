<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyInformation;
use Illuminate\Support\Facades\Validator;

class PropertyInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
           
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),

            ], 422);
        }

        $user = auth("sanctum")->user();
       

        $property = new PropertyInformation();
        $property->property_id = $request->property_id;
        $property->property_images = $request->property_images;
        $property->rooms_for_rent = $request->rooms_for_rent;
        $property->type_of_property = $request->type_of_property;
        $property->amenities = $request->amenities;
        $property->no_of_beds = $request->no_of_beds;
        $property->present_occupants = $request->present_occupants;
        $property->property_postcode = $request->property_postcode;
        $property->property_address = $request->property_address;
        $property->property_poster = $request->property_poster;
        $property->property_area = $request->property_area;
        $property->shared_living_room = $request->shared_living_room;
        $property->save();

        return response()->json([
            'status' => true,
            'message' => 'created',
            'data' =>  $property->property_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyInformation  $propertyInformation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PropertyInformation::where("property_id", $id)->first();
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyInformation  $propertyInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyInformation $propertyInformation)
    {

    
   
        if ($request->has('property_images') && $request->filled('property_images') && !is_null($request->property_images)) {
            $propertyInformation->property_images = $request->property_images;
        }

        if ($request->has('rooms_for_rent') && $request->filled('rooms_for_rent') && !is_null($request->rooms_for_rent)) {
            $propertyInformation->rooms_for_rent = $request->rooms_for_rent;
        }

        if ($request->has('type_of_property') && $request->filled('type_of_property') && !is_null($request->type_of_property)) {
            $propertyInformation->type_of_property = $request->type_of_property;
        }

        if ($request->has('amenities') && $request->filled('amenities') && !is_null($request->amenities)) {
            $propertyInformation->amenities = $request->amenities;
        }

        if ($request->has('no_of_beds') && $request->filled('no_of_beds') && !is_null($request->no_of_beds)) {
            $propertyInformation->no_of_beds = $request->no_of_beds;
        }
        if ($request->has('present_occupants') && $request->filled('present_occupants') && !is_null($request->present_occupants)) {
            $propertyInformation->present_occupants = $request->present_occupants;
        }

        if ($request->has('property_postcode') && $request->filled('property_postcode') && !is_null($request->property_postcode)) {
            $propertyInformation->property_postcode = $request->property_postcode;
        }

        if ($request->has('property_address') && $request->filled('property_address') && !is_null($request->property_address)) {
            $propertyInformation->property_address = $request->property_address;
        }

        if ($request->has('property_poster') && $request->filled('property_poster') && !is_null($request->property_poster)) {
            $propertyInformation->property_poster = $request->property_poster;
        }

        if ($request->has('property_area') && $request->filled('property_area') && !is_null($request->property_area)) {
            $propertyInformation->property_area = $request->property_area;
        }
        if ($request->has('shared_living_room') && $request->filled('shared_living_room') && !is_null($request->shared_living_room)) {
            $propertyInformation->shared_living_room = $request->shared_living_room;
        }


        $propertyInformation->save();

        return response()->json([
            'status' => true,
            'message' => 'updated',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyInformation  $propertyInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyInformation $propertyInformation)
    {
        //
    }
}
