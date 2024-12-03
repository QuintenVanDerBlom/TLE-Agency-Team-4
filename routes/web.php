<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobListingCategoryController;
use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});



Route::resource('/categories',CategoryController::class);
Route::resource('/joblistingcategories', JobListingCategoryController::class);
Route::get('/joblistings', [JobListingController::class, 'index']);

