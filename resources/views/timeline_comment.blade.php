<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('./css/timelinecomment.css') }}">
        <!-- Fonts -->
    </head>
    <body>
        @extends('layouts.app')　
        @section('content')
         <div class=user>{{Auth::user()->name}}</div>
        <h1>コメント作成</h1>
        <form action="/comment_store" method="POST">
            @csrf
            <div class="body">
                <h2>Name</h2>
                <input type="text" name="timeline_comment[name]" placeholder="名前"/>
                 <p class="name__error" style="color:red">{{ $errors->first('comment.name') }}</p>
            </div>
            <div class="body">
                <h3>Body</h3>
                <textarea name="timeline_comment[body]" placeholder="コメント内容"></textarea>
                 <p class="name__error" style="color:red">{{ $errors->first('comment.name') }}</p>
            </div>
            <input type="hidden" name="timeline_comment[post_id]" value={{ $post->id }}>
            <div class=submit><input type="submit" value="保存"/></div>
        </form>
        <div class="back">[<a href="/timeline">戻る</a>]</div>
        @endsection
    </body>
</html>
