<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RequirementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


// GET route to show the form
Route::get('/aanvullende-informatie', function () {
    return view('aanvullende-informatie');
})->name('aanvullende-informatie');

// POST route to handle form submission
Route::post('/aanvullende-informatie', [RequirementController::class, 'index'])->name('aanvullende-informatie');

// Route for displaying the filtered jobs (GET)
Route::get('/vacatures', [RequirementController::class, 'showFilteredJobs'])->name('vacatures');

