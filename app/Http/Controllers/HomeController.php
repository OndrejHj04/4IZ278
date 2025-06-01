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

        $user_reservations = $user->reservations()->get();
        $future_reservations = Reservation::where('from_date', '>', Carbon::now())->get();
        $user_notifications = $user->notifications()->get();

        return view('home', ['user_reservations' => $user_reservations, 'future_reservations' => $future_reservations, 'user_notifications' => $user_notifications]);
    }
}
