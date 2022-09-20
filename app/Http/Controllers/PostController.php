<?php

namespace App\Http\Controllers;

use App\Post;
use App\Record;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('index');
    }
    
    public function start(Record $record,Request $request)
    {
        //$record->fill($input)->save();
        return redirect('/');
        
    }
    public function timeline(Post $post)
    {
        return view('timeline')->with(['posts' => $post->get()]);  
    
    }
    
    public function show(Post $post)
    {
        return view('show')->with(['post' => $post]);
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
