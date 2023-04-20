<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Badbutton;
use App\EdmondsPost;
use App\SeattlePost;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $per_page = 3; // １ページごとの表示件数
        $users = User::paginate($per_page);

        $badcounts = DB::table('users')  //＄groupsは変数にいれてるだけ
             ->leftJoin('badbuttons', 'users.id', '=', 'badbuttons.user_id')
             ->select('users.id', DB::raw("count(badbuttons.user_id) as badcount"))
             ->groupBy('users.id')
             ->get();

        return view('admin',[
            'users' => $users,
         'badcounts' => $badcounts,
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
     */
    public function store(Request $request)
    {
        $user = new \App\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $result = $user->save();
        return ['result' => $result];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     */
    public function show(User $user)
    {
        // if($badbuttons->has('EdmondsPost')){
        //     $vioedmondspost = EdmondsPost::count('edmondspost_id');
        // }elseif($badbuttons->has('SeattlePost')){
        //     $vioseattlepost = SeattlePost::count('seattlepost_id');
        // }

        // return view('admin', [
        //     'vioedmondspost'=> $vioedmondspost,
        //     'vioseattlepost'=> $vioseattlepost,
        // ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->filled('password')) { // パスワード入力があるときだけ変更

            $user->password = bcrypt($request->password);
    }
        $result = $user->save();
        return ['result' => $result];

        return view('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     */
    public function destroy(User $user)
    {
        $result = $user->delete();
        return ['result' => $result];

        return redirect('admin');
    }
}
