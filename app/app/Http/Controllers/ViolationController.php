<?php

namespace App\Http\Controllers;
use App\EdmondsPost;
use App\SeattlePost;
use App\Badbutton;
use Illuminate\Support\Facades\Auth;




use Illuminate\Http\Request;

class ViolationController extends Controller
{
    public function edviolationform($id){


        return view('edviolationform',[
            "id" => $id,
        ]);
    }
    public function edviolation(Request $request){

        $badbuttons = New Badbutton;
        $inputs=[];

        // // バリデーションルール
        // $inputs=request()->validate([
        //     'reason' =>'required|max:200',
        // ]);
                
        // // 画像ファイルの保存場所指定
        // if($edmondsPost['image']){
        //     $filename=request()->file('image')->store('public/images');
        //     $inputs['image']=basename($filename);
        // }

        $inputs['user_id']=(int)$request->user_id;
        $inputs['reason']=$request->reason;
        $inputs['edmondspost_id']=(int)$request->edmondspost_id; 
        $inputs['seattlepost_id']=(int)$request->seattlespost_id;


                
        // postを保存
        $badbuttons->create($inputs);
        
        return redirect('/public/edmonds');
        
    }
    public function seaviolationform($id){

        return view('seaviolationform',[
            "id" => $id,
        ]);

    }

    public function seaviolation(Request $request){

        $badbuttons = New Badbutton;
        $inputs=[];

        // // バリデーションルール
        // $inputs=request()->validate([
        //     'reason' =>'required|max:200',
        // ]);
                
        // // 画像ファイルの保存場所指定
        // if($edmondsPost['image']){
        //     $filename=request()->file('image')->store('public/images');
        //     $inputs['image']=basename($filename);
        // }

        $inputs['user_id']=(int)$request->user_id;
        $inputs['reason']=$request->reason;
        $inputs['edmondspost_id']=(int)$request->edmondspost_id; 
        $inputs['seattlepost_id']=(int)$request->seattlespost_id;


                
        // postを保存
        $badbuttons->create($inputs);
        
        return redirect('/public/seattle');
        
    }


    public function violationedit(Request $request)
    {
        return view('violationedits',[
            'edposts' => $edmondsPost,
        ]);
    }
    // public function violationconfirm(Badbutton $badbutton){

    //     $badbutton = New Badbutton;

    //     $badbutton->

    //     // return redirect();
    
}
