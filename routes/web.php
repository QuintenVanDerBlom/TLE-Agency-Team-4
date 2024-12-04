<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobListingCategoryController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\JobListingsController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobListingCategoryController;
use App\Http\Controllers\JobListingController;
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


Route::resource('/categories',CategoryController::class);
Route::resource('/joblistingcategories', JobListingCategoryController::class);
Route::get('/joblistings', [JobListingController::class, 'index'])->name('joblistings.index');
Route::get('/joblistings/{id}', [JobListingController::class, 'show'])->name('joblistings.show');


