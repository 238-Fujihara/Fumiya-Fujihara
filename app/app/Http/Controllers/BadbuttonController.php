<?php

namespace App\Http\Controllers;

use App\Badbutton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\EdmondsPost;
use App\SeattlePost;

class BadbuttonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Badbutton  $badbuttons)
    {
        $badbuttons = Badbutton::get();
        return view('badbuttonsform',[
            'badbuttons' => $badbuttons,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Badbutton  $badbutton
     * @return \Illuminate\Http\Response
     */
    public function show(Badbutton $badbutton)
    {
        return view('picsdetail')->with(compact('badbutton'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Badbutton  $badbutton
     * @return \Illuminate\Http\Response
     */
    public function edit(Badbutton $badbutton)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Badbutton  $badbutton
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('EdmondsPost')){
            $edmondspost = EdmondsPost::find($id);
            $edmondspost->del_flg = 1;
            $edmondspost->save();
            $badbutton = Badbutton::where('edmondspost_id', $id)->get();
            foreach($badbutton as $val){
                $val->delete();
            }
        }elseif($request->has('SeattlePost')){
            $seattlepost = SeattlePost::find($id);
            $seattlepost->del_flg = 1;
            $seattlepost->save();
            $badbutton = Badbutton::where('seattlepost_id', $id)->get();
            foreach($badbutton as $val){
                $val->delete();
            }
        }

        return redirect('/badbuttons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Badbutton  $badbutton
     * @return \Illuminate\Http\Response
     */
    public function destroy(Badbutton $badbutton)
    {
        
    }
}
