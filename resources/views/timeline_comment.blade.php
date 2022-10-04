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
        <form action="/comment_store" method="POST">
            @csrf
            <div class="body">
                <h2>Name</h2>
                <input type="text" name="timeline_comment[name]" placeholder="名前"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="timeline_comment[body]" placeholder="コメント内容"></textarea>
            </div>
            <input type="hidden" name="timeline_comment[post_id]" value={{ $post->id }}>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/timeline">戻る</a>]</div>
    </body>
</html>
