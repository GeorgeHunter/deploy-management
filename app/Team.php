<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function members()
    {
        return $this->belongsToMany(User::class);
    }

    public function repositories()
    {
        return $this->hasMany(Repository::class);
    }
}
