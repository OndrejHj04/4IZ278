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
        $future_reservations = Reservation::where('from_date', '>', Carbon::now())->get();

        return view('home', ['user_reservations' => $user->reservations()->get(), 'future_reservations' => $future_reservations]);
    }
}
