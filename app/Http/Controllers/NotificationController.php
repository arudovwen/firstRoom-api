<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function getAllNotifications(Request $request)
    {
        $limit = 10;


        if ($request->limit && $request->has("limit")) {
            $limit =  $request->limit;
        }
        $user = auth("sanctum")->user();
        return $user->notifications()->paginate($limit);
    }

    public function markAllNotifications()
    {
        $user = auth("sanctum")->user();
        $user->unreadNotifications->markAsRead();
        return response()->json([
            'status' => true,
            'message' => 'success',

        ]);
    }

    public function markNotification($id)
    {
        $user = auth("sanctum")->user();
        $notification = $user->notifications()->where("id", $id)->first();
        $notification->markAsRead();

        return response()->json([
            'status' => true,
            'message' => 'success',

        ]);
    }

    public function deleteNotification($id)
    {
        $user = auth("sanctum")->user();
        $notification = $user->notifications()->where("id", $id)->first();
        $notification->delete();
        return response()->json([
            'status' => true,
            'message' => 'success',

        ]);
    }

    public function deleteAllNotification()
    {
        $user = auth("sanctum")->user();
        $user->notifications()->delete();
        return response()->json([
            'status' => true,
            'message' => 'success',

        ]);
    }
}
