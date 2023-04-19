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
        $inputs['name']=$request->name;
        $inputs['user_id']=(int)$request->user_id;
        $inputs['reason']=$request->reason;
        $inputs['edmondspost_id']=(int)$request->edmondspost_id; 


                
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
                
        $inputs['name']=$request->name;
        $inputs['user_id']=(int)$request->user_id;
        $inputs['reason']=$request->reason;
        $inputs['seattlepost_id']=(int)$request->seattlepost_id; 


                
        // postを保存
        $badbuttons->create($inputs);
        
        return redirect('/public/seattle');
    }   
    public function laviolationform($id){


        return view('laviolationform',[
            "id" => $id,
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
    public function newyorkviolationform($id){


        return view('newyorkviolationform',[
            "id" => $id,
        ]);
    }
    public function newyorkviolation(Request $request){

        $badbuttons = New Badbutton;
        $inputs=[];

        // // バリデーションルール
        // $inputs=request()->validate([
        //     'reason' =>'required|max:200',
        // ]);
        $inputs['name']=$request->name;
        $inputs['user_id']=(int)$request->user_id;
        $inputs['reason']=$request->reason;
        $inputs['newyorkpost_id']=(int)$request->newyorkpost_id; 


                
        // postを保存
        $badbuttons->create($inputs);
        
        return redirect('/public/newyork');
        
    }
    public function texasviolationform($id){


        return view('texasviolationform',[
            "id" => $id,
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
