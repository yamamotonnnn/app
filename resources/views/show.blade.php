<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/show.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('./css/show.css') }}">
        <title>詳細画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @extends('layouts.app')　
        @section('content')
         <div class=user>{{Auth::user()->name}}</div>
         <div class=back>
            <a href='/timeline'>戻る</a>
        </div>
        <div class=delete>
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button> 
            </form>
        </div>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="post">
            <h3>名前 {{ $post->name }}</h3>
            <h3>内容 {{ $post->body }}</h3>
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
       
        <div class='create'>
            <a href='/posts/{{ $post->id}}/comment/create'>コメント投稿する</a>
        </div>
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