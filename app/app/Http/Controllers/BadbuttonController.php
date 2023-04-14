<?php

namespace App\Http\Controllers;

use App\Badbutton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BadbuttonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Badbutton  $badbutton)
    {
        $badbutton = Badbutton::where('user_id', Auth::id());

        return view('badbuttonsform',[
            'badbutton' => $badbutton,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
    public function update(Request $request, Badbutton $badbutton)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Badbutton  $badbutton
     * @return \Illuminate\Http\Response
     */
    public function destroy(Badbutton $badbutton)
    {
        //
    }
}
