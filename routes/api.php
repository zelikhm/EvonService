<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('checkToken')->group(function () {
    Route::post('/add', ['App\Http\Controllers\ImageController', 'save']);
    Route::post('/delete', ['App\Http\Controllers\ImageController', 'delete']);
});

