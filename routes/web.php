<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserConfigController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;


Route::get('/', [Controller::class, 'index'])->middleware('auth')->name('home');

Route::controller(LoginController::class)->group(function () {
    Route::view('/login', "login")->name('login');
    Route::view('/registro', "register")->name('register');

    Route::get('/logout', 'logout')->name('logout');
    Route::post('/validar-registro', 'register')->name('validar-registro');
    Route::post('/iniciar-sesion', 'login')->name('inicia-sesion');

    Route::get('/forgot-password', 'forgotPassword')->middleware('guest')->name('password-request');
    Route::post('/forgot-password', 'sendEmailForgotPassword')->middleware('guest')->name('password-email');
    Route::get('/reset-password/{token}', 'resetPasswordToken')->middleware('guest')->name('password-reset');
    Route::post('/reset-password', 'resetPassword')->middleware('guest')->name('password-update');

    Route::get('password/reset/{token}', [LoginController::class, 'resetPasswordToken'])
        ->name('password.reset');
});
