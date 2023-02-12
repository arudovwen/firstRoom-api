<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 10;
        if ($request->limit && $request->has("limit")) {
            $limit =  $request->limit;
        }
        return Subscription::with("user")->paginate($limit);
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
            'plan_id' => 'required',
           
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),

            ], 422);
        }

        $user = auth("sanctum")->user();
        $subscription = $user->subscription()->first();
        
        $plan = Plan::where("id", $request->plan_id)->first();

        $subscription->plan_name = $plan->plan_name;
        $subscription->max_usage =  $subscription->max_usage + $plan->max_use;
        $subscription->save();

        return response()->json([
            'status' => true,
            'message' => 'created',
            'data' =>  $subscription
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        return Subscription::where("id", $id)->with("user")->first();
    }

    public function getSubscription()
    {
        $user = auth("sanctum")->user();
        return Subscription::where("user_id", $user->id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
