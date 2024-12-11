<?php

use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequirementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobListingCategoryController;
use App\Http\Controllers\JobListingController;

Route::get('/',[JobListingController::class,'homepage'])->name('index');


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/contact', function () {
    return view('contact-us');
})->name('contact');

Route::resource('/categories',CategoryController::class);
Route::resource('/joblistings', JobListingController::class);
Route::resource('/requirement', RequirementController::class);
Route::resource('/jobapplication', JobApplicationController::class)->middleware('auth');


Route::get('joblistingcategories/{id}', [JobListingCategoryController::class, 'index'])->name('joblistingcategories.index');

Route::get('/joblistings/{id}', [JobListingController::class, 'show'])->name('joblistings.show');
;





