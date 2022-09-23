<?php

namespace App\Http\Controllers;

use App\Post;
use App\Record;
use App\Timeline_comment;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('index');
    }
    
    public function start(Record $record,Request $request)
    {
        $date = Carbon::now();
        $record->start_at = $date;
        $record->save();
        
        //$record->fill($input)->save();
        return redirect('/');
    }
    
    public function end(Record $record, Request $request)
    {
        $date = Carbon::now();
        $record->end_at = $date;
        $record->save();
        dd($record);
    }
    
    
    
    public function timeline(Post $post)
    {
        return view('timeline')->with(['posts' => $post->get()]);  
    
    }
    
    public function show(Post $post , Timeline_comment $timeline_comment)
    {
        return view('show')->with([
            'post' => $post,
            'timeline_comment' => $timeline_comment,
        ]);
    }  
    
    public function create()
    {
        return view('create');
    }
    
    public function store(Post $post,Request $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
        
        
    }
}
