<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EdmondsPost;
use App\SeattlePost;
use App\User;
use Illuminate\Support\Facades\Auth;


class DisplayController extends Controller
{
    public function index(){

        return view('mainpage'); 

    }

    public function EdmondsPost(Request $request){
        
        
        return view('edmonds');
    }

    public function SeattlePost(Request $request){

        return view('seattle');
    }

    public function MyPage(){

        return view('mypage');
    }

    public function profileedit(){

        return view('profile_edit');
    }

    public function ProfileEditForm(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
        ]);

        try {
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();

        } catch (\Exception $e) {
            return back()->with('msg_error', 'プロフィールの更新に失敗しました')->withInput();
        }

        return redirect('mypage');
    }

    /**
     * パスワード編集機能
     * @param
     * @return Redirect 一覧ページ-メッセージ（パスワード更新完了）
     */
    public function passwordUpdate(){

        return redirect('mypage');

    }
    


}
