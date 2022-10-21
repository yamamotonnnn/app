<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Laravel</title>
        <link rel="stylesheet" href="./css/timeline.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

       
    </head>
    <body>
        @extends('layouts.app')　
        @section('content')
         <div class=user>{{Auth::user()->name}}</div>
        <div class="home">[<a href="/">home</a>]</div>
        <div class=create><a href='/create'>create</a><div>
        <h1>TimeLine</h1>
        <div class='posts'>
        @foreach ($posts as $post)
            <h2 class='title'>
                <a href="/posts/{{ $post->id }}/comment">{{ $post->title }}</a>
            </h2>
            <div class='post'>
                <p class='name'>名前　{{ $post->name }}</p> 
                <p class='body'>内容　{{ $post->body }}</p>
            </div>
        @endforeach
        <div class='paginate'>
            {{ $posts->links() }} 
        </div>
        @endsection
    </body>
</html>