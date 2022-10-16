<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\NameController@index');
Route::post('/', 'App\Http\Controllers\NameController@vote');
Route::post('/add', 'App\Http\Controllers\NameController@store');

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
