<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth("sanctum")->user();
        $data =  $user->favourites()->with("property")->get();
        return response()->json([
            "status" => true,
            "message" => count($data) . " found",
            "data" => $data
        ]);
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
        $check = $user->favourites()->where("property_id", $request->property_id)->first();
        if (!is_null($check)) {
            return response()->json([
                "status" => false,
                "message" => "already added",

            ]);
        } else {
            $favourite = new Favourite();
            $favourite->user_id = $user->id;
            $favourite->property_id = $request->property_id;
            $favourite->save();
            return response()->json([
                "status" => true,
                "message" => "created",

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function show(Favourite $favourite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favourite $favourite)
    {
        $favourite->delete();
        return response()->json([
            "status" => true,
            "message" => "removed",

        ]);
    }
}
