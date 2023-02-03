<?php

namespace App\Http\Controllers;

use App\Models\NewFlatMate;
use Illuminate\Http\Request;

class NewFlatMateController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            "smoking" => "boolean",
            "vegetarian_preferred" => "boolean",
            "pets" => "boolean"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),

            ], 422);
        }

        $user = auth("sanctum")->user();


        $property = new NewFlatMate();
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
     * @param  \App\Models\NewFlatMate  $newFlatMate
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        return NewFlatMate::where("id", $id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewFlatMate  $newFlatMate
     * @return \Illuminate\Http\Response
     */
    public function edit(NewFlatMate $newFlatMate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewFlatMate  $newFlatMate
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,  $id)
    {
        $newFlatMate = NewFlatMate::find($id);

        if ($request->has('smoking') && $request->filled('smoking') && !is_null($request->smoking)) {
            $newFlatMate->smoking = $request->smoking;
        }

        if ($request->has('gender') && $request->filled('gender') && !is_null($request->gender)) {
            $newFlatMate->gender = $request->gender;
        }

        if ($request->has('occupation') && $request->filled('occupation') && !is_null($request->occupation)) {
            $newFlatMate->occupation = $request->occupation;
        }

        if ($request->has('pets') && $request->filled('pets') && !is_null($request->pets)) {
            $newFlatMate->pets = $request->pets;
        }

        if ($request->has('age') && $request->filled('age') && !is_null($request->age)) {
            $newFlatMate->age = $request->age;
        }

        if ($request->has('language') && $request->filled('language') && !is_null($request->language)) {
            $newFlatMate->language = $request->language;
        }

        if ($request->has('nationality') && $request->filled('nationality') && !is_null($request->nationality)) {
            $newFlatMate->nationality = $request->nationality;
        }
        if ($request->has('sexual_orientation') && $request->filled('sexual_orientation') && !is_null($request->sexual_orientation)) {
            $newFlatMate->sexual_orientation = $request->sexual_orientation;
        }

        if ($request->has('interests') && $request->filled('interests') && !is_null($request->interests)) {
            $newFlatMate->interests = $request->interests;
        }

        if ($request->has('min_age') && $request->filled('min_age') && !is_null($request->min_age)) {
            $newFlatMate->min_age = $request->min_age;
        }

        if ($request->has('max_age') && $request->filled('max_age') && !is_null($request->max_age)) {
            $newFlatMate->max_age = $request->max_age;
        }

        if ($request->has('vegetarian_preferred') && $request->filled('vegetarian_preferred') && !is_null($request->vegetarian_preferred)) {
            $newFlatMate->vegetarian_preferred = $request->vegetarian_preferred;
        }

        if ($request->has('couples_welcome') && $request->filled('couples_welcome') && !is_null($request->couples_welcome)) {
            $newFlatMate->couples_welcome = $request->couples_welcome;
        }


        $newFlatMate->save();

        return response()->json([
            'status' => true,
            'message' => 'updated',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewFlatMate  $newFlatMate
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewFlatMate $newFlatMate)
    {
        //
    }
}
