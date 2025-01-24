<?php

use Illuminate\Support\Facades\Route;

// create front
Route::get('/', function () {
    return view('welcome');
});
Route::get('/create', function () {
    return view('companies.create');
});
Route::get('/company', function () {
    return view('companies.dashboard');
});
//

Route::get('/admindashboard', function () {
    return view('admins/dashbord');
});

Route::prefix('admin')->group(function () {
    Route::view('freelancer', 'admins.freelancer')->name('admin.freelancer');
    Route::view('company', 'admins.company')->name('admin.company');
    Route::view('job', 'admins.job')->name('admin.job');
    Route::view('transaction', 'admins.transaction')->name('admin.transaction');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('users.dashbord');
});
Route::get('/job-details', function () {
    return view('users.job-details');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

