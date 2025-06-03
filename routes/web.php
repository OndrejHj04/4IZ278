<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\AdminOrLeader;
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
    Route::patch('/notifications/{notification}/read', [NotificationsController::class, 'read'])->name('notifications.read');

    Route::middleware(AdminOrLeader::class)->group(function () {
        Route::post('/reservations/{reservation}/add-users', [ReservationController::class, 'addUsers'])->name('reservations.add-users');
        Route::post('/reservations/{reservation}/remove-members', [ReservationController::class, 'removeMembers'])->name('reservations.remove-members');
        Route::delete('/reservations/{reservation}/sign-out', [ReservationController::class, 'signOut'])->name('reservations.sign-out');
    });

    Route::resource('reservations', ReservationController::class)->only(['index', 'create', 'store']);
    Route::resource('reservations', ReservationController::class)->only(['show', 'update', 'destroy'])->middleware(AdminOrLeader::class);

    Route::resource('notifications', NotificationsController::class)->only(['index'])->middleware(Admin::class);

    Route::resource('users', UserController::class)->only(['show', 'update', 'destroy'])->middleware(Admin::class);
    Route::resource('users', UserController::class)->only(['index']);
});