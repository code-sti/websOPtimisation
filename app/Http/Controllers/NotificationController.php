<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification as NotificationModel;
use Illuminate\Http\Request;
use App\Jobs\ProcessNotification;
use Illuminate\Support\Facades\Log;
use Exception;

class NotificationController extends Controller
{
    public function create()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('notifications.create', compact('users'));
    }

    public function store(Request $request)
    {
        //here we can validate message validation in many ways
        $request->validate([
            'recipients' => 'required|array',
            'message' => 'required|string'
        ]);

        $notification = NotificationModel::create([
            'message' => $request->message,
        ]);

        $notification->users()->attach($request->recipients);
        try{

            // Dispatch job for asynchronous notification processing
            dispatch(new ProcessNotification($notification))->delay(now()->addSeconds(5))->retryUnless(function (Exception $e) {
                return in_array(get_class($e), ['NotificationChannelException', 'UserNotFoundException']);
            });
            return redirect()->route('notifications.create')->with('success', 'Notifications sent successfully!');
        }catch (Exception $e) {
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }
}
