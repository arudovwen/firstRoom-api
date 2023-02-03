<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExtraInformation;
use Illuminate\Support\Facades\Validator;

class ExtraInformationController extends Controller
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
            "display_phone" => "boolean",

        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),

            ], 422);
        }

        $user = auth("sanctum")->user();
     
        $property = new ExtraInformation();
        $property->property_id = $request->property_id;
        $property->display_phone = $request->display_phone;
        $property->where_you_heard_about_us = $request->where_you_heard_about_us;
        
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
     * @param  \App\Models\ExtraInformation  $extraInformation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ExtraInformation::where("id", $id)->first();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExtraInformation  $extraInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(ExtraInformation $extraInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExtraInformation  $extraInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExtraInformation $extraInformation)
    {
        if ($request->has('display_phone') && $request->filled('display_phone') && !is_null($request->display_phone)) {
            $extraInformation->display_phone = $request->display_phone;
        }

        if ($request->has('where_you_heard_about_us') && $request->filled('where_you_heard_about_us') && !is_null($request->where_you_heard_about_us)) {
            $extraInformation->where_you_heard_about_us = $request->where_you_heard_about_us;
        }
        $extraInformation->save();

        return response()->json([
            'status' => true,
            'message' => 'updated',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExtraInformation  $extraInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExtraInformation $extraInformation)
    {
        //
    }
}
