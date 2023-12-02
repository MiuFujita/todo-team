<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('todo.update', ['id' => $todo->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>タイトル</label>
        <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title" value="{{ $todo->title }}">
    </div>
    <div class="form-group">
        <label>内容</label>
        <textarea class="form-control" placeholder="内容" rows="5" name="content">{{ $todo->content }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">写真</label>
        <input id="image" type="file" class="form-control" name="image" value="{{ $todo->image }}">

        @if($todo->image)
          <img src="{{ asset('image/' . $todo->image) }}" alt="Todo Image">
        @endif
    </div>
    <div class="form-group">
        <label>期限</label>
        <input type="radio" name="day" value="monday" {{ $todo->day == 'monday' ? 'checked' : '' }}>Monday
        <input type="radio" name="day" value="tuesday" {{  $todo->day == 'tuesday' ? 'checked' : '' }}>Tuesday
        <input type="radio" name="day" value="wednesday" {{ $todo->day == 'wednesday' ? 'checked' : '' }}>Wednesday
        <input type="radio" name="day" value="thursday" {{ $todo->day == 'thursday' ? 'checked' : '' }}>Thursday
        <input type="radio" name="day" value="friday" {{ $todo->day == 'friday' ? 'checked' : '' }}>Friday
        <input type="radio" name="day" value="saturday" {{ $todo->day == 'saturday' ? 'checked' : '' }}>Saturday
        <input type="radio" name="day" value="sunday" {{ $todo->day == 'sunday' ? 'checked' : '' }}>Sunday
        <input type="radio" name="day" value="Other" {{ $todo->day == 'other' ? 'checked' : '' }}>Other
    </div>
    <div class="form-group">
        <input type="checkbox" name="share" value="share" {{ $todo->share ? 'checked' : '' }}>共有する
    </div>
    <button type="submit" class="btn btn-primary">更新</button>
    </form>
</body>
</html>