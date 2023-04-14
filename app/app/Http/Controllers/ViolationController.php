<?php

namespace App\Http\Controllers;
use App\EdmondsPost;
use App\SeattlePost;
use App\Badbutton;




use Illuminate\Http\Request;

class ViolationController extends Controller
{
    public function violation(){

        return view('violationform');

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
