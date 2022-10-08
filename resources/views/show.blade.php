<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/show.js') }}"></script>
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @extends('layouts.app')　
        @section('content')
       <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="post">
            <h3>name</h3>
            <p>{{ $post->name }}</p>
            <h3>本文</h3>
            <p>{{ $post->body }}</p>    
        </div>
        <button onclick="like({{$post->id}})">いいね</button>
        <a href='/posts/{{ $post->id}}/comment/create'>comment</a>
        <a href='/timeline'>back</a>
        <h2>コメント</h2>
        <div class='comments'>
            @foreach ($timeline_comments as $timeline_comment)
                <div class='comment'>
                    <p class='name'>{{ $timeline_comment->name }}</p>
                    <p class='body'>{{ $timeline_comment->body }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $timeline_comments->links() }}
        </div>
        @endsection
    </body>
</html>