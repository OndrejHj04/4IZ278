<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        return view('home', ['user_reservations' => $user->reservations()->get() ]);
    }
}
