<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeyCloakController;

Route::get('auth/redirect', [KeyCloakController::class, 'redirect'])->name('login');
Route::get('auth/callback', [KeyCloakController::class, 'callback']);

Route::middleware('auth')->group(function () {
    Route::get('/', 'App\Http\Controllers\NameController@index')->name('home');
    Route::post('/', 'App\Http\Controllers\NameController@vote');
    Route::post('/add', 'App\Http\Controllers\NameController@store');
    Route::post('/reset', 'App\Http\Controllers\NameController@reset');
});

Route::get('/map', function () {
    return inertia('map');
});
Route::get('/end', function () {
    return inertia('end');
});
