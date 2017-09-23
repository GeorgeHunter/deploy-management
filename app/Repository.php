<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    public function path()
    {
        return "/repositories/$this->id";
    }

    public function targets()
    {
        return $this->hasMany(Target::class);
    }
}
