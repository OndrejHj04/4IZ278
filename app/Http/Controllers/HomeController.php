<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user_reservations = $user->reservations()->orderBy('from_date', 'asc')->get();
        $future_reservations = Reservation::where('from_date', '>', Carbon::now())->orderBy('from_date', 'asc')->get();
        $user_notifications = $user->notifications()->orderBy('created_at', 'desc')->get();

        return view('home', ['user_reservations' => $user_reservations, 'future_reservations' => $future_reservations, 'user_notifications' => $user_notifications]);
    }
}
