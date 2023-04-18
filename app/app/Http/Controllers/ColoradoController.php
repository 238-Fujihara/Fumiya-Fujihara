<?php

namespace App\Http\Controllers;

use App\ColoradoPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class ColoradoController extends Controller
{   public $coloradopost;
    public function __construct(ColoradoPost $coloradopost){
        $this->coloradopost = $coloradopost;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $coloradoPost = ColoradoPost::where('user_id', Auth::id());

        $coloradoPost = $this->coloradopost->getimages();

        return view('colorado',[
            'coloradoposts' => $coloradoPost,
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
     * @param  \App\ColoradoPost  $coloradoPost
     */
    public function show(ColoradoPost $coloradoPost, $id)
    {
        $coloradoPost = ColoradoPost::where('user_id', $id);
        $coloradoPost->image = '/storage/images/' . $coloradoPost->image;

        return view('colorado',[
            'coloradoposts' => $coloradoPost,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ColoradoPost  $coloradoPost
     */
    public function edit(ColoradoPost $coloradoPost)
    {
        return view('colorado_edit',[
            'coloradoposts' => $coloradoPost,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ColoradoPost  $coloradoPost
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
        $coloradoPost = ColoradoPost::find($id);

        $coloradoPost->title = $request->input('title');
        $coloradoPost->date = $request->input('date');
        $coloradoPost->save();
        
        return redirect()->route('my.page');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ColoradoPost  $coloradoPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ColoradoPost $coloradoPost)
    {
        $coloradoPost->delete();

        return redirect()->route('my.page');
}

    
}
