<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        return view('notifications.index', ['notifications' => $notifications]);
    }

    public function read($id) { 
        $notification = Notification::findOrFail($id);

        $notification->read = true;
        $notification->save();

        return redirect()->back();
    }
}
