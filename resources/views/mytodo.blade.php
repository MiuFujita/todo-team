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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
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
            @if(isset($adds))
                @foreach($adds as $add)
                <legend>Share My Todo</legend>

                <!-- ここで $adds のデータを使用 -->
                <div class="checkbox">
                    {{-- <input type="checkbox" data-todo-id="{{ $add->todo_id }}" onchange="destroyAdd(this, '{{ route('add.destroy', ['id' => $add->todo_id]) }}')"/> --}}
                    <a href="{{ route('detail', ['id' => $add->todo_id]) }}">
                        {{ $add->todo->title }}
                    </a>

                </div> 
                @endforeach
            @endif
        </fieldset>
        <fieldset class="mylist-box">
            <legend>My To Do</legend>
            @if(isset($todos))
            @foreach($todos as $todo)
            <!-- ここで $todos のデータを使用 -->
            @if(!$todo->share)
            <div class="checkbox">
                <input type="checkbox" onclick="destroyTodo(this, '{{ route('todo.destroy' , ['id' => $todo->id]) }}')"/>
                <a href="{{ route('detail', ['id' => $todo->id]) }}">
                    {{ $todo->title }} 
                </a>
            </div>
            @endif
            @endforeach
            @endif
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