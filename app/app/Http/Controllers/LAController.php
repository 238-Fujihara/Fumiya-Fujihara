<?php

namespace App\Http\Controllers;

use App\LAPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class LAController extends Controller
{   public $lapost;
    public function __construct(LAPost $lapost){
        $this->lapost = $lapost;
    }

    /**
     * Display a listing of the resource.
     *
     */

    public function index(LAPost $edmondsPost)
    {
        $laPost = LAPost::where('user_id', Auth::id());

        $laPost = $this->lapost->getimages();

        return view('la',[
            'laposts' => $laPost,
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
     * @param  \App\LAPost  $laPost
     */
    public function show(LAPost $laPost, $id)
    {
        $laPost = LAPost::where('user_id', $id);
        $laPost->image = '/storage/images/' . $laPost->image;

        return view('la',[
            'laposts' => $laPost,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LAPost  $laPost
     */
    public function edit(LAPost $laPost)
    {
            
        return view('la_edit',[
            'laposts' => $laPost,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LAPost  $laPost
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
        $laPost = LAPost::find($id);

        $laPost->title = $request->input('title');
        $laPost->date = $request->input('date');
        $laPost->save();
        
        return redirect()->route('my.page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LAPost  $laPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(LAPost $laPost)
    {
        $laPost->delete();

        return redirect()->route('my.page');
}
}
