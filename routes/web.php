<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/tambah-post', [PostController::class, 'create']);
Route::get('/edit-post', [PostController::class, 'edit']);

