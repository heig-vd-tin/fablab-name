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

function welcome() {
    return inertia('welcome', [
        'names' => Name::all()->map(fn ($name) => [
            'id' => $name->id,
            'name' => $name->name,
            'description' => $name->description,
            'score' => $name->score,
            'upvote' => $name->upvote,
            'downvote' => $name->downvote,
        ]),
        'votes' => Auth::user()->fresh()->remaining_votes,
    ]);
}

Route::match(['get'], '/', function() {return welcome();});

Route::post('/', function (Request $request) {
    $name = Name::find($request->input('id'));

    if ($name->upvote && $request->input('upvote')) {
        $name->votes()->detach(Auth::user()->id);
    } else if ($name->downvote && $request->input('downvote')) {
        $name->votes()->detach(Auth::user()->id);
    } else if ($name->upvote || $name->downvote) {
        $name->votes()->updateExistingPivot(Auth::user()->id, ['upvote' => (boolean)$request->input('upvote')]);
    } else {
        $name->votes()->attach(Auth::user()->id, ['upvote' => (boolean)$request->input('upvote')]);
    }

    return welcome();
});

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
