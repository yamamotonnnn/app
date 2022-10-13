<?php

namespace App\Http\Controllers;

use App\Post;
use App\Record;
use App\Timeline_comment;
use App\User;
use App\Like;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('index');
    }
    
    public function start(Record $record,Request $request)
    {
        $user_id = Auth::id();
        $date = Carbon::now();
        $record->start_at = $date;
        $record->user_id = $user_id;
        //dd($record);
        $record->save();
        return redirect('/');
    }
    
    public function end(Record $record, Request $request, User $user)
    {
        $user_id = Auth::id();  // ログインしているユーザのIDを取得
	    $record = Record::where('user_id', $user_id)
            ->orderBy('updated_at' , 'desc')
            ->first();
        $date = Carbon::now();
        $record->end_at = $date;
        $record->save();
        //dd($record);
        return redirect('/');
    }
    
    public function breakstart(Record $record, Request $request, User $user)
    {
        $user_id = Auth::id();  // ログインしているユーザのIDを取得
	    $record = Record::where('user_id', $user_id)
            ->orderBy('updated_at' , 'desc')
            ->first();
        $date = Carbon::now();
        $record->breakstart_at = $date;
        $record->save();
        //dd($record);
        return redirect('/');
    }
    
    public function breakend(Record $record, Request $request, User $user)
    {
        $user_id = Auth::id();  // ログインしているユーザのIDを取得
	    $record = Record::where('user_id', $user_id)
            ->orderBy('updated_at' , 'desc')
            ->first();
        $date = Carbon::now();
        $record->breakend_at = $date;
        $record->save();
        //dd($record);
        return redirect('/');
    }
    
    public function timeline(Post $post)
    {
        return view('timeline')->with(['posts' => $post->get()]);  
    }
    
    //public function show(Post $post , Timeline_comment $timeline_comment)
   // {
        //$comments = Timeline_comment::query()
       // ->where('post_id', $post->id)
       // ->paginate(5);
        //return view('show')->with([
            //'post' => $post,
            //'timeline_comments' => $comments
       // ]);
   // }  
    
    public function create()
    {
        return view('create');
    }
    
    public function store(Post $post,Request $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        //dd($post);
        return redirect('/timeline' );//. $post->id);
    }
    
    public function comment(Post $post)
    {
       return view('timeline_comment')->with(['post' => $post]);
    }
    
    public function comment_store(Timeline_comment $timeline_comment,Request $request)
    {
        $input = $request['timeline_comment'];
        //dd($input);
        $timeline_comment->fill($input)->save();
        return redirect('/posts/' . $input['post_id']. '/comment');
    }
    
    public function like(Post $post, Request $request)
    {
        $like=New Like();
        $like->post_id=$post->id;
        $like->user_id=Auth::user()->id;
        $like->save();
        return redirect('/timeline');
    }
    
    public function unlike(Like $like, Post $post)
    {
        $user=Auth::user()->id;
        $like=Like::where('post_id', $post->id)->where('user_id', $user)->first();
        $like->delete();
        return redirect('/timeline');
    }  
    
     public function show(Post $post , Timeline_comment $timeline_comment)
    {
        $like=Like::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        $comments = Timeline_comment::query()
        ->where('post_id', $post->id)
        ->paginate(5);
        return view('show')->with([
            'post' => $post,
            'timeline_comments' => $comments,
            'like' => $like,
        ]);
    } 
}    