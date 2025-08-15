<?php

use App\Http\Controllers\KomentarController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Monolog\Handler\RotatingFileHandler;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class)->middleware('auth');
Route::resource('komentar', KomentarController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/do-Post', [LoginController::class, 'doPost'])->name('doPost')->middleware('guest');
Route::post('/do-Logout', [LoginController::class, 'doLogout'])->name('doLogout')->middleware('auth');
Route::get('/register', [LoginController::class, 'index2'])->name('register')->middleware('guest');
Route::post('/do-Register', [LoginController::class, 'doRegister'])->name('doRegister')->middleware('guest');