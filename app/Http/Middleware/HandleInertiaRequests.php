<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

use App\Models\Name;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return vite()->getHash();
    }

    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => $request->user()
                ? $request->user()->only('id', 'name', 'email', 'remaining_votes')
                : null,
        ]);
    }
}
