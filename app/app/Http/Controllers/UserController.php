<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        return view('setting');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string',
            'email' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }


        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        if($request['profile_image']){
            $filename=request()->file('profile_image')->store('public/images');
            $user['profile_image']=basename($filename);
        }
        
        $user->save();

        return view('mypage',[
            "user" => $user,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     */
    public function destroy(User $user)
    {
        $user->delete();

        return view('mainpage');
    }
}
