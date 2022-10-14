<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Name;

class NameController extends Controller
{
    public function index()
    {
        return inertia('Names/Index', [
            'names' => auth()->user()->names,
        ]);
    }
    public function vote(Request $request, Name $name)
    {
        if ($request->user()->votes >= 3) {
            return redirect()->back()->with('error', 'You have already voted 3 times.');
        }
        if ($name->user_id === $request->user()->id) {
            return redirect()->back()->with('error', 'You cannot vote for your own name.');
        }

        $name->votes += 1;
        $name->save();

        return redirect()->back();
    }
}
