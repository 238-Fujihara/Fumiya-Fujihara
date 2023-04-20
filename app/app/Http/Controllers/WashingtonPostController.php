<?php

namespace App\Http\Controllers;

use App\WashingtonPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class WashingtonPostController extends Controller
{
    public $washingtonpost;
    public function __construct(WashingtonPost $washingtonpost){
        $this->washingtonpost = $washingtonpost;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $washingtonpost = WashingtonPost::where('user_id', Auth::id());

        $washingtonpost = $this->washingtonpost->getimages();

        return view('washington',[
            'waposts' =>  $washingtonpost,
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
     * @param  \App\WashingtonPost  $washingtonPost
     */
    public function show(WashingtonPost $washingtonPost, $id)
    {
        $washingtonPost = WashingtonPost::where('user_id', $id);
        $washingtonPost->image = '/storage/images/' . $washingtonPost->image;

        return view('washington',[
            'waposts' => $washingtonPost,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WashingtonPost  $washingtonPost
     */
    public function edit(WashingtonPost $washingtonPost)
    {
        return view('washington_edit',[
            'waposts' =>  $washingtonPost,
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WashingtonPost  $washingtonPost
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
        $washingtonPost = WashingtonPost::find($id);

        $washingtonPost->title = $request->input('title');
        $washingtonPost->date = $request->input('date');
        $washingtonPost->save();
        
        return redirect()->route('my.page');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WashingtonPost  $washingtonPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(WashingtonPost $washingtonPost)
    {
        $washingtonPost->delete();

        return redirect()->route('my.page');

    }
}
