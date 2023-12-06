<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
    <link rel="stylesheet" href="{{ asset ('css/create.css') }}">
    <link href="https://use.fontawesome.com/releases/v6.5.1/css/all.css" rel="stylesheet">

</head>
<body>
    <header>
        <div class="header-text">
            <div class="header-left">
                <p>ToDoList</p>
                {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div> --}}
            </div>
            <div class="header-right">
                <p class="cancel-btn">
                    <a href="javascript:history.back();">キャンセル</a>
                </p>
    
            </div>
        </div>
    </header>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" id="todoForm">
    @csrf
    <div class="form">
        <div class="form-group">
            <label>タイトル</label>
            <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title">
            @error('title')
                <div class="text-danger" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>内容</label>
            <textarea class="form-control" placeholder="内容" rows="8" name="content"></textarea>
            @error('content')
                <div class="text-danger" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">写真</label>
            <input id="image" type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
            <label>期限</label>
            <div class="day">
                <input type="radio" name="day" value="monday">月曜日
                <input type="radio" name="day" value="tuesday">火曜日
                <input type="radio" name="day" value="wednesday">水曜日
                <input type="radio" name="day" value="thursday">木曜日
                <input type="radio" name="day" value="friday">金曜日
                <input type="radio" name="day" value="saturday">土曜日
                <input type="radio" name="day" value="sunday">日曜日
                <input type="radio" name="day" value="other">その他
                @error('day')
                    <div class="text-danger" style="color: red;">{{ $message }}</div>
                @enderror    
            </div>
        </div>
        <div class="share-form">
            <input type="hidden" name="is_shared" value="{{ old('is_shared', session('isShared', false)) }}">
            <input type="checkbox" name="share" value="share"> 共有する
            
        </div>
        <div class="create-btn">
            <button type="submit" class="btn btn-primary">作成</button>
    
        </div>
    
    </div>
    </form>
    <footer>
        <div class="homeicon">
            <a href="{{ route('mytodo') }}"><i class="fa-regular fa-user" style="font-size: 1.5em;"></i></a>
        </div>
        <div class="shareicon">
            <a href="{{ route('share') }}"><i class="fa-regular fa-calendar" style="font-size: 1.5em;"></i></a>
        </div>
        <div class="createicon">
            <a href="{{ route('create') }}"><i class="fa-solid fa-square-plus" style="font-size: 1.5em;"></i></a>
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

    <script src="{{ asset ('js/create.js') }}"></script>
</body>
</html>
