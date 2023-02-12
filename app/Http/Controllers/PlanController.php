<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::get();
        return response()->json([
            'status' => true,
            'message' => 'found '.count($plans),
            'data' =>  $plans
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
            'plan_name' => 'required|unique:plans,plan_name',
            'max_use' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),

            ], 422);
        }

        $user = auth("sanctum")->user();

        $plan = new Plan();
        $plan->plan_name = $request->plan_name;
        $plan->max_use = $request->max_use;
        $plan->user_id = $user->id;
        $plan->save();

        return response()->json([
            'status' => true,
            'message' => 'created',
            'data' =>  $plan->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        return $plan;
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
   
        if ($request->has('plan_name') && $request->filled('plan_name') && !is_null($request->plan_name)) {
            $plan->plan_name = $request->plan_name;
        }
        if ($request->has('max_use') && $request->filled('max_use') && !is_null($request->max_use)) {
            $plan->max_use = $request->max_use;
        }
        $plan->save();

        return response()->json([
            'status' => true,
            'message' => 'updated',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return response()->json([
            'status' => true,
            'message' => 'deleted',

        ]);
    }
}
