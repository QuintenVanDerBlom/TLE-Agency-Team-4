<?php

use App\Http\Controllers\JobListingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/job-listings', function () {
    return view('job-listings');
});


Route::get('job-listings/{role}', [JobListingsController::class, 'show']);
