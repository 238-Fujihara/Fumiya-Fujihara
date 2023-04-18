<?php

namespace App\Http\Controllers;

use App\NewYorkPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class NewYorkController extends Controller

{   public $newyorkpost;
    public function __construct(NewYorkPost $newyorkpost){
        $this->newyorkpost = $newyorkpost;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $newyorkpost = NewYorkPost::where('user_id', Auth::id());

        $newyorkpost = $this->newyorkpost->getimages();

        return view('newyork',[
            'nyposts' =>  $newyorkpost,
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
     * @param  \App\NewYorkPost  $newYorkPost
     */
    public function show(NewYorkPost $newYorkPost, $id)
    {
        $nyPost = NewYorkPost::where('user_id', $id);
        $nyPost->image = '/storage/images/' . $nyPost->image;

        return view('newyork',[
            'nyposts' => $nyPost,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewYorkPost  $newYorkPost
     */
    public function edit(NewYorkPost $newYorkPost)
    {
        return view('newyork_edit',[
            'nyposts' =>  $newYorkPost,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewYorkPost  $newYorkPost
     */
    public function update(Request $request,  $id)
    {
        $validator = Validator::make($request->all(), [
            'title'  => 'required|string',
            'date' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }
        $newYorkPost = NewYorkPost::find($id);

        $newYorkPost->title = $request->input('title');
        $newYorkPost->date = $request->input('date');
        $newYorkPost->save();
        
        return redirect()->route('my.page');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewYorkPost  $newYorkPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewYorkPost $newYorkPost)
    {
        $newYorkPost->delete();

        return redirect()->route('my.page');

    }
}
