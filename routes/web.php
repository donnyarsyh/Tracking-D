<?php
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('landingpage');
});

Route::get('/diabetes', function () {
    return view('diabetes');
})->name('diabetes.page');

Route::get('/lifestyle', function () {
    return view('lifestyle');
})->name('lifestyle.page');

Route::get('/profile', function () {
    return view('profile');
})->name('profile.page');