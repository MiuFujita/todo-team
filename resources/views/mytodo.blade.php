<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset ('css/mytodo.css') }}">

</head>
<body>
    <header>
        <div class="header-text">
            <div class="header-left">
                <p>ToDoList</p>
            </div>
            <div class="header-right">
                <p class="weeklytodo">
                    {{-- <a href="{{ route ('share') }}"> --}}
                        Weekly To Do
                    {{-- </a> --}}
                </p>
                <p class="newcreate">
                    {{-- <a href="{{ route ('create') }}"> --}}
                    新規作成
                    {{-- </a> --}}
                </p>
    
            </div>
        </div>
    </header>

    <main>
        <fieldset class="mylist-box">
            <legend>My To Do</legend>
            <div class="checkbox">
                <input type="checkbox"/>
                <span>
                    {{-- <a href="{{ route ('detail') }}"></a> --}}
                報告書の提出</span>
            </div>
            <div class="checkbox">
                <input type="checkbox"/>
                <span>
                    {{-- <a href="{{ route ('detail') }}"></a> --}}
                会議資料の印刷</span>
            </div>
        </fieldset>
    </main>

    {{-- <div class="todo-wrapper">
        @foreach ($todos as $todo)
            <div class="todo-box">
                <div>{{ $todo->todo }}</div>
                <div class="destroy-btn">
                    @if ($tweet->user_id == Auth::user()->id)  
                        <form action="{{ route('destroy',[$tweet->id]) }}" method="post">
                            @csrf
                        <input type="submit" value="削除">
                        </form>
                    @endif
                </div>
            </div>
            <div style="padding: 10px 40px">
                @if($tweet->likedBy(Auth::user())->count() > 0)
                <a href="/likes/{{ $tweet->likedBy(Auth::user())->firstOrfail()->id }}"><i class="fas fa-heart-broken"></i></a>
                @else
                <a href="/tweets/{{ $tweet->id }}/likes"><i class="far fa-heart"></a></i>
                @endif
                {{ $tweet->likes->count() }}
            </div>
        @endforeach
        {{ $tweets->links() }}
    </div> --}}
<script src="{{ asset ('js/mytodo.js') }}"></script>
</body>
</html>