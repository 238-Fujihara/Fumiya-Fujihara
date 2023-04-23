<?php

namespace App\Http\Controllers;
use App\EdmondsPost;
use App\SeattlePost;
use App\WashingtonPost;
use App\TexasPost;
use App\LAPost;


use App\Badbutton;
use Illuminate\Support\Facades\Auth;




use Illuminate\Http\Request;

class ViolationController extends Controller
{
    public function edviolationform($id){

        $post = EdmondsPost::find($id);

        return view('edviolationform',[
            "id" => $id,
            "post" => $post,
        ]);
    }
    public function edviolation(Request $request){

        $badbuttons = New Badbutton;
        $inputs=[];

        // // バリデーションルール
        // $inputs=request()->validate([
        //     'reason' =>'required|max:200',
        // ]);
        $inputs['name']=$request->name;
        $inputs['user_id']=(int)$request->user_id;
        $inputs['reason']=$request->reason;
        $inputs['edmondspost_id']=(int)$request->edmondspost_id;


                
        // postを保存
        $badbuttons->create($inputs);
        
        return redirect('/public/edmonds');
        
    }
    public function seaviolationform($id){

        $post = SeattlePost::find($id);

        return view('seaviolationform',[
            "id" => $id,
            "post" => $post,
        ]);

    }

    public function seaviolation(Request $request){

        $badbuttons = New Badbutton;
        $inputs=[];

        // // バリデーションルール
        // $inputs=request()->validate([
        //     'reason' =>'required|max:200',
        // ]);
                
        $inputs['name']=$request->name;
        $inputs['user_id']=(int)$request->user_id;
        $inputs['reason']=$request->reason;
        $inputs['seattlepost_id']=(int)$request->seattlepost_id; 


                
        // postを保存
        $badbuttons->create($inputs);
        
        return redirect('/public/seattle');
    }   
    public function laviolationform($id){

        $post = LAPost::find($id);

        return view('laviolationform',[
            "id" => $id,
            "post" => $post,
        ]);
    }
    public function laviolation(Request $request){

        $badbuttons = New Badbutton;
        $inputs=[];

        // // バリデーションルール
        // $inputs=request()->validate([
        //     'reason' =>'required|max:200',
        // ]);
        $inputs['name']=$request->name;
        $inputs['user_id']=(int)$request->user_id;
        $inputs['reason']=$request->reason;
        $inputs['lapost_id']=(int)$request->lapost_id; 


                
        // postを保存
        $badbuttons->create($inputs);
        
        return redirect('/public/la');
        
    }
    public function waviolationform($id){

        $post = WashingtonPost::find($id);

        return view('waviolationform',[
            "id" => $id,
            'post' => $post,
        ]);
    }
    public function waviolation(Request $request){

        $badbuttons = New Badbutton;
        $inputs=[];

        // // バリデーションルール
        // $inputs=request()->validate([
        //     'reason' =>'required|max:200',
        // ]);
        $inputs['name']=$request->name;
        $inputs['user_id']=(int)$request->user_id;
        $inputs['reason']=$request->reason;
        $inputs['washingtonpost_id']=(int)$request->washingtonpost_id; 


                
        // postを保存
        $badbuttons->create($inputs);
        
        return redirect('/public/washington');
        
    }
    public function texasviolationform($id){

        $post = TexasPost::find($id);

        return view('texasviolationform',[
            "id" => $id,
            "post" => $post,
        ]);
    }
    public function texasviolation(Request $request){

        $badbuttons = New Badbutton;
        $inputs=[];

        // // バリデーションルール
        // $inputs=request()->validate([
        //     'reason' =>'required|max:200',
        // ]);
        $inputs['name']=$request->name;
        $inputs['user_id']=(int)$request->user_id;
        $inputs['reason']=$request->reason;
        $inputs['texaspost_id']=(int)$request->texaspost_id; 


                
        // postを保存
        $badbuttons->create($inputs);
        
        return redirect('/public/texas');
        
    }


 
}
