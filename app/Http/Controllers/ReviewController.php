<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Notifications\PropertyReviewd;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPropertyReviews($property_id)
    {

        $data = Review::where("property_id", $property_id)->with("user")->get();

        return response()->json([
            "status" => true,
            "message" => "created",
            "count" => count($data),
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
        $review = new Review();
        $review->user_id = $user->id;
        $review->property_id = $request->property_id;
        $review->message = $request->message;
        $review->rating = $request->rating;
        $review->save();

        $property = Property::find($request->property_id);
        $detail = [
            "message" =>  "Someone left a review on your listing  with title, " . $property->property_title
        ];

        Notification::send($user, new PropertyReviewd($detail));
        return response()->json([
            "status" => true,
            "message" => "created",

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Review $review)
    {
        if ($request->has('message') && $request->filled('message') && !is_null($request->message)) {
            $review->message = $request->message;
        }

        if ($request->has('rating') && $request->filled('rating') && !is_null($request->rating)) {
            $review->rating = $request->rating;
        }
        $review->save();

        return response()->json([
            "status" => true,
            "message" => "updated",

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json([
            "status" => true,
            "message" => "removed",

        ]);
    }
}
