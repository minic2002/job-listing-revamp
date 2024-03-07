<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $userId = $request->input('user_id');
        $message = $request->input('message');

        $notification = new Notification();
        $notification->user_id = $userId;
        $notification->message = $message;
        $notification->save();

        return response()->json(['message' => 'Notification sent successfully']);
    }

    public function unreadNotificationCount(Request $request)
    {

        $count = Notification::where('user_id', $request->user_id)
            ->where('read', false)
            ->count();

        return response()->json(['count' => $count]);
    }

    public function notificationPage(Request $request)
    {
        $user = $request->user();
        $notifications = $user->notifications()->latest()->get();
        $notif_count = $notifications->where('read', false)->count();
        return view('dashboard.notification', ['notifications' => $notifications, 'notif_count' => $notif_count]);
    }
}
