<?php

namespace App\Http\Controllers;

use App\SeattlePost;
use Illuminate\Http\Request;

class SeattlePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\SeattlePost  $seattlePost
     * @return \Illuminate\Http\Response
     */
    public function show(SeattlePost $seattlePost)
    {

        $seattlePost->image= '/storage/images/' . $seattlePost->image;

        return view('seapicsdetail',[
            'seapost' => $seattlePost,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SeattlePost  $seattlePost
     * @return \Illuminate\Http\Response
     */
    public function edit(SeattlePost $seattlePost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SeattlePost  $seattlePost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeattlePost $seattlePost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SeattlePost  $seattlePost
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeattlePost $seattlePost)
    {
        $seattlePost->delete();

        return redirect()->route('seattle.post');
    }
}
