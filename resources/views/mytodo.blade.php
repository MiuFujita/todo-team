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
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="header-right">
                <p class="weeklytodo">
                    <a href="{{ route ('share') }}">Weekly To Do</a>
                </p>
                <p class="newcreate">
                    <a href="{{ route ('create') }}">新規作成</a>
                </p>
    
            </div>
        </div>
    </header>
    <main>
        <fieldset class="mylist-box">
        <legend>My To Do</legend>
        @foreach($todos as $todo)
            @if(!$todo->share)
                <div class="checkbox">
                    <input type="checkbox"/>
                    <a href="{{ route('detail', ['id' => $todo->id]) }}">
                        {{ $todo->title }} - {{ $todo->share ? 'Shared' : 'Not Shared' }}
                    </a>
                    {{-- 他のデータの表示ロジックを追加 --}}
                </div>
            @endif
        @endforeach

        </fieldset>
    </main>
    
            {{-- <div style="padding: 10px 40px">
                @if($tweet->likedBy(Auth::user())->count() > 0)
                <a href="/likes/{{ $tweet->likedBy(Auth::user())->firstOrfail()->id }}"><i class="fas fa-heart-broken"></i></a>
                @else
                <a href="/tweets/{{ $tweet->id }}/likes"><i class="far fa-heart"></a></i>
                @endif
                {{ $tweet->likes->count() }}
            </div> --}}
        {{-- @endforeach --}}
        {{-- {{ $tweets->links() }} --}}
    {{-- </div> --}}
    <script src="{{ asset ('js/mytodo.js') }}"></script>
    
</body>
</html>