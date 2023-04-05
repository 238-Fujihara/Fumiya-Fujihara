<?php

namespace App\Http\Controllers;

use App\EdmondsPost;
use Illuminate\Http\Request;

class EdmondsPostController extends Controller
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
     * @param  \App\EdmondsPost  $edmondsPost
     * @return \Illuminate\Http\Response
     */
    public function show(EdmondsPost $edmondsPost)
    {

        $edmondsPost->image = '/storage/images/' . $edmondsPost->image;

        return view('edpicsdetail',[
            'edpost' => $edmondsPost,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EdmondsPost  $edmondsPost
     * @return \Illuminate\Http\Response
     */
    public function edit(EdmondsPost $edmondsPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EdmondsPost  $edmondsPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EdmondsPost $edmondsPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EdmondsPost  $edmondsPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(EdmondsPost $edmondsPost)
    {
        // dd($edmondsPost);
        $edmondsPost->delete();

        return redirect()->route('edmonds.post');
}
}
