<?php

namespace App\Http\Controllers;

use App\TexasPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class TexasController extends Controller
{   public $texaspost;
    public function __construct(TexasPost $texaspost){
        $this->texaspost = $texaspost;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $texaspost = TexasPost::where('user_id', Auth::id());

        $texaspost = $this->texaspost->getimages();

        return view('texas',[
            'texasposts' =>  $texaspost,
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
     * @param  \App\TexasPost  $texasPost
     */
    public function show(TexasPost $texasPost, $id)
    {
        $texasPost = TexasPost::where('user_id', $id);
        $texasPost->image = '/storage/images/' . $texasPost->image;

        return view('texas',[
            'texasposts' => $texasPost,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TexasPost  $texasPost
     */
    public function edit(TexasPost $texasPost)
    {
        return view('texas_edit',[
            'texasposts' =>  $texasPost,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TexasPost  $texasPost
     */
    public function update(Request $request, $id)
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
        $texasPost = TexasPost::find($id);

        $texasPost->title = $request->input('title');
        $texasPost->date = $request->input('date');
        $texasPost->save();
        
        return redirect()->route('my.page');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TexasPost  $texasPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(TexasPost $texasPost)
    {
        $texasPost->delete();

        return redirect()->route('my.page');

    }
}
