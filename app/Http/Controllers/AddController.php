<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Add;
use App\Models\Todo;

class AddController extends Controller
{
    //

    public function store(Request $request)
    {
        $add = new Add();
        $add->todo_id = $request->todo_id;
        $add->user_id = Auth::user()->id;

        // 既存の重複をチェック
        $existingAdd = Add::where('todo_id', $add->todo_id)->where('user_id', $add->user_id)->first();

        if ($existingAdd) {
            // 重複がある場合の処理
            return response()->json(['message' => 'Add already exists'], 422);
        }

        // 重複がない場合のみ保存
        $add->save();

        // Todo モデルからデータを取得
        $todo = Todo::find($request->todo_id);

        // $adds を取得する例
        // $adds = Add::all(); // または Add::latest()->get(); など、必要なクエリを追加
        $adds = Add::orderBy('created_at', 'desc')->get(); // created_at は適切なカラムに変更してください


        // ビューにデータを渡す
        return view('mytodo', ['todo' => $todo, 'adds' => $adds, 'todo_id' => $request->todo_id]);
        // return redirect()->route('mytodo');
    
    }    

    public function destroy($todo_id,Request $request)
    {
        $user_id = Auth::user()->id;

        //削除対象のAddを検索
        $add = Add::where('todo_id',$todo_id)->where('user_id',$user_id)->first(); 

        if(!$add){
            // Addが見つからない場合のエラー処理など
            return redirect()->route('todo.detail',['id' => $todo_id])->with('error','Add not found');
        }

        // Addを削除
        $add->delete();

        // データを再取得
        $todo = Todo::find('$todo_id');
        $adds = Add::all();
    
        return redirect()->route('mytodo');

        
    }

}