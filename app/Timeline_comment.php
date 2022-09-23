<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline_comment extends Model
{
     protected $fillable = [
        'user_id',
        'name',
        'body',
    ];
}
