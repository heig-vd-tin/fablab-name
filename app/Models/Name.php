<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\BroadcastsEvents;

class Name extends Model
{
    use BroadcastsEvents, HasFactory;
    protected $appends = array('score');

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('upvote');
    }

    public function getScoreAttribute()
    {
        return 2 * $this->votes()->sum('upvote') - $this->votes()->count();
    }

    public function getUpvoteAttribute()
    {
        if (Auth::check()) {
            $entry = $this->votes()->where('user_id', Auth::user()->id)->first();
            return $entry and $entry->pivot->upvote;
        }
        return false;
    }

    public function getDownvoteAttribute()
    {
        if (Auth::check()) {
            $entry = $this->votes()->where('user_id', Auth::user()->id)->first();
            return $entry and !$entry->pivot->upvote;
        }
        return false;
    }

    public function broadcastOn($event)
    {
        return [$this, $this->user];
    }
}
