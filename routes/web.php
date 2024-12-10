<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobListingCategoryController;
use App\Http\Controllers\JobListingController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('/categories',CategoryController::class);
Route::resource('/joblistings', JobListingController::class);

Route::get('joblistingcategories/{id}', [JobListingCategoryController::class, 'index'])->name('joblistingcategories.index');

Route::get('/joblistings', [JobListingController::class, 'index'])->name('joblistings.index');
Route::get('/joblistings/{id}', [JobListingController::class, 'show'])->name('joblistings.show');
