<?php

use Illuminate\Support\Facades\Route;
use App\Models\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::match(['get'], '/', function (Request $request) {
    Auth::loginUsingId(1, true);

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
Route::post('/', function (Request $request) {
    Name::find($request->input('id'))
        ->increment('votes', (int)$request->input('vote'));
    Auth::user()->decrement('votes');

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
