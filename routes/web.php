<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Route for handling form submission (POST)
Route::post('/aanvullende-informatie', [JobController::class, 'filter'])->name('aanvullende-informatie');

// Route for displaying the filtered jobs (GET)
Route::get('/filter-vacatures', [JobController::class, 'showFilteredJobs'])->name('filter.vacatures');

