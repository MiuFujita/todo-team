<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>my to do list</h1>
    <div class="todo-wrapper">
        @foreach ($todos as $todo)
            <div class="todo-box">
                <div>{{ $todo->todo }}</div>
                {{-- <div class="destroy-btn">
                    @if ($tweet->user_id == Auth::user()->id)  
                        <form action="{{ route('destroy',[$tweet->id]) }}" method="post">
                            @csrf
                        <input type="submit" value="削除">
                        </form>
                    @endif
                </div> --}}
            </div>
            {{-- <div style="padding: 10px 40px">
                @if($tweet->likedBy(Auth::user())->count() > 0)
                <a href="/likes/{{ $tweet->likedBy(Auth::user())->firstOrfail()->id }}"><i class="fas fa-heart-broken"></i></a>
                @else
                <a href="/tweets/{{ $tweet->id }}/likes"><i class="far fa-heart"></a></i>
                @endif
                {{ $tweet->likes->count() }}
            </div> --}}
        @endforeach
        {{-- {{ $tweets->links() }} --}}
    </div>

</body>
</html>