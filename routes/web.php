<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\AdminAuth;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RoomsController;

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', "index")->name('login');
    Route::get('/register', "index")->name('register');

    Route::post('/login', "login")->name("user.login");
    Route::post('/logout', "logout")->name("user.logout");
    Route::post('/register', "register")->name("user.register");
});

// Route::get('/', [DashboardController::class, 'index']);

Route::resource('orders', OrdersController::class)->middleware(Authenticate::class);

// Route::resource('rooms', RoomsController::class)->middleware(Authenticate::class);
Route::resource('rooms', RoomsController::class)->middleware([Authenticate::class, AdminAuth::class]);