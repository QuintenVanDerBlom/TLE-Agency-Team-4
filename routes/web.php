<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobListingCategoryController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\JobListingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::resource('/categories',CategoryController::class);
Route::resource('/joblistings', JobListingController::class);

Route::get('joblistingcategories/{id}', [JobListingCategoryController::class, 'index'])->name('joblistingcategories.index');








Route::get('/job-listings', function () {
    return view('job-listings');
});


Route::get('job-listings/{role}', [JobListingsController::class, 'show']);
