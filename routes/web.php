<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index']);

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', "index")->name('login');
    Route::get('/register', "index")->name('register');

    Route::post('/login', "login")->name("user.login");
    Route::post('/register', "register")->name("user.register");
});