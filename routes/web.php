<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->controller(AuthController::class)->group(function (){
    Route::get('/register', 'showRegister')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::view('/', 'home')->name('home');

    Route::post('/reservations/{id}/remove-members', [ReservationController::class, 'removeMembers'])->name('reservations.remove-members');
    Route::post('/reservations/{id}/add-users', [ReservationController::class, 'addUsers'])->name('reservations.add-users');

    Route::resource('reservations', ReservationController::class)->except(['create', 'edit', 'store']);
    Route::resource('users', UserController::class)->except(['create', 'edit', 'create', 'store']);
    Route::resource('notifications', NotificationsController::class)->only(['index', 'store', 'show']);
});