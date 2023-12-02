<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    //
    public function mytodo()
    {
        $todos = Todo::with('user')->orderBy('created_at','desc')->get();
        
        // dd($tweets);
        return view('mytodo',['todos' => $todos]);
    }

    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => ['required','string','max:30'],
        //     'content' => ['required','string','max:140'],
        //     'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        //     'day' => ['required'], // dayが必須であることを示す
        // ]);

        // if ($request->hasFile('image')){
        //     //アップロードされた場合の処理
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('image'),$imageName);
        //     $imagePath = 'images/' . $imageName;
        // }else {
        //     // 画像がアップロードされなかった場合
        //     $imagePath = null;
        // }

        $validatedData = $request->validate([
            'title' => ['required','string','max:30'],
            'content' => ['required','string','max:140'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'day' => ['required']
        ]);
        if ($request->has('share')) {
            $validatedData['day']= ['required'];
        }
        // 画像アップロード処理
        $imagePath = null;
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images',$imageName);
            $imagePath = 'images/' . $imageName;
        }

        $isShared = $request->has('share');
        $dayValue = $request->input('day');

        $todo = Todo::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath, //画像のフィールドを追加
            'share' => $request->has('share'), //'share' カラムの追加
            'day' => $dayValue, // カラムの追加

        ]);

        // 共有ボタンがチェックされているかどうかでリダイレクト先変更
        if ($isShared) {
            return redirect()->route('share')->with([
                'todoId' => $todo->id,
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
                'day' => $dayValue,
            ]);
        } else {
            return redirect()->route('mytodo')->with([
                'todoId' => $todo->id,
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
                'day' => $dayValue,
            ]);
        }
    
    }

    public function share()
    {
    // // $todos を取得するクエリを実行
    // $todos = Todo::with('user')->orderBy('created_at', 'desc')->get();
    // // $todos をビューに渡す
    // return view('share', compact('todos'));

    // $todos を取得するクエリを実行
    $todos = Todo::with('user')->orderBy('created_at', 'desc')->get();
    // 'day' フィールドが "other" のデータを取得
    $otherTodos = Todo::where('day', 'other')->get();
    // dd($otherTodos); // デバッグ出力を追加
    // $todos に 'other' のデータを結合
    $todos = $todos->merge($otherTodos);
    // $todos をビューに渡す
    return view('share', compact('todos'));
    }

    public function edit ($id)
    {
        $todo = Todo::find($id);

        return view('edit', compact('todo'));
    }

    public function detail($id)
    {
        $todo = Todo::findOrFail($id);
        return view('detail', ['todo' => $todo]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required','string','max:30'],
            'content' => ['required','string','max:140'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'day' => ['required']
        ]);

        $todo = Todo::find($id);
        $todo->title =$request->input('title');
        $todo->content = $request->input('content');
        $todo->day = $request->input('day');
        
        // 画像のアップロード処理
        if ($request->hasFile('image')) {
            // 古い画像が存在する場合、それを削除
            if ($todo->image) {
                Storage::delete('public/' . $todo->image);
            }

            $imagePath = $request->file('image')->store('public/images');
            $todo->image = 'images/' . basename($imagePath);
        }

        $todo->share = $request->has('share');
        $todo->save();

    


        // リダイレクト先
        // 'share' チェックボックスがチェックされているかどうかを確認
        $isShared = $request->has('share');

        // チェックボックスの値に基づいて適切なルートにリダイレクト
        if ($isShared) {
            return redirect()->route('share')->with('success', 'Todo updated successfully');
        } else {
            return redirect()->route('mytodo')->with('success', 'Todo updated successfully');
        }
    }


}