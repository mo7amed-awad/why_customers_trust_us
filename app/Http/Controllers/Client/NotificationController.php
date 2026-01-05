<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Modules\Notification\App\Notifications\NewOrderNotification;

class NotificationController extends Controller
{
    public function notifications()
    {
        $user = auth('user')->user();

        // Get unread notifications
        $notifications = $user->notifications()->whereNull('read_at')->get();

        return view('Client.notification', compact('notifications'));
    }

    public function markAsRead($lang,$id)
    {
        $user = auth('user')->user();

        // Find the notification
        $notification = $user->notifications()->where('id', $id)->first();

        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        // Mark as read by updating the read_at column
        $notification->update(['read_at' => now()]);

        return response()->json(['message' => 'Notification marked as read'], 200);
    }

}
