<?php

use Illuminate\Support\Facades\Route;
use App\Models\Name;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return inertia('welcome', [
        'names' => Name::all()->map(fn ($name) => [
            'id' => $name->id,
            'name' => $name->name,
            'description' => $name->description,
            'votes' => $name->votes
        ]),
        'votes' => 3
    ]);
});
