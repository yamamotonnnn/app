<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
         <link rel="stylesheet" href="./css/create.css">
        <title>TimeLine Post</title>
    </head>
    <body>
        @extends('layouts.app')　
        @section('content')
         <div class=user>{{Auth::user()->name}}</div>
        <h1>TimeLine Post</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h3>Name</h3>
                <input type="text" name="post[name]" placeholder="name"/>
                <p class="name__error" style="color:red">{{ $errors->first('post.name') }}</p>
            </div>
            <div class="body">
                <h4>Body</h4>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class='submit'>
                <input type="submit" value="保存"/>
            </div>
        </form>
        <div class="back">[<a href="/timeline">back</a>]</div>
        @endsection
    </body>
</html>
