<?php

namespace App\Http\Controllers;

use App\SeattlePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class SeattlePostController extends Controller
{   public $seattlepost;
    public function __construct(SeattlePost $seattlepost){
        $this->seattlepost = $seattlepost;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index(SeattlePost $seattlePost)
    {
        $seattlePost = SeattlePost::where('user_id', Auth::id());

        $seattlePost = $this->seattlepost->getimages();

        return view('seattle',[
            'seaposts' => $seattlePost,
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
     * @param  \App\SeattlePost  $seattlePost
     */
    public function show(SeattlePost $seattlePost, $id)
    {

        $seattlePost = SeattlePost::where('user_id', $id);
        $seattlePost->image = '/storage/images/' . $seattlePost->image;

        return view('seattle',[
            'seaposts' => $seattlePost,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SeattlePost  $seattlePost
     */
    public function edit(SeattlePost $seattlePost)
    {
        return view('seattle_edit',[
            'seaposts' => $seattlePost,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SeattlePost  $seattlePost
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

        $seattlePost = SeattlePost::find($id);

        $seattlePost->title = $request->input('title');
        $seattlePost->date = $request->input('date');
        $seattlePost->save();
        
        return redirect('/seattlePost');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SeattlePost  $seattlePost
     */
    public function destroy(SeattlePost $seattlePost)
    {
        $seattlePost->delete();

        return redirect('/seattlePost');
    }
}
