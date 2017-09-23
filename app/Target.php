<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $fillable = [
        'name',
        'host',
        'url',
        'db_name',
        'db_host',
        'db_user',
        'db_pass',
        'repository_id'
    ];
}
