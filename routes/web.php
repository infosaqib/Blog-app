<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
//Redirection
Route::redirect('/welcome', '/');

// Route::view('/home', 'home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::get('/home/{name?}', function ($name = null) {
    return view('home', ['name' => $name]);
})->name('home');

//Route group with controller
Route::controller(UserController::class)->group(function () {
    Route::get('/user/{name}', 'getUser')->name('user');
    Route::post('adduser', 'addUser');
    Route::post('loginuser', 'loginUser');

    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
});

//Route group with prefix
Route::prefix('product')->group(function () {
    Route::get('/index', [ProductController::class, 'index']);
    Route::get('/show', [ProductController::class, 'show']);
    Route::get('/store', [ProductController::class, 'store']);
});