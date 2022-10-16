<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Name;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class NameController extends Controller
{
    /**
     * Return the list of names
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'score') ? 'score' : 'updated_at';
        return inertia('welcome', [
            'names' => Name::all()->map(fn ($name) => [
                'id' => $name->id,
                'name' => $name->name,
                'description' => $name->description,
                'score' => $name->score,
                'upvote' => $name->upvote,
                'downvote' => $name->downvote,
                'user' => !$name->anonymous ? $name->user->name : null,
                'updated_at' => $name->updated_at,
            ])->sortByDesc($sort),
            'votes' => Auth::user()->fresh()->remaining_votes,
            'participants' => User::all()->count(),
            'all_votes' => Vote::all()->count(),
        ]);
    }

    /**
     * Vote for an existing name.
     */
    public function vote(Request $request)
    {
        $name = Name::find($request->input('id'));

        if ($name->upvote && $request->input('upvote')) {
            $name->votes()->detach(Auth::user()->id);
        } else if ($name->downvote && $request->input('downvote')) {
            $name->votes()->detach(Auth::user()->id);
        } else if ($name->upvote || $name->downvote) {
            $name->votes()->updateExistingPivot(Auth::user()->id, ['upvote' => (bool)$request->input('upvote')]);
        } else {
            $name->votes()->attach(Auth::user()->id, ['upvote' => (bool)$request->input('upvote')]);
        }
        return redirect('/');
    }

    /**
     * Add a new proposed name.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auth::user()->names()->create($request->validate([
            'name' => 'required|unique:names|min:5|max:42',
            'description' => 'required|min:5|max:255',
            'anonymous' => 'boolean',
        ]));

        return redirect('/');
    }
}
