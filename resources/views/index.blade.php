<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Laravel</title>
        <link rel="stylesheet" href="./css/index.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

       
    </head>
    <body>
        @extends('layouts.app')　
        @section('content')
        <div class=user>{{Auth::user()->name}}</div>
        <h2>Home画面</h2>
        <a href='/admin'><h1>admin</h1></a>
        <a href='/timeline'><h1>TimeLine</h1></a>
        <div class='now'>{{ $date }}</div>
        <div class=start>
            <form action="/start" method="POST">
                @csrf
                <button type="submit" >出勤</button>
             </form>
        </div>   
        <div class=end>
            <form action="/end" method="POST">
                @csrf
                <button type="submit" >退勤</button>
            </form>
        </div>
        <div class=breakstart>
            <form action="/breakstart" method="POST">
                @csrf
                <button type="submit" >休憩</button>
            </form>
        </div>
        <div class=breakend>
            <form action="/breakend" method="POST">
                @csrf
                <button type="submit" >戻り</button>
            </form>
        </div>
        @endsection
    </body>
</html>
