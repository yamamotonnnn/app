<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline_comment extends Model
{
     protected $fillable = [
        'user_id',
        'post_id',
        'name',
        'body',
    ];
    
    public function getPaginateByLimit(int $Limit_count = 5)
    { 
        return $this->post()->with('timeline_comments')->toSql();
       // return $this::with('post')->orderBy('updated_at', 'DESC')->paginate($Limit_count);
    }
    
    
    public function post()   
    {
        return $this->belongsTo('App\Post');  
    }
}
