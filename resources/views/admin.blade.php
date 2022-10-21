<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Laravel</title>
        <link rel="stylesheet" href="./css/admin.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
   
       
    </head>
    <body>
        @extends('layouts.app')　
        @section('content')
        <h1> {{Auth::user()->name}} </h1>
        <div class='a'>id</div>
        <div class='b'>名前</div>
        <div class='c'>出勤</div>
        <div class='d'>退勤</div>
        <div class='e'>休憩</div>
        <div class='f'>戻り</div>
        
        <div class='users'>
            @foreach($users as $user)
                <div class='users'></div>  
                </div>    
            @endforeach
        </div>
        <div class='records'>
            @foreach($records as $record)
               <div class='record'>
                    <div class='user_id'> {{ $user->id }} </div> 
                    <div class='user_name'> {{ $user->name }} </div> 
                    <div class='start'>{{ $record->start_at }}</div>
                    <div class='end'>{{ $record->end_at }}</div>
                    <div class='breakstart'>{{ $record->breakstart_at }}</div>
                    <div class='breakend'>{{ $record->breakend_at }}</div>
                </div>
            @endforeach
        </div>    
        @endsection
    </body>
</html>
