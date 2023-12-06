<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
    <link rel="stylesheet" href="{{ asset ('css/edit.css') }}">
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
                <p class="cancel-btn">
                    <a href="javascript:history.back();">キャンセル</a>
                </p>
    
            </div>
        </div>
    </header>
    <main>
        <form id="todoForm" action="{{ route('todo.update', ['id' => $todo->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>タイトル</label>
            <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title" value="{{ $todo->title }}">
            @error('title')
            <div class="text-danger" style="color: red;">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group">
            <label>内容</label>
            <textarea class="form-control" placeholder="内容" rows="5" name="content">{{ $todo->content }}</textarea>
            @error('content')
            <div class="text-danger" style="color: red;">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group">
            <label for="image">写真</label>
            <input id="image" type="file" class="form-control" name="image" value="{{ $todo->image }}" onchange="previewImage(this)">

            @if($todo->image)
            <img id="image-preview" src="{{ asset('storage/' . $todo->image) }}" alt="Todo Image">
                <div class="form-check" id="image-delete">
                    <input class="form-check-input" type="checkbox" name="remove_image" id="remove_image"> 写真を削除する
                </div>
            @else
            <img id="image-preview" src="" alt="">
            @endif
        </div>
        {{-- <div class="form-group">
            <label for="image">写真</label>
            <input id="image" type="file" class="form-control" name="image" value="{{ $todo->image }}" onchange="previewImage(this)">
        
            @if($todo->image)
                <img id="image-preview" src="{{ asset('storage/' . $todo->image) }}" alt="Todo Image">
                <div class="form-check" id="image-delete">
                    <input class="form-check-input" type="checkbox" name="remove_image" id="remove_image"> 写真を削除する
                </div>
            @else
                <img id="image-preview" src="" alt="Todo Image" style="display: none;">
            @endif
        </div> --}}
        <div class="form-group">
            <label>期限</label>
            <div class="day">
                <input type="radio" name="day" value="monday" {{ $todo->day == 'monday' ? 'checked' : '' }}>月曜日
                <input type="radio" name="day" value="tuesday" {{  $todo->day == 'tuesday' ? 'checked' : '' }}>火曜日
                <input type="radio" name="day" value="wednesday" {{ $todo->day == 'wednesday' ? 'checked' : '' }}>水曜日
                <input type="radio" name="day" value="thursday" {{ $todo->day == 'thursday' ? 'checked' : '' }}>木曜日
                <input type="radio" name="day" value="friday" {{ $todo->day == 'friday' ? 'checked' : '' }}>金曜日
                <input type="radio" name="day" value="saturday" {{ $todo->day == 'saturday' ? 'checked' : '' }}>土曜日
                <input type="radio" name="day" value="sunday" {{ $todo->day == 'sunday' ? 'checked' : '' }}>日曜日
                <input type="radio" name="day" value="other" {{ $todo->day == 'other' ? 'checked' : '' }}>その他
                @error('day')
                <div class="text-danger" style="color: red;">{{ $message }}</div>
            @enderror    
            </div>
        </div>
        <div class="share-form">
            <input type="checkbox" name="share" value="share" {{ $todo->share ? 'checked' : '' }}> 共有する
        </div>
        <div class="upload-btn">
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
        </form>
    </main>

    <footer>
        <div class="homeicon">
            <a href="{{ route('mytodo') }}"><i class="fa-regular fa-user" style="font-size: 1.5em;"></i></a>
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
    <script src="{{ asset ('js/edit.js') }}"></script>
</body>
</html>