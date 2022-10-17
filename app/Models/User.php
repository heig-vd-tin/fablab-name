<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function names()
    {
        return $this->hasMany(Name::class);
    }

    public function votes()
    {
        return $this->belongsToMany(Name::class)->withPivot('upvote');
    }

    public function getRemainingVotesAttribute()
    {
        return max(0, config('app.votes') - $this->votes->count());
    }

    public function getNextSuggestionInAttribute()
    {
        $lastSuggestion = $this->names()->orderBy('updated_at', 'DESC')->first();
        return new CarbonInterval($lastSuggestion ?
            Carbon::now()->diff($lastSuggestion->updated_at->addDay()) :
            0);
    }
}
