<?php

use App\Http\Controllers\JobTypesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::resource('/job-types', JobTypesController::class);


