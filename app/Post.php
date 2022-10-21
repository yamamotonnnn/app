<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'name',
        'body',
    ];

   public function getPaginateByLimit(int $Limit_count = 7)
    { 
        return $this->orderBy('updated_at', 'DESC')->paginate($Limit_count);
       // return $this->with('timeline_comments')->toSql();
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
