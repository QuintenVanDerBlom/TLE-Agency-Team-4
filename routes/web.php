<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobListingCategoryController;
use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::resource('/categories',CategoryController::class);
Route::resource('/joblistings', JobListingController::class);

Route::get('joblistingcategories/{id}', [JobListingCategoryController::class, 'index'])->name('joblistingcategories.index');

Route::get('/joblistings', [JobListingController::class, 'index'])->name('joblistings.index');
Route::get('/joblistings/{id}', [JobListingController::class, 'show'])->name('joblistings.show');




// Route om de formulierpagina te tonen
Route::get('/aanvullende-informatie', function () {
    return view('aanvullende-informatie'); // Zorg ervoor dat het bestand 'aanvullende-informatie.blade.php' heet.
})->name('aanvullende-informatie');

// Route om het formulier te verwerken
Route::post('/aanvullende-informatie', function (\Illuminate\Http\Request $request) {
    // Haal de geselecteerde opties op
    $keuzes = $request->input('keuze', []); // Geeft een lege array terug als niets geselecteerd is

    // Verwerk of sla de gegevens op
    // Bijvoorbeeld: sla ze op in een database
    // \App\Models\UserData::create(['beperkingen' => json_encode($keuzes)]);

    return redirect()->back()->with('success', 'Je keuzes zijn succesvol opgeslagen!');
})->name('aanvullende-informatie-verwerken');


Route::post('/filter-vacatures', [JobController::class, 'filter'])->name('filter-vacatures');
