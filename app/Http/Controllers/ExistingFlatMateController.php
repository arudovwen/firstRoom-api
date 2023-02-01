<?php

namespace App\Http\Controllers;

use App\Models\ExistingFlatMate;
use Illuminate\Http\Request;

class ExistingFlatMateController extends Controller
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


        $validator = Validator::make($request->all(), []);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),

            ], 422);
        }

        $user = auth("sanctum")->user();


        $property = new ExistingFlatMate();
        $property->property_id = $request->property_id;
        $property->smoking = $request->smoking;
        $property->gender = $request->gender;
        $property->occupation = $request->occupation;
        $property->pets = $request->pets;
        $property->age = $request->age;
        $property->language = $request->language;
        $property->nationality = $request->nationality;
        $property->sexual_orientation = $request->sexual_orientation;
        $property->interests = $request->interests;
        $property->min_age = $request->min_age;
        $property->max_age = $request->max_age;
        $property->vegetarian_preferred = $request->vegetarian_preferred;
        $property->couples_welcome = $request->couples_welcome;
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
     * @param  \App\Models\ExistingFlatMate  $existingFlatMate
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        return ExistingFlatMate::where("property_id", $id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExistingFlatMate  $existingFlatMate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExistingFlatMate $existingFlatMate)
    {

        if ($request->has('smoking') && $request->filled('smoking') && !is_null($request->smoking)) {
            $existingFlatMate->smoking = $request->smoking;
        }

        if ($request->has('gender') && $request->filled('gender') && !is_null($request->gender)) {
            $existingFlatMate->gender = $request->gender;
        }

        if ($request->has('occupation') && $request->filled('occupation') && !is_null($request->occupation)) {
            $existingFlatMate->occupation = $request->occupation;
        }

        if ($request->has('pets') && $request->filled('pets') && !is_null($request->pets)) {
            $existingFlatMate->pets = $request->pets;
        }

        if ($request->has('age') && $request->filled('age') && !is_null($request->age)) {
            $existingFlatMate->age = $request->age;
        }

        if ($request->has('language') && $request->filled('language') && !is_null($request->language)) {
            $existingFlatMate->language = $request->language;
        }

        if ($request->has('nationality') && $request->filled('nationality') && !is_null($request->nationality)) {
            $existingFlatMate->nationality = $request->nationality;
        }
        if ($request->has('sexual_orientation') && $request->filled('sexual_orientation') && !is_null($request->sexual_orientation)) {
            $existingFlatMate->sexual_orientation = $request->sexual_orientation;
        }

        if ($request->has('interests') && $request->filled('interests') && !is_null($request->interests)) {
            $existingFlatMate->interests = $request->interests;
        }

        if ($request->has('min_age') && $request->filled('min_age') && !is_null($request->min_age)) {
            $existingFlatMate->min_age = $request->min_age;
        }

        if ($request->has('max_age') && $request->filled('max_age') && !is_null($request->max_age)) {
            $existingFlatMate->max_age = $request->max_age;
        }

        if ($request->has('vegetarian_preferred') && $request->filled('vegetarian_preferred') && !is_null($request->vegetarian_preferred)) {
            $existingFlatMate->vegetarian_preferred = $request->vegetarian_preferred;
        }
        if ($request->has('couples_welcome') && $request->filled('couples_welcome') && !is_null($request->couples_welcome)) {
            $existingFlatMate->couples_welcome = $request->couples_welcome;
        }


        $existingFlatMate->save();

        return response()->json([
            'status' => true,
            'message' => 'updated',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExistingFlatMate  $existingFlatMate
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExistingFlatMate $existingFlatMate)
    {
        //
    }
}
