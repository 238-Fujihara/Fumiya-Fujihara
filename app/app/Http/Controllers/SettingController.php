<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ChangeNameRequest;
use App\Http\Requests\ChangeEmailRequest;



class SettingController extends Controller
{
    //
     public function __construct()
     {
         $this->middleware('auth');
     }
 
     public function index()
     {
        $user = Auth::user();
        return view('setting', compact('user')); 
     }
     public function update(UpdateUserRequest $request)
     {
         $user = User::find(Auth::id());
         // ...
     }

     public function changeName(ChangeNameRequest $request)
        {
            //ValidationはChangeNameRequestで処理
            //氏名変更処理
            $user = Auth::user();
            $user->name = $request->get('name');
            $user->save();
     
            //homeにリダイレクト
            return redirect('mypage')->route('setting')->with('status', __('Your name has been changed.'));
        }
     
     public function changeEmail(ChangeEmailRequest $request)
     {
       //ValidationはChangeUsernameRequestで処理
       //メールアドレス変更処理
       $user = Auth::user();
       $user->email = $request->get('email');
       $user->save();
 
       //homeにリダイレクト
       return redirect('mypage')->route('setting')->with('status', __('Your email address has been changed.'));
     }
}
