<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable = [
        'title',
        'name',
        'body',
    ];
    
    public function getPaginateByLimit(int $Limit_count = 5)
    { 
        return $this->with('timeline_comments')->toSql();
    }
    
    public function timeline_comments()
    {
        return $this->hasMany('App\Timeline_comment');
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
