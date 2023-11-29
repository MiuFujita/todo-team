<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

// class PostController extends Controller
// {
//     //
//     public function mytodo()
//     {
//         $todos = Post::with('user')->orderBy('created_at','desc')->get();
        
//         // dd($tweets);
//         return view('/mytodo',['todos' => $todos]);
//     }

//     public function create()
//     {
//         return view('create');
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'content' => ['required','string','max:140'],
//         ]);


//         // $todo = new \App\Models\Post();
//         // $todo ->user_id = Auth::user()->id;
//         // $todo ->content = $validatedData['content'];
//         // $todo->save();

//         // return redirect()->route('mytodo');

//         try{
//             DB::beginTransaction();

//             Post::create([
//                 'user_id' => Auth::user()->id,
//                 'post' => $request->content,
//             ]);

//             DB::commit();
            
//             return redirect()->route('mytodo');

//         } catch(\Exception $e){
//             DB::rollback();
//             // バリデーションエラーが発生した場合の処理
//             Log::error('データ保存中にエラーが出ました：'. $e->getMessage());

//             //例外メッセージを取得してリダイレクトするか、エラーメッセージを表示するかなどの処理
//             return redirect()->back()->withErrors(['error'=>'データ保存中にエラーが発生しました。']);
//         }


    
//     }

// }
