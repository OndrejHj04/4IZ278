<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::middleware('guest')->controller(AuthController::class)->group(function (){
    Route::get('/register', 'showRegister')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
});

Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->controller()->group(function (){
});