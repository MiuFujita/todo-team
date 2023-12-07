<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Add;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TodoController extends Controller
{
    //
    public function mytodo()
    {
        // ログインユーザーのIDを取得
        $userId = Auth::id();

        // ログインユーザーに関連するタスクを取得
        $todos = Todo::where('user_id', $userId)
        
        ->with('user') // 必要に応じてユーザーリレーションを取得
        ->orderBy('created_at', 'desc')
        ->get();

        // AddController からデータを取得
       $adds = Add::all();
       
       // ビューにデータを渡す
       return view('mytodo', ['todos' => $todos, 'adds' => $adds]); 
       
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

        $dayValue = $request->input('day');
        $isShared = $request->input('share', false);
        

        $todo = Todo::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath, //画像のフィールドを追加
            'share' => $request->has('share'), //'share' カラムの追加
            'day' => $dayValue, // カラムの追加

        ]);

        // 共有ボタンがチェックされているかどうかでリダイレクト先変更
        return redirect()->route($isShared ? 'share' : 'mytodo', ['todoId' => $todo->id]);
    }

    public function share()
    {
        // $todos を取得するクエリを実行
        $todos = Todo::with('user')->orderBy('created_at', 'desc')->get();
    
        // 'day' フィールドが "other" のデータを取得
        $otherTodos = Todo::where('day', 'other')->get();

        // $otherTodos の各要素の share フラグを false に設定
        $otherTodos->each(function ($todo) {
            $todo->share = false;
        });

        // $todos に 'other' のデータを結合
        $todos = $todos->merge($otherTodos->whereNotIn('id', $todos->pluck('id')));

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
        }elseif ($request->has('remove_image')) {
            //古い画像を削除する処理
            Storage::delete('public/' . $todo->image);
            $todo->image = null;
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

    public function delete($id, Request $request)
    {
        // Todoレコードを検索
        $todo = Todo::find($id);

        // ユーザーがこのTodoを削除する権限があるか確認
        if (auth()->check() && $todo && auth()->user()->id == $todo->user_id) {

            // Todoを削除
            $todo->delete();

            $referer = $request->input('referer');

            if (Str::contains($referer, 'mytodo')) {
                return redirect()->route('mytodo');
            } elseif (Str::contains($referer, 'share')) {
                return redirect()->route('share');
            } else {
                // リファラーが不明な場合のデフォルトのリダイレクト
                return redirect()->route('home');
            }

        }

    }

    public function destroy($id) {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json(['message' => 'ToDo deleted successfully']);


    }
}