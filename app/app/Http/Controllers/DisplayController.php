<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EdmondsPost;
use App\SeattlePost;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DisplayController extends Controller
{
    public $edmondspost;
    public $seattlepost;
    public function __construct(EdmondsPost $edmondspost, SeattlePost $seattlepost){
        $this->edmondspost = $edmondspost;
        $this->seattlepost = $seattlepost;
    }


    public function index(){

        return view('mainpage');
    }

    public function EdmondsPost(Request $request){
        
        $edmondsposts = $this->edmondspost->getimages();
        
        // $from = $request['from'];
        // $until = $request['until'];

        return view('edmonds',[
            'edposts' => $edmondsposts,
        ]);
    }

    public function SeattlePost(Request $request){

        $seattleposts = $this->seattlepost->getimages();

        return view('seattle',[
            'seaposts' => $seattleposts,
        ]);
    }

    public function MyPage(Request $request){

        $edmondspost = DB::table('Edmonds_Posts')->where('user_id',  Auth::id())->get();
        
        return view('mypage',[
            'edposts' => $edmondspost,
        ]);
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
    public function userlist(){

        return view('user_list');
    }

    public function EdPicsDetail(Request $request){

        // $edpicsdetail = DB::table('Edmonds_Posts')->where('id', Auth::id())->get();

        $edmondsposts = $this->edmondspost->where('image')->get();
        // $edmondsposts->get('id');


        return view('edpicsdetail'.[
            'edpost'=> $edmondsposts,
        ]);
    }
    public function SeaPicsDetail(Request $request){

        $seapicsdetail = DB::table('Seattle_Posts')->where('id', Auth::id())->get();

        return view('seapicsdetail');
    }


    


}
