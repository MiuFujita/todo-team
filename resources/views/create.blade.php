<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>タイトル</label>
        <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title" maxlength="30">
    </div>
    <div class="form-group">
        <label>内容</label>
        <textarea class="form-control" placeholder="内容" rows="3" name="content" maxlength="140">
        </textarea>
    </div>
    <div class="form-group">
        <label for="image">写真</label>
        <input id="image" type="file" class="form-control" name="image">
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
    </form>
</body>
</html>