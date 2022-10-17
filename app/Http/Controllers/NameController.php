<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Name;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
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
                'user' => !$name->anonymous ? $name->user->name : null,
                'name' => $name->name,
                'description' => $name->description,
                'score' => $name->score,
                'owned' => $name->user_id == Auth::user()->id,
                'upvote' => $name->upvote,
                'downvote' => $name->downvote,
                'updated_at' => $name->updated_at,
            ]),
            'votes' => Auth::user()->fresh()->remaining_votes,
            'participants' => User::all()->count(),
            'all_votes' => Vote::all()->count(),
            'next_suggestion_in' => Auth::user()->fresh()->next_suggestion_in->totalSeconds,

        ]);
    }

    /**
     * Vote for an existing name.
     */
    public function vote(Request $request)
    {
        $name = Name::find($request->input('id'));
        if ($name->owned) {
            return redirect()->back()->with('error', 'You cannot vote for your own name.');
        }

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
        $lastSuggestion = Auth::user()->names()->orderBy('updated_at', 'DESC')->first();
        if($lastSuggestion && $lastSuggestion->updated_at->diffInHours(now()) < 24) {
            return redirect()->back()->with('error', 'You can only suggest a name once every 24 hours.');
        }

        Auth::user()->names()->create($request->validate([
            'name' => 'required|unique:names|min:5|max:42',
            'description' => 'required|min:5|max:255',
            'anonymous' => 'boolean'
        ]));

        return redirect('/');
    }
}
