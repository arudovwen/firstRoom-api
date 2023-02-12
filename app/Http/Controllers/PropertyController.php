<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Interaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\PropertyCreated;
use App\Notifications\PropertyApproved;
use App\Http\Resources\PropertyResource;
use Illuminate\Support\Facades\Validator;
use App\Notifications\PropertyDisapproved;
use App\Notifications\PropertyViewed;
use Illuminate\Support\Facades\Notification;

class PropertyController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:sanctum')->except("index", "store", "show", "getProperty");
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 10;
        $status = "";
        $search = "";
        $location = "";
        $is_active = 0;

        if ($request->limit && $request->has("limit")) {
            $limit =  $request->limit;
        }
        if ($request->search && $request->has("search")) {
            $search =  $request->search;
        }
        if ($request->status && $request->has("status")) {
            $status =  $request->status;
        }
        if ($request->is_active && $request->has("is_active")) {
            $is_active =  $request->is_active;
        }

        return Property::whereLike("property_title", $search)
            ->with("propertyInfo")
            ->whereLike("status", $status)
            ->where("is_active", $is_active)
            ->paginate($limit);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return  DB::transaction(function () use ($request) {
            $validator = Validator::make($request->all(), [
                'property_title' => 'required',
                'property_description' => 'required',
                'posting_type' => '',
                'property_type' => 'required',
                'advert_type' => 'required',
                'location' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),

                ], 422);
            }

            $user = auth("sanctum")->user();
            $subscription = $user->subscription()->first();

            if (!$subscription->max_usage && !$user->is_admin) {
                return response()->json([
                    'status' => false,
                    'message' => 'No active plan',

                ]);
            }
            $property = new Property();
            $property->property_title = $request->property_title;
            $property->property_description = $request->property_description;
            $property->posting_type = $request->posting_type;
            $property->property_type = $request->property_type;
            $property->location = $request->location;
            $property->advert_type = $request->advert_type;
            $property->user_id = !is_null($user) ? $user->id : null;
            $property->save();

            if ($subscription->max_usage && !$user->is_admin) {
                $subscription->max_usage = $subscription->max_usage - 1;
                $subscription->save();
            }
            $detail = [
                "message" =>  "New listing has been created with title, " . $request->property_title
            ];
            Notification::send($user, new PropertyCreated($detail));
            return response()->json([
                'status' => true,
                'message' => 'created',
                'data' =>  $property->id
            ]);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Property::where("id", $id)->first();

        return  response()->json([
            "status" => true,
            "message" => "success",
            "data" => $data
        ]);
    }
    public function getProperty($id)
    {
        $user = auth("sanctum")->user();
        $data = Property::where("id", $id)->with("propertyInfo", "user", "roomInfo", "extraInfo", "exixtingFlatmate", "reviews")->first();

        if (!$user->is_admin) {
            //handle interaction
            $interaction = new Interaction();
            $interaction->user_id = !is_null($user) ? $user->id : null;
            $interaction->property_id = $id;
            $interaction->save();

            $property = Property::find($id);
            $detail = [
                "message" =>  "Someone just viewed your listing  with title, " . $property->property_title
            ];

            Notification::send($user, new PropertyViewed($detail));
        }

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


        if ($request->has('location') && $request->filled('location') && !is_null($request->location)) {
            $property->location = $request->location;
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

    public function approveProperty(Request $request, Property $property)
    {

        $user = auth("sanctum")->user();
        $property = Property::where("id", $request->property_id)->first();
        $property->status = "approved";
        $property->save();
        $detail = [
            "message" =>  "Your listing  with title, " . $property->property_title . " has been approved"
        ];
        Notification::send($user, new PropertyApproved($detail));
        return response()->json([
            'status' => true,
            'message' => 'approved',

        ]);
    }
    public function disApproveProperty(Request $request, Property $property)
    {
        $user = auth("sanctum")->user();

        $property = Property::where("id", $request->property_id)->first();
        $property->status = "unapproved";
        $property->save();
        $detail = [
            "message" =>  "Your listing  with title, " . $property->property_title . " has been rejected"
        ];
        Notification::send($user, new PropertyDisapproved($detail));
        return response()->json([
            'status' => true,
            'message' => 'approved',

        ]);
    }
}
