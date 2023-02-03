<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomInformation;
use Illuminate\Support\Facades\Validator;

class RoomInformationController extends Controller
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
            "amenities_ensuite"=> "boolean",
            "furnishings"=> "boolean",
            "short_term_let"=> "boolean",
            "reference_required"=> "boolean",
            "bills_included"=> "boolean",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),

            ], 422);
        }

        $user = auth("sanctum")->user();


        $property = new RoomInformation();
        $property->property_id = $request->property_id;
        $property->room_cost = $request->room_cost;
        $property->cost_duration = $request->cost_duration;
        $property->room_size = $request->room_size;
        $property->amenities_ensuite = $request->amenities_ensuite;
        $property->furnishings = $request->furnishings;
        $property->security_deposits = $request->security_deposits;
        $property->min_stay = $request->min_stay;
        $property->max_stay = $request->max_stay;
        $property->short_term_let = $request->short_term_let;
        $property->short_term_let_duration = $request->short_term_let_duration;
        $property->reference_required = $request->reference_required;
        $property->bills_included = $request->bills_included;
        $property->internet_included = $request->internet_included;


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
     * @param  \App\Models\RoomInformation  $roomInformation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return RoomInformation::where("id", $id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomInformation  $roomInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomInformation $roomInformation)
    {


        if ($request->has('room_cost') && $request->filled('room_cost') && !is_null($request->room_cost)) {
            $roomInformation->room_cost = $request->room_cost;
        }

        if ($request->has('cost_duration') && $request->filled('cost_duration') && !is_null($request->cost_duration)) {
            $roomInformation->cost_duration = $request->cost_duration;
        }
        if ($request->has('room_size') && $request->filled('room_size') && !is_null($request->room_size)) {
            $roomInformation->room_size = $request->room_size;
        }

        if ($request->has('amenities_ensuite') && $request->filled('amenities_ensuite') && !is_null($request->amenities_ensuite)) {
            $roomInformation->amenities_ensuite = $request->amenities_ensuite;
        }
        if ($request->has('furnishings') && $request->filled('furnishings') && !is_null($request->furnishings)) {
            $roomInformation->furnishings = $request->furnishings;
        }

        if ($request->has('security_deposits') && $request->filled('security_deposits') && !is_null($request->security_deposits)) {
            $roomInformation->security_deposits = $request->security_deposits;
        }
        if ($request->has('min_stay') && $request->filled('min_stay') && !is_null($request->min_stay)) {
            $roomInformation->min_stay = $request->min_stay;
        }

        if ($request->has('max_stay') && $request->filled('max_stay') && !is_null($request->max_stay)) {
            $roomInformation->max_stay = $request->max_stay;
        }
        if ($request->has('short_term_let') && $request->filled('short_term_let') && !is_null($request->short_term_let)) {
            $roomInformation->short_term_let = $request->short_term_let;
        }

        if ($request->has('short_term_let_duration') && $request->filled('short_term_let_duration') && !is_null($request->short_term_let_duration)) {
            $roomInformation->short_term_let_duration = $request->short_term_let_duration;
        }
        if ($request->has('reference_required') && $request->filled('reference_required') && !is_null($request->reference_required)) {
            $roomInformation->reference_required = $request->reference_required;
        }

        if ($request->has('bills_included') && $request->filled('bills_included') && !is_null($request->bills_included)) {
            $roomInformation->bills_included = $request->bills_included;
        }

        if ($request->has('internet_included') && $request->filled('internet_included') && !is_null($request->internet_included)) {
            $roomInformation->internet_included = $request->internet_included;
        }



        $roomInformation->save();

        return response()->json([
            'status' => true,
            'message' => 'updated',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomInformation  $roomInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomInformation $roomInformation)
    {
        //
    }
}
