<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ToDoList</title>
        <link rel="stylesheet" href="{{ asset ('css/welcome.css') }}">
    </head>
    <body class="antialiased">
        <div class="top-page">
            <h1 class="title">ToDoList</h1>
                    {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0"> --}}
                        @if (Route::has('login'))
                        <div
                         class="top-text">
                            @auth
                                <a href="{{ url('/home') }}" class="hometext">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="logintext">Log in</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="registertext">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif        
        </div>
    </body>
</html>
