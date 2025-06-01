<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = Notification::paginate(10);
        return view('notifications.index', ['notifications' => $notifications]);
    }

    public function store(Request $request) { }

    public function show($id) { 
        $notification = Notification::find($id);
        return view('notifications.show', ['notifications' => $notification]);
    }

    public function read($id) { 
        $notification = Notification::findOrFail($id);

        $notification->read = true;
        $notification->save();

        return redirect()->back();
    }
}
