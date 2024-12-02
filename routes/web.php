<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/aanvullende-informatie', function () {
    return view('aanvullende-informatie');
})->name('aanvullende-informatie');

