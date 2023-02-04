<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Resources\UserListResource;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
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

            'receiver_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),

            ], 422);
        }

        $user = auth("sanctum")->user();

        $message = new Message();
        $message->user_id = $user->id;
        $message->message = $request->message;
        $message->receiver_id = $request->receiver_id;
        $message->attachment = $request->attachment;
        $message->save();

        event(new MessageSent($message->load("user", "receiver"), $user));

        return response()->json([
            "success" => true,
            "message" => 'message sent',
            "data" => $message->load("user", "receiver")

        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return $message;
    }


    public function showMessageHistory(Request $request)
    {
        $user = auth("sanctum")->user();
        $user_id = $user->id;
        $receiver_id = $request->receiver_id;

        return Message::with("user", "receiver")->where(function ($query) use ($user_id, $receiver_id) {
            $query->where('receiver_id', $receiver_id)
                ->where('user_id', $user_id);
        })->orWhere(function ($query) use ($user_id, $receiver_id) {
            $query->where('receiver_id', $user_id)
                ->where('user_id', $receiver_id);
        })->get();
    }
    public function getMessageUsersList()
    {
        $user = auth("sanctum")->user();
        $user_id = $user->id;
        $userlist = Message::where(function ($query) use ($user_id) {
            $query->where('receiver_id', $user_id)
                ->orWhere('user_id', $user_id);
        })->orderBy("created_at", "DESC")->get()->map(function ($v) use ($user_id) {
            if ($v->user_id === $user_id) {
                return [
                    "user_id" => $v->receiver_id,
                    "message" => $v->message,
                    "attachment" => $v->attachment,
                    "created_at" => $v->created_at
                ];
            } else {
                return [
                    "user_id" => $v->user_id,
                    "message" => $v->message,
                    "attachment" => $v->attachment,
                    "created_at" => $v->created_at
                ];
            }
        })->unique('user_id')->values()->all();

        return   UserListResource::collection($userlist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {

        if ($request->has('read_at') && $request->filled('read_at') && !is_null($request->read_at)) {
            $message->read_at = $message->read_at;
        }
        if ($request->has('message') && $request->filled('message') && !is_null($request->message)) {
            $message->message = $message->message;
        }
        $message->save();
        return response()->json([
            "success" => true,
            "message" => 'message updated'

        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return response()->json([
            "success" => true,
            "message" => 'message deleted'

        ], 200);
    }
}
