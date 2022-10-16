<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use User;
use Name;

class Vote extends Pivot
{
    protected $table = 'name_user';

    public function name()
    {
        return $this->belongsTo(Name::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
