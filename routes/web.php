<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/confirmation', function () {
    return view('confirmation');
});


