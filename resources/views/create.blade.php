{{-- 仮です --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="form-group">
        <label>タイトル</label>
        <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title">
    </div>
    <div class="form-group">
        <label>内容</label>
        <textarea class="form-control" placeholder="内容" rows="5" name="body">
        </textarea>
    </div>
    <div class="form-group">
        <label for="avatar">写真</label>
        <input id="avatar" type="file" class="form-control" name="avatar">
    </div>
    <div class="form-group">
        <label>期限</label>
        <input type="radio" name="day" value="monday">Monday
        <input type="radio" name="day" value="tuesday">Tuesday
        <input type="radio" name="day" value="wednesday">Wednesday
        <input type="radio" name="day" value="thursday">Thursday
        <input type="radio" name="day" value="friday">Friday
        <input type="radio" name="day" value="saturday">Saturday
        <input type="radio" name="day" value="sunday">Sunday
        <input type="radio" name="day" value="Other">Other
    </div>
    <div class="form-group">
        <input type="checkbox" name="share" value="share">共有する
    </div>
    <button type="submit" class="btn btn-primary">作成</button>
</body>
</html>