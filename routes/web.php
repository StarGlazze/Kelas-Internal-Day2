<?php

use App\Http\Controllers\KomentarController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Monolog\Handler\RotatingFileHandler;

Route::get('/', [PostController::class, 'publicIndex'])->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class)->except(['index','show']);

    Route::resource('komentar', KomentarController::class);
    Route::post('/komentar-store', [KomentarController::class, 'storeFromPublic'])->name('komentar.storeFromPublic');

    Route::resource('users', UserController::class);
    
    Route::post('/do-Logout', [LoginController::class, 'doLogout'])->name('doLogout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/do-Post', [LoginController::class, 'doPost'])->name('doPost');
    Route::get('/register', [LoginController::class, 'index2'])->name('register');
    Route::post('/do-Register', [LoginController::class, 'doRegister'])->name('doRegister');
});

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');