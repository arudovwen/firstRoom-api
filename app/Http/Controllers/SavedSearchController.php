<?php

namespace App\Http\Controllers;

use App\Models\SavedSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SavedSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth("sanctum")->user();
        $data =  $user->savedsearches()->get();
        return response()->json([
            "status" => true,
            "message" => count($data) . " found",
            "data" => $data
        ]);
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
            "search_data" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),

            ], 422);
        }
        $user = auth("sanctum")->user();
        $savedSearch = new SavedSearch();
        $savedSearch->user_id = $user->id;
        $savedSearch->search_data = $request->search_data;

        $savedSearch->save();
        return response()->json([
            "status" => true,
            "message" => "created",

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavedSearch  $savedSearch
     * @return \Illuminate\Http\Response
     */
    public function show($savedSearch)
    {
        return SavedSearch::find($savedSearch);
    }



    public function destroy(SavedSearch $savedSearch)
    {
        $savedSearch->delete();
        return response()->json([
            "status" => true,
            "message" => "removed",

        ]);
    }
}
