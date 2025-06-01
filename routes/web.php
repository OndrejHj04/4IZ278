<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::post('/reservations/{id}/remove-members', [ReservationController::class, 'removeMembers'])->name('reservations.remove-members');
    Route::post('/reservations/{id}/add-users', [ReservationController::class, 'addUsers'])->name('reservations.add-users');
    Route::delete('/reservations/{id}/sign-out', [ReservationController::class, 'signOut'])->name('reservations.sign-out');

    Route::patch('/notifications/{id}/read', [NotificationsController::class, 'read'])->name('notifications.read');

    Route::resource('reservations', ReservationController::class)->except(['edit']);
    Route::resource('users', UserController::class)->except(['create', 'edit', 'create', 'store']);
    Route::resource('notifications', NotificationsController::class)->only(['index', 'store', 'show']);
});