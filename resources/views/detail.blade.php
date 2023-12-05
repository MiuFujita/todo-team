<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
                    {{-- <tr>
                        <th>写真</th>
                        <td><img src="{{ asset('images/' . $todo->image) }}" alt="Todo Image"></td>
                    </tr> --}}
                    @if($todo->image)
                    <tr>
                    <th>写真</th>
                    <td><img src="{{ asset('storage/' . $todo->image) }}" alt="Todo Image"></td>
                    </tr>
                    @else
                    <tr>
                        <th>写真</th>
                        <td>画像なし</td>
                    </tr>
                    @endif
                    <tr>
                        <th>期限</th>
                        <td>{{ $todo->day }}</td>
                    </tr>
                    {{-- <tr>
                        <th>共有</th>
                    </tr> --}}
                </tbody>
            </table>

        </div>

        @if(Auth::check())
        <!-- 認証済みユーザーの場合 -->
            @if(Auth::user()->id == $todo->user_id)
                <!-- 投稿者の場合 -->
                <!-- 編集ボタンや削除ボタンの表示 -->
                <button type="button" class="edit-btn">編集</button>
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
                <button type="submit" onclick="addTomytodo({{ $todo->id }})" class="add-btn">Mytodoに追加</button>
                @endif
            @endif
        @endif
        <button type="button" onclick="history.back()" class="return-btn">戻る</button>
    </div>
</body>
</html>