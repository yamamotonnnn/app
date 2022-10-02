<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
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
}
