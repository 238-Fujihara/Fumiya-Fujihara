<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\EdmondsPost;
use App\SeattlePost;
use App\WashingtonPost;
use App\LAPost;
use App\TexasPost;
use App\ColoradoPost;

use App\User;
use Illuminate\Support\Facades\Auth;



class RegistrationController extends Controller

{    public $edmondspost;
    public $seattlepost;
    public $washingtonpost;
    public $lapost;
    public $texaspost;
    public $coloradopost;


    public function __construct(EdmondsPost $edmondspost, SeattlePost $seattlepost, WashingtonPost $washingtonpost, LAPost $lapost, TexasPost $texaspost, ColoradoPost $coloradopost){
        $this->edmondspost = $edmondspost;
        $this->seattlepost = $seattlepost;
        $this->washingtonpost = $washingtonpost;
        $this->lapost = $lapost;
        $this->texaspost = $texaspost;
        $this->coloradopost = $coloradopost;


    }

    public function createEdmondsForm(){

        return view('create_edmonds');

    }
    public function createEdmonds(Request $request){

        // 新規postを作成
        $edmondspost = new EdmondsPost();
        $inputs=[];

        // バリデーションルール
        $inputs=request()->validate([
            'title'=>'required|max:20',
            'date' =>'required',
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
        
        return redirect('/public/edmonds');
        
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
            'title'=>'required|max:20',
            'date' =>'required',
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
                
        return redirect('/public/seattle');
    }
    public function createWAForm(){

        return view('create_washington');

    }
    public function createWA(Request $request){

        // 新規postを作成
        $washingtonpost = new WashingtonPost();
        $inputs=[];

        // バリデーションルール
        $inputs=request()->validate([
            'title'=>'required|max:20',
            'date' =>'required',
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
        $washingtonpost->create($inputs);
        
        return redirect('/public/washington');
        
    }
    public function createLAForm(){

        return view('create_la');

    }
    public function createLA(Request $request){

        // 新規postを作成
        $lapost = new LAPost();
        $inputs=[];

        // バリデーションルール
        $inputs=request()->validate([
            'title'=>'required|max:20',
            'date' =>'required',
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
        $lapost->create($inputs);
        
        return redirect('/public/la');
        
    }    public function createTexasForm(){

        return view('create_texas');

    }
    public function createTexas(Request $request){

        // 新規postを作成
        $texaspost = new TexasPost();
        $inputs=[];

        // バリデーションルール
        $inputs=request()->validate([
            'title'=>'required|max:20',
            'date' =>'required',
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
        $texaspost->create($inputs);
        
        return redirect('/public/texas');
        
    }
    public function createColoradoForm(){

        return view('create_colorado');

    }
    public function createcolorado(Request $request){

        // 新規postを作成
        $coloradopost = new ColoradoPost();
        $inputs=[];

        // バリデーションルール
        $inputs=request()->validate([
            'title'=>'required|max:20',
            'date' =>'required',
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
        $coloradopost->create($inputs);
        
        return redirect('/public/colorado');
        
    }




    public function CreateProfile(Request $request){

        $profile = User::where('pofile_image');
        $inputs=[];

        // 画像ファイルの保存場所指定
        if($request['image']){
            $filename=request()->file('image')->store('public/images');
            $inputs['image']=basename($filename);
        }
        
        return view('mypage',[
            "profile" => $profile,
        ]);
    }
}
