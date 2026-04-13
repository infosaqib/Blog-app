<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LibraryController;
use App\Http\Middleware\CountryCheck;
use App\Http\Middleware\RequestLogger;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
//Redirection
Route::redirect('/welcome', '/');

// Route::view('/home', 'home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact')->middleware([CountryCheck::class, RequestLogger::class]);

Route::get('/home', function ($name = null) {
    return view('home', ['name' => $name]);
})->name('home')->middleware(CountryCheck::class);

//Route group with controller
Route::controller(UserController::class)
    //Group middleware
// ->middleware('guard')
    ->group(function () {
        Route::get('/user', 'getUser')->name('user');
        Route::post('adduser', 'addUser')->withoutMiddleware('guard');
        Route::post('loginuser', 'loginUser');
        Route::put('updateuser', 'updateUser');
        Route::delete('users/{id}', 'deleteUser');
        
        Route::get('/users', 'index');
        Route::get('/users/verified', 'getVerifiedUsers');
        Route::get('/users/first', 'getFirstUser');
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::get('/setting', 'setting')->name('setting');
    });


//Route group with prefix
Route::prefix('product')->group(function () {
    Route::get('/index', [ProductController::class, 'index'])->middleware('guard');
    ;
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::get('/store', [ProductController::class, 'store']);
});

//Library routes
Route::get('/library', [LibraryController::class, 'index'])->name('library');