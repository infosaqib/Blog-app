<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;


Route::get('/', function () {
    $response = Http::get('https://dummyjson.com/test');
    return $response->json();
});

Route::resource('users', UsersController::class);

Route::resource('posts', PostsController::class);
//Search Posts - Required
Route::get('/posts/search/{val?}', [PostsController::class, 'searchPosts']);