<?php

namespace App\Http\Controllers;

use App\EdmondsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EdmondsPostController extends Controller
{   public $edmondspost;
    public function __construct(EdmondsPost $edmondspost){
        $this->edmondspost = $edmondspost;
    }

    /**
     * Display a listing of the resource.
     *
     */

    public function index(EdmondsPost $edmondsPost)
    {
        $edmondsPost = EdmondsPost::where('user_id', Auth::id());

        $edmondsPost = $this->edmondspost->getimages();

        return view('edmonds',[
            'edposts' => $edmondsPost,
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EdmondsPost  $edmondsPost
     */
    public function show(EdmondsPost $edmondsPost, $id)
    {
        $edmondsPost = EdmondsPost::where('user_id', $id);
        $edmondsPost->image = '/storage/images/' . $edmondsPost->image;

        return view('edmonds',[
            'edposts' => $edmondsPost,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EdmondsPost  $edmondsPost
     */
    public function edit(EdmondsPost $edmondsPost)
    {
            
        return view('edmonds_edit',[
            'edposts' => $edmondsPost,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EdmondsPost  $edmondsPost
     */
    public function update(Request $request, $id)
    {
        $edmondsPost = EdmondsPost::find($id);

        $edmondsPost->title = $request->input('title');
        $edmondsPost->date = $request->input('date');
        $edmondsPost->save();
        
        return redirect()->route('edmonds_edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EdmondsPost  $edmondsPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(EdmondsPost $edmondsPost)
    {
        $edmondsPost->delete();

        return redirect()->route('my.page');
}
}
