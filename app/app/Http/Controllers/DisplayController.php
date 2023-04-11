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




        $keyword = $request->input('keyword');

        $query = EdmondsPost::query();

        if($from && $until && !empty($keyword)){
            $query = $query->whereBetween('date', [$from, $until]);
            $query->where('title' ,'LIKE', "%{$keyword}%");
            // dd($edall);
        }
        elseif($from && $until){
            $edall = $edall->whereBetween('date', [$from, $until]);
        }
        elseif(!empty($keyword)){
            $query->where('title' ,'LIKE', "%{$keyword}%");
        }


        $edall = $query->get();
        foreach($edall as $val){
            $val->image= '/storage/images/' . $val->image;
        }
   
        return view('edmonds',[
            'edposts' => $edall,
            'fromdate' => $fromdate,
            'untildate' => $untildate,
            'keyword' => $keyword,    
        ]);
    }

    public function SeattlePost(Request $request){

        $seattlepost = New SeattlePost;

        $seaall = $seattlepost->where('del_flg', 0)->where('user_id', Auth::id());

        $from = $request['from'];
        $until = $request['until'];

        $fromdate = $request->input('from');
        $untildate = $request->input('until');

        $keyword = $request->input('keyword');

        $query = SeattlePost::query();

        if($from && $until && !empty($keyword)){
            $query = $query->whereBetween('date', [$from, $until]);
            $query->where('title' ,'LIKE', "%{$keyword}%");
        }
        elseif($from && $until){
            $seaall = $seaall->whereBetween('date', [$from, $until]);
        }
        elseif(!empty($keyword)){
            $query->where('title' ,'LIKE', "%{$keyword}%");
        }

        $seaall = $query->get();
        foreach($seaall as $val){
            $val->image= '/storage/images/' . $val->image;
        }

        return view('seattle',[
            'seaposts' => $seaall,
            'fromdate' => $fromdate,
            'untildate' => $untildate,
            'keyword' => $keyword,    
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


        $edmondspost = $this->edmondspost->getimages();

        $user = Auth::user();
        
        return view('mypage',[
            'edposts' => $edmondspost,
            'user' => $user,
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
    public function userlist(){

        return view('user_list');
    }

    public function PasswordReset(){

        return view('passwordreset');
    }

    public function PublicEdmonds(Request $request){

        $edmondspost = New EdmondsPost;

        $edpost = $edmondspost->where('del_flg', 0);

        return view('publicedmonds',[
            'edpost' => $edpost,
        ]);

    }
    public function PublicSeattle(Request $request){

        $seattlepost = New SeattlePost;

        $seaall = $seattlepost->where('del_flg', 1)->where('user_id', Auth::id());

        return view('edpicsdetail',[
            'edposts' => $seaall,
        ]);

    }


}
