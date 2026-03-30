<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/user/{name}', [UserController::class, 'getUser'])->name('user');

Route::get('/login', [UserController::class, 'login']);