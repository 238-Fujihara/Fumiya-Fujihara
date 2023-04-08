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
        // $role = Auth::user()->toArray();
        // if($role['role'] == 100){
        //     return view('user.admin');
        // }else{
        //     return view('mainpage');
        // }
    return view('mainpage');

    }


    public function EdmondsPost(Request $request){

        $edmondspost = New EdmondsPost;

        $edall = $edmondspost->where('del_flg', 0)->where('user_id', Auth::id());


        $from = $request['from'];
        $until = $request['until'];

        $fromdate = $request->input('from');
        $untildate = $request->input('until');

        $edall = $this->edmondspost->getimages();

        if($from && $until){
            $edall = $edall->whereBetween('date', [$from, $until]);
        }


        // dd($edall);

        // $keyword = $request->input('keyword');

        // $query = EdmondsPost::query();
        // if(!empty('$keyword')){
        //     $query->where('title' , "%($keyword)%");
        // }

        // $theedmondspost = $query->get();
        
        return view('edmonds',[
            'edposts' => $edall,
            'fromdate' => $fromdate,
            'untildate' => $untildate,
            // compact('theedmondspost', 'keyword')
        ]);
    }

    public function SeattlePost(Request $request){

        $seattlepost = New SeattlePost;

        $seaall = $seattlepost->where('del_flg', 0)->where('user_id', Auth::id());

        $from = $request['from'];
        $until = $request['until'];

        $fromdate = $request->input('from');
        $untildate = $request->input('until');

        $seaall = $this->seattlepost->getimages();

        if($from && $until){
            $seaall = $seaall->whereBetween('date', [$from, $until]);
        }


        return view('seattle',[
            'seaposts' => $seaall,
            'fromdate' => $fromdate,
            'untildate' => $untildate,
        ]);
    }
    public function EdPicsDetail(Request $request){

        $edmondspost = New EdmondsPost;

        $edall = $edmondspost->where('del_flg', 0)->where('user_id', Auth::id());

        return view('edpicsdetail',[
            'edposts' => $edall,
        ]);

    }

    public function MyPage(Request $request){

        // $edmondspost = DB::table('Edmonds_Posts')->where('user_id',  Auth::id())->get();

        $edmondspost = $this->edmondspost->getimages();

        
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

    public function PasswordReset(){

        return view('passwordreset');
    }


}
