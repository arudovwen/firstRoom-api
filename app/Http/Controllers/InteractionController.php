<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use App\Models\Interactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InteractionController extends Controller
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
            "property_id" => "required|exists:properties,id",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),

            ], 422);
        }
        $user = auth("sanctum")->user();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interactions  $interactions
     * @return \Illuminate\Http\Response
     */
    public function show($property_id)
    {


        $data = Interaction::where("property_id", $property_id)->with("user")->get();

        return response()->json([
            "status" => true,
            "message" => "created",
            "count" => count($data),
            "data" => $data

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interactions  $interactions
     * @return \Illuminate\Http\Response
     */
    public function edit(Interactions $interactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interactions  $interactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interactions $interactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interactions  $interactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interactions $interactions)
    {
        //
    }
}
