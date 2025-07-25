<?php

use App\Http\Controllers\KomentarController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);
Route::resource('komentar', KomentarController::class);
Route::resource('users', UserController::class);