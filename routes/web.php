<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/tambah-post', [PostController::class, 'create']);
Route::get('/edit-post/{id}', [PostController::class, 'edit']);
Route::post('/store', [PostController::class, 'store']);
Route::put('/update/{id}', [PostController::class, 'update']);
Route::get('/detail-post/{id}', [PostController::class, 'show']);
Route::delete('/delete-post/{id}', [PostController::class, 'destroy']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/tambah-user', [UserController::class, 'create']);
Route::post('/store-user', [UserController::class, 'store']);
Route::get('/edit-user/{id}', [UserController::class, 'edit']);
Route::put('/update-user/{id}', [UserController::class, 'update']);
Route::delete('/delete-user/{id}', [UserController::class, 'destroy']);