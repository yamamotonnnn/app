<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Laravel</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

       
    </head>
    <body>
        <div class="home">[<a href="/">home</a>]</div>
        <a href='/create'>create</a>
        <h1>TimeLine</h1>
        <div class='posts'>
        @foreach ($posts as $post)
            <h2 class='title'>
                <a href="/posts/{{ $timeline_comment->id }}">{{ $timeline_comment->title }}</a>
            </h2>
            <div class='post'>
                <p class='name'>{{ $timeline_comment->name }}</p>
                <p class='body'>{{ $timeline_comment->body }}</p>
            </div>
        @endforeach
        </div>
       
    </body>
</html>
