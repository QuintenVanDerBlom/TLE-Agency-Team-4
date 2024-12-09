<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobListingCategoryController;
use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::get('/',[JobListingController::class,'homepage'])->name('index');


Route::resource('/categories',CategoryController::class);
Route::resource('/joblistings', JobListingController::class);

Route::get('joblistingcategories/{id}', [JobListingCategoryController::class, 'index'])->name('joblistingcategories.index');

Route::get('/joblistings', [JobListingController::class, 'index'])->name('joblistings.index');
Route::get('/joblistings/{id}', [JobListingController::class, 'show'])->name('joblistings.show');


