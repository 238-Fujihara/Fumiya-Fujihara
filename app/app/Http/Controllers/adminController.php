<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\EdmondsPost;
use App\SeattlePost;
use App\Badbutton;




class adminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Badbutton $badbuttons)
    {
        // if($badbuttons->has('EdmondsPost')){
        //     $vioedmondspost = EdmondsPost::count('edmondspost_id');
        // }elseif($badbuttons->has('SeattlePost')){
        //     $vioseattlepost = SeattlePost::count('seattlepost_id');
        // }

        // return view('admin', [
        //     'vioedmondspost'=> $vioedmondspost,
        //     'vioseattlepost'=> $vioseattlepost,
        // ]);

    }

    public function admin()
    {
        $users = Auth::user();
        return view('admin', compact('users'));

    }
}
