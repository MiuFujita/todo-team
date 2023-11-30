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
                        <td>メールの返信</td>
                    </tr>
                    <tr>
                        <th>内容</th>
                        <td>〇〇株式会社に〇〇が返信をする</td>
                    </tr>
                    <tr>
                        <th>写真</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>期限</th>
                        <td>水</td>
                    </tr>
                </tbody>
            </table>

        </div>
        <button type="button" onclick="" class="edit-btn">編集</button>
        <button type="button" onclick="" class="delete-btn">削除</button>
        {{-- ↓typeはsubmitかな？ --}}
        <button type="button" onclick="" class="add-btn">Mytodoに追加</button>
        <button type="button" onclick="history.back()" class="return-btn">戻る</button>
    </div>
</body>
</html>