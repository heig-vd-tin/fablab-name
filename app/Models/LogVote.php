<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use User;
use Name;

class LogVote extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'name_id',
        'upvote',
    ];

    public function name()
    {
        return $this->belongsTo(Name::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = \Carbon\Carbon::now();
    }
}
