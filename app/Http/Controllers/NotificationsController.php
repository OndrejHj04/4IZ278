<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

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
}
