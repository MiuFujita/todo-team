<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoList</title>
    <link rel="stylesheet" href="{{ asset ('css/mytodo.css') }}">
    <link href="https://use.fontawesome.com/releases/v6.5.1/css/all.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-text">
            <div class="header-left">
                <p>ToDoList</p>
            </div>
            <div class="header-right">
                <div class="weeklytodo">
                    <a href="{{ route ('share') }}">
                        Weekly To Do
                    </a>
                </div>
                <div class="newcreate">
                    <a href="{{ route ('create') }}">
                        新規作成
                    </a>
                </div>
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
        </div>
    </header>
    <main>
        <fieldset class="mylist-box">
        <legend>My To Do</legend>
        @foreach($todos as $todo)
            @if(!$todo->share)
                <div class="checkbox">
                    <input type="checkbox" onclick="destroyTodo(this, '{{ route('todo.destroy' , ['id' => $todo->id]) }}')"/>
                    <a href="{{ route('detail', ['id' => $todo->id]) }}">
                        {{ $todo->title }} - {{ $todo->share ? 'Shared' : 'Not Shared' }}
                    </a>
                    {{-- 他のデータの表示ロジックを追加 --}}
                </div>
            @endif
        @endforeach

        </fieldset>
    </main>
    <script src="{{ asset ('js/mytodo.js') }}"></script>
    
    <footer>
        <div class="homeicon">
            <a href="{{ route('mytodo') }}"><i class="fa-solid fa-user" style="font-size: 1.5em;"></i></a>
        </div>
        <div class="shareicon">
            <a href="{{ route('share') }}"><i class="fa-regular fa-calendar" style="font-size: 1.5em;"></i></a>
        </div>
        <div class="createicon">
            <a href="{{ route('create') }}"><i class="fa-regular fa-square-plus" style="font-size: 1.5em;"></i></a>
        </div>
        <div class="logouticon dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket" style="font-size: 1.5em;"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </footer>
</body>
</html>