<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/tables', function () {
    return view('tables');
})->name('tables');

Route::get('/wallet', function () {
    return view('wallet');
})->name('wallet');

Route::get('/RTL', function () {
    return view('RTL');
})->name('RTL');

Route::get('/profile', function () {
    return view('account-pages.profile');
})->name('profile');

Route::get('/signin', function () {
    return view('account-pages.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('account-pages.signup');
})->name('signup');
