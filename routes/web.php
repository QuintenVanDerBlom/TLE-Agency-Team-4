<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


// GET route to show the form
Route::get('/aanvullende-informatie', function () {
    return view('aanvullende-informatie');
})->name('aanvullende-informatie');

// POST route to handle form submission
Route::post('/aanvullende-informatie', [JobController::class, 'filter'])->name('aanvullende-informatie');

// Route for displaying the filtered jobs (GET)
Route::get('/filter-vacatures', [JobController::class, 'showFilteredJobs'])->name('filter.vacatures');

