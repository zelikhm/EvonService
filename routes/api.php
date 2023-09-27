<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/main', ['App\Http\Controllers\ImageController', 'save']);
Route::post('/flat', ['App\Http\Controllers\ImageController', 'save']);
Route::post('/house', ['App\Http\Controllers\ImageController', 'save']);
