@php
    function convertToJapaneseDay($englishDay)
    {
        $dayTranslations = [
            'monday' => '月曜日',
            'tuesday' => '火曜日',
            'wednesday' => '水曜日',
            'thursday' => '木曜日',
            'friday' => '金曜日',
            'saturday' => '土曜日',
            'sunday' => '日曜日',
        ];

        return $dayTranslations[strtolower($englishDay)] ?? $englishDay;
    }
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset ('css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/lightbox.css') }}">
    <link href="https://use.fontawesome.com/releases/v6.5.1/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
    <title>ToDoList</title>
</head>
<body>
    <header>
        <div class="header-text">
            <div class="header-left">
                <p>ToDoList</p>
            </div>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <div class="detail-box">
                {{-- thタグの中身は新規投稿と同じで --}}
                <table>
                    <tbody class="detail-table">
                        <tr>
                            <th>タスク</th>
                            <td>{{ $todo->title }}</td>
                            
                        </tr>
                        <tr>
                            <th>内容</th>
                            <td>{{ $todo->content }}</td>
                        </tr>
                        @if($todo->image)
                        <tr>
                            <th>写真</th>
                            <td><a href="{{ asset('storage/' . $todo->image) }}" data-lightbox="todo-gallery" data-title="Todo Image"><img src="{{ asset('storage/' . $todo->image) }}" alt="Todo Image"></a></td>
                        </tr>
                        @else
                        <tr>
                            <th>写真</th>
                            <td>画像なし</td>
                        </tr>
                        @endif

                        <tr>
                            <th>期限</th>
                            <td>{{ convertToJapaneseDay($todo->day) }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="btn-index">
            <button type="button" onclick="history.back()" class="return-btn">戻る</button>
            @if(Auth::check())
            <!-- 認証済みユーザーの場合 -->
                @if(Auth::user()->id == $todo->user_id)
                    <!-- 投稿者の場合 -->
                    <!-- 編集ボタンや削除ボタンの表示 -->
                    <button type="button" onclick="window.location='{{ route('edit', ['id' => $todo->id]) }}'" class="edit-btn">編集</button>
                    <form method="post" action="{{ route('todo.delete', ['id' => $todo->id]) }}">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="referer" value="{{ url()->previous() }}">
                        <button type="submit" class="delete-btn">削除</button>
                    </form>
                @else
                    <!-- 投稿者でない場合 -->
                    @if($todo->share)
                    <!-- 共有されている場合のみ表示 -->
                    <button type="submit" onclick="window.location='{{ route('mytodo') }}" class="add-btn">Mytodoに追加</button>
                    @endif
                @endif
            @endif
            

        </div>
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
    <script src="{{ asset ('js/lightbox-plus-jquery.js') }}"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    </script>
    
</body>
</html>