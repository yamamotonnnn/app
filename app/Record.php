<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'user_id',
        'start_at',
    ];
    
     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
