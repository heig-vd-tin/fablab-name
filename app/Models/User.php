<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Auth;

class User extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id', 'created_at'];

    /**
     * User attributes
     *
     * @var array
     */
    protected $attributes = [];
    /**
     * Constructor
     *
     * @param array $profile Keycloak user info
     */
    // public function __construct(array $profile)
    // {
    //     foreach ($profile as $key => $value) {
    //         if (in_array($key, $this->fillable)) {
    //             $this->attributes[$key] = $value;
    //         }
    //     }

    //     $this->id = $this->getKey();
    // }

    // /**
    //  * Magic method to get attributes
    //  *
    //  * @param  string $name
    //  * @return mixed
    //  */
    // public function __get($name)
    // {
    //     return $this->attributes[$name] ?? null;
    // }

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


    /**
     * Get the value of the model's primary key.
     *
     * @return mixed
     */
    public function getKey()
    {
        return $this->email;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'email';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->email;
    }

    /**
     * Check user has roles
     *
     * @see KeycloakWebGuard::hasRole()
     *
     * @param  string|array  $roles
     * @param  string  $resource
     * @return boolean
     */
    public function hasRole($roles, $resource = '')
    {
        return Auth::hasRole($roles, $resource);
    }

    /**
     * Get the password for the user.
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getAuthPassword()
    {
        throw new \BadMethodCallException('Unexpected method [getAuthPassword] call');
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getRememberToken()
    {
        throw new \BadMethodCallException('Unexpected method [getRememberToken] call');
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param string $value
     * @codeCoverageIgnore
     */
    public function setRememberToken($value)
    {
        throw new \BadMethodCallException('Unexpected method [setRememberToken] call');
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getRememberTokenName()
    {
        throw new \BadMethodCallException('Unexpected method [getRememberTokenName] call');
    }
}
