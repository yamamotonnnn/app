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
        {{Auth::user()->name}}
        <h1>'Home画面'</h1>
        <a href='/timeline'><p1>TimeLine</p1></a>
        
        <form action="/start" method="POST">
            @csrf
            <button type="submit" >出勤</button>
        </form>
        <form action="/end" method="POST">
            @csrf
            <button type="submit" >退勤</button>
        </form>
        <form action="/breakstart" method="POST">
            @csrf
            <button type="submit" >休憩</button>
        </form>
        <form action="/breakend" method="POST">
            @csrf
            <button type="submit" >戻り</button>
        </form>
        @endsection
    </body>
</html>
