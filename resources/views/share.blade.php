<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoList</title>
    <link rel="stylesheet" href="{{ asset ('css/share.css') }}">
    <link href="https://use.fontawesome.com/releases/v6.5.1/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
<body>
    <header>
        <div class="header-text">
            <div class="header-left">
                <p>ToDoList</p>
            </div>
            <div class="header-right">
                <div class="mytodo">
                    <a href="{{ route ('mytodo') }}">
                        My To Do
                    </a>
                </div>
                <div class="newcreate">
                    <a href="{{ route ('create') }}">新規作成</a>
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
        <div class="share-main">
            Weekly To Do
        </div>
        <fieldset class="share-box">
          <div class="monday">
            <legend>Monday</legend>
        
            @foreach($todos->where('day','monday')->take(10) as $todo)
            @if($todo->share)
                    <div class="checkbox">
                        <input type="checkbox" onclick="destroyTodo(this, '{{ route('todo.destroy' , ['id' => $todo->id]) }}')"/>
                            <span>
                                <a href="{{ route('detail', ['id' => $todo->id]) }}">
                                    {{ $todo->title }} 
                                    {{-- - {{ $todo->share ? 'Shared' : 'Not Shared' }} --}}
                                </a>  
                            </span>
                            
                    </div>
            @endif
            @endforeach
          </div>
          <div class="tuesday">
            <legend>Tuesday</legend>
        
            @foreach($todos->where('day','tuesday')->take(10) as $todo)
            @if($todo->share)
                    <div class="checkbox">
                        <input type="checkbox" onclick="destroyTodo(this, '{{ route('todo.destroy' , ['id' => $todo->id]) }}')"/>
                            <span>
                                <a href="{{ route('detail', ['id' => $todo->id]) }}">
                                    {{ $todo->title }} 
                                    {{-- - {{ $todo->share ? 'Shared' : 'Not Shared' }} --}}
                                </a>  
                            </span>
                    </div>
            @endif
            @endforeach
          </div>
          <div class="wednesday">
            <legend>Wednesday</legend>
            @foreach($todos->where('day','wednesday')->take(10) as $todo)
            @if($todo->share)
                    <div class="checkbox">
                        <input type="checkbox" onclick="destroyTodo(this, '{{ route('todo.destroy' , ['id' => $todo->id]) }}')"/>
                            <span>
                                <a href="{{ route('detail', ['id' => $todo->id]) }}">
                                    {{ $todo->title }} 
                                    {{-- - {{ $todo->share ? 'Shared' : 'Not Shared' }} --}}
                                </a>  
                            </span>
                    </div>
            @endif
            @endforeach
        
            
          </div>
          <div class="thursday">
            <legend>Thursday</legend>

            @foreach($todos->where('day','thursday')->take(10) as $todo)
            @if($todo->share)
                    <div class="checkbox">
                        <input type="checkbox" onclick="destroyTodo(this, '{{ route('todo.destroy' , ['id' => $todo->id]) }}')"/>
                            <span>
                                <a href="{{ route('detail', ['id' => $todo->id]) }}">
                                    {{ $todo->title }} 
                                    {{-- - {{ $todo->share ? 'Shared' : 'Not Shared' }} --}}
                                </a>  
                            </span>
                    </div>
            @endif
            @endforeach
        
            
          </div>
          <div class="friday">
            <legend>Friday</legend>
        
            @foreach($todos->where('day','friday')->take(10) as $todo)
            @if($todo->share)
                    <div class="checkbox">
                        <input type="checkbox" onclick="destroyTodo(this, '{{ route('todo.destroy' , ['id' => $todo->id]) }}')"/>
                            <span>
                                <a href="{{ route('detail', ['id' => $todo->id]) }}">
                                    {{ $todo->title }} 
                                    {{-- - {{ $todo->share ? 'Shared' : 'Not Shared' }} --}}
                                </a>  
                            </span>
                    </div>
            @endif
            @endforeach
          </div>
          <div class="saturday">
            <legend>Saturday</legend>
        
            @foreach($todos->where('day','saturday')->take(10) as $todo)
            @if($todo->share)
                    <div class="checkbox">
                        <input type="checkbox" onclick="destroyTodo(this, '{{ route('todo.destroy' , ['id' => $todo->id]) }}')"/>
                            <span>
                                <a href="{{ route('detail', ['id' => $todo->id]) }}">
                                    {{ $todo->title }} 
                                    {{-- - {{ $todo->share ? 'Shared' : 'Not Shared' }} --}}
                                </a> 
                            </span>
                    </div>
            @endif
            @endforeach
          </div>
          <div class="sunday">
            <legend>Sunday</legend>
        
            @foreach($todos->where('day','sunday')->take(10) as $todo)
            @if($todo->share)
                    <div class="checkbox">
                        <input type="checkbox" onclick="destroyTodo(this, '{{ route('todo.destroy' , ['id' => $todo->id]) }}')"/>
                            <span>
                                <a href="{{ route('detail', ['id' => $todo->id]) }}">
                                    {{ $todo->title }} 
                                    {{-- - {{ $todo->share ? 'Shared' : 'Not Shared' }} --}}
                                </a> 
                                
                            </span>
                    </div>
            @endif
            @endforeach

          </div>
          <div class="other">
            <legend>Other</legend>

            {{-- デバッグコード --}}
            {{-- @php
            $otherTodos = $todos->where('day', 'other')->take(10)->toArray();
            dd($otherTodos);
            @endphp --}}

        
            @foreach($todos->where('day','other')->take(10) as $todo)
            @if($todo->share && $todo->day === 'other')
                    <div class="checkbox">
                        <input type="checkbox" onclick="destroyTodo(this, '{{ route('todo.destroy' , ['id' => $todo->id]) }}')"/>
                            <span>
                                <a href="{{ route('detail', ['id' => $todo->id]) }}">
                                    {{ $todo->title }} 
                                    {{-- - {{ $todo->share ? 'Shared' : 'Not Shared' }} --}}
                                </a>  
                                
                            </span>
                    </div>
            @endif
            @endforeach

          </div>
        
          
      </fieldset>

      
          
    </main>

    <footer>
        <div class="footer">
            <div class="homeicon">
                <a href="{{ route('mytodo') }}"><i class="fa-regular fa-user" style="font-size: 1.5em;"></i></a>
            </div>
            <div class="shareicon">
                <a href="{{ route('share') }}"><i class="fa-solid fa-calendar" style="font-size: 1.5em;"></i></a>
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
        </div>
    </footer>


    <script src="{{ asset ('js/share.js') }}"></script>
</body>

</html>