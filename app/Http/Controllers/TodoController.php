<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $validatedData = $request->validate([
            'title' => ['required','string','max:30'],
            'content' => ['required','string','max:140'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'day' => ['required'], // dayが必須であることを示す
        ]);

        if ($request->hasFile('image')){
            //アップロードされた場合の処理
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'),$imageName);
            $imagePath = 'images/' . $imageName;
        }else {
            // 画像がアップロードされなかった場合
            $imagePath = null;
        }

        $isShared = $request->has('share');
        $dayValue = $request->input('day');

        Todo::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath, //画像のフィールドを追加
            'share' => $request->has('share'), //'share' カラムの追加
            'day' => $dayValue, // カラムの追加

        ]);

        return redirect()->route('mytodo');

    
    }
}