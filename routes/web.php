<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
})->name('landing');
Route::get('/login', function () {
    return redirect('/'); // arahkan ke halaman home (karena login pakai modal)
})->name('login');


// AUTH Routes
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register'])->name('register.process');
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout.process');


Route::get('/diabetes', function () {
    return view('diabetes');
})->middleware('auth')->name('diabetes.page');

Route::get('/lifestyle', function () {
    return view('lifestyle');
})->middleware('auth')->name('lifestyle.page');

// PROFILE Routes
Route::post('/profile/update', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update');


Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile.page');
