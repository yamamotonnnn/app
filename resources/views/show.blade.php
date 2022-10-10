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
        <div class="like">
            <span>
                <!-- もしユーザーが「いいね」をしていたら-->
                @if($like)
                <!-- いいね削除ボタンを表示 -->
	                <a href="{{ route('unlike', $post) }}" class="btn btn-success btn-sm">いいね
		       <!-- いいねの数を表示 -->
		                <span class="badge">
			                {{ $post->likes->count() }}
		                </span>
                    </a>
                @else
                <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
	                <a href="{{ route('like', $post) }}" class="btn btn-secondary btn-sm">いいね
	        	<!-- 「いいね」の数を表示 -->
		                <span class="badge">
			                {{ $post->likes->count() }}
	        	        </span>
	                </a>
                @endif
            </span>
        </div>
        <div class='paginate'>
            {{ $timeline_comments->links() }}
        </div>
        @endsection
    </body>
</html>