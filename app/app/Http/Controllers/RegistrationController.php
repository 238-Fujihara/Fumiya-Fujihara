<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\EdmondsPost;
use App\SeattlePost;
use App\User;
use Illuminate\Support\Facades\Auth;



class RegistrationController extends Controller

{    public $edmondspost;
    public $seattlepost;
    public function __construct(EdmondsPost $edmondspost, SeattlePost $seattlepost){
        $this->edmondspost = $edmondspost;
        $this->seattlepost = $seattlepost;
    }

    public function createEdmondsForm(){

        // $params = Type::where('category', '0')->where('user_id', Auth::id())->get();

        return view('create_edmonds');

    }
    public function createEdmonds(Request $request){

        // 新規postを作成
        $edmondspost = new EdmondsPost();
        $inputs=[];

        // バリデーションルール
        $inputs=request()->validate([
            'title'=>'required|max:255',
            'image'=>'required|image'
        ]);
                
        // 画像ファイルの保存場所指定
        if($request['image']){
            $filename=request()->file('image')->store('public/images');
            $inputs['image']=basename($filename);
        }

        $inputs['user_id'] = Auth::id();
        $inputs['title'] = $request->title;
        $inputs['date'] = $request->date;
                
        // postを保存
        $edmondspost->create($inputs);
        
        return redirect('/edmonds/post');
        
    }
    public function createSeattleForm(Request $request){

        return view('create_seattle');
    }
    
    public function createSeattle(Request $request){

        // 新規postを作成
        $seattlepost=new SeattlePost();
        $inputs=[];
        
        // バリデーションルール
        $inputs=request()->validate([
            'title'=>'required|max:255',
            'image'=>'required|image'
        ]);
                        
        // 画像ファイルの保存場所指定
        if($request['image']){
            $filename=request()->file('image')->store('public/images');
            $inputs['image']=basename($filename);
        }
        
        $inputs['user_id'] = Auth::id();
        $inputs['title'] = $request->title;
        $inputs['date'] = $request->date;
                        
        // postを保存
        $seattlepost->create($inputs);
                
        return redirect('/seattle/post');
    }
    public function EditEdmondsForm(){
        dd(1);


        return view('edmonds_edit');
    }

    

}
