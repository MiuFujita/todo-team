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
                    <tr>
                        <th>写真</th>
                        <td><img src="{{ asset('images/' . $todo->image) }}" alt="Todo Image"></td>
                    </tr>
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
        <button type="button" onclick="" class="edit-btn">編集</button>
        <button type="button" onclick="history.back()" class="delete-btn">削除</button>
        <button type="submit" onclick="" class="add-btn">Mytodoに追加</button>
        <button type="button" onclick="history.back()" class="return-btn">戻る</button>
    </div>
</body>
</html>