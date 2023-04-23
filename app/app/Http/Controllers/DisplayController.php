<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EdmondsPost;
use App\SeattlePost;
use App\WashingtonPost;
use App\LAPost;
use App\TexasPost;
use App\ColoradoPost;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DisplayController extends Controller
{
    public $edmondspost;
    public $seattlepost;
    public $washingtonpost;
    public $lapost;
    public $texaspost;

    public function __construct(EdmondsPost $edmondspost, SeattlePost $seattlepost, WashingtonPost $washingtonpost, LAPost $lapost, TexasPost $texaspost){
        $this->edmondspost = $edmondspost;
        $this->seattlepost = $seattlepost;
        $this->washingtonpost = $washingtonpost;
        $this->lapost = $lapost;
        $this->texaspost = $texaspost;

    }


    public function index(){

        $user = User::find('storage/images/' . 'profile_image');

        return view('mainpage',[
            "user" => $user,
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


        $from = $request['from'];
        $until = $request['until'];

        $fromdate = $request->input('from');
        $untildate = $request->input('until');




        $keyword = $request->input('keyword');

        $edall = EdmondsPost::query();

        if($from && $until && !empty($keyword)){
            $edall = $edall->whereBetween('date', [$from, $until]);
            $edall->where('title' ,'LIKE', "%{$keyword}%");
            // dd($edall);
        }
        elseif($from && $until){
            $edall = $edall->whereBetween('date', [$from, $until]);
        }
        elseif($from && empty($until)){
            $edall = $edall->where('date',$from);
        }
        elseif(!empty($keyword)){
            $edall->where('title' ,'LIKE', "%{$keyword}%");
        }


        $edall = $edall->where('del_flg', 0)->get()->sortByDesc('date');
        foreach($edall as $val){
            $val->image= '/storage/images/' . $val->image;
        }

        $badbutton = EdmondsPost::where('badbutton');

   
        return view('publicedmonds',[
            'edposts' => $edall,
            'fromdate' => $fromdate,
            'untildate' => $untildate,
            'keyword' => $keyword,  
            'badbutton' => $badbutton,   
        ]);

    }
    public function PublicSeattle(Request $request){

        $from = $request['from'];
        $until = $request['until'];

        $fromdate = $request->input('from');
        $untildate = $request->input('until');

        $keyword = $request->input('keyword');

        $seaall = SeattlePost::query();

        if($from && $until && !empty($keyword)){
            $seaall = $seaall->whereBetween('date', [$from, $until]);
            $seaall->where('title' ,'LIKE', "%{$keyword}%");
        }
        elseif($from && $until){
            $seaall = $seaall->whereBetween('date', [$from, $until]);
        }
        elseif($from && empty($until)){
            $seaall = $seaall->where('date',$from);
        }
        elseif(!empty($keyword)){
            $seaall->where('title' ,'LIKE', "%{$keyword}%");
        }

        $seaall = $seaall->where('del_flg', 0)->get()->sortByDesc('date');
        foreach($seaall as $val){
            $val->image= '/storage/images/' . $val->image;
        }

        // $badbutton = ;

        return view('publicseattle',[
            'seaposts' => $seaall,
            'fromdate' => $fromdate,
            'untildate' => $untildate,
            'keyword' => $keyword,    
        ]);

    }
    public function PublicWashington(Request $request){


        $from = $request['from'];
        $until = $request['until'];

        $fromdate = $request->input('from');
        $untildate = $request->input('until');




        $keyword = $request->input('keyword');

        $waall = WashingtonPost::query();

        if($from && $until && !empty($keyword)){
            $waall =  $waall->whereBetween('date', [$from, $until]);
            $waall->where('title' ,'LIKE', "%{$keyword}%");
        }
        elseif($from && $until){
            $waall = $waall->whereBetween('date', [$from, $until]);
        }
        elseif($from && empty($until)){
            $waall = $waall->where('date',$from);
        }
        elseif(!empty($keyword)){
            $waall->where('title' ,'LIKE', "%{$keyword}%");
        }


        $waall =  $waall->where('del_flg', 0)->get()->sortByDesc('date');
        foreach($waall as $val){
            $val->image= '/storage/images/' . $val->image;
        }

        $badbutton = WashingtonPost::where('badbutton');

   
        return view('publicwashington',[
            'waposts' => $waall,
            'fromdate' => $fromdate,
            'untildate' => $untildate,
            'keyword' => $keyword,  
            'badbutton' => $badbutton,   
        ]);
    }
    public function PublicLA(Request $request){


        $from = $request['from'];
        $until = $request['until'];

        $fromdate = $request->input('from');
        $untildate = $request->input('until');




        $keyword = $request->input('keyword');

        $lapost =LAPost::query();

        if($from && $until && !empty($keyword)){
            $lapost = $lapost->whereBetween('date', [$from, $until]);
            $lapost->where('title' ,'LIKE', "%{$keyword}%");
        }
        elseif($from && $until){
            $lapost = $lapost->whereBetween('date', [$from, $until]);
        }
        elseif($from && empty($until)){
            $lapost = $lapost->where('date',$from);
        }
        elseif(!empty($keyword)){
            $lapost->where('title' ,'LIKE', "%{$keyword}%");
        }


        $lapost =$lapost->where('del_flg', 0)->get()->sortByDesc('date');
        foreach($lapost as $val){
            $val->image= '/storage/images/' . $val->image;
        }

        $badbutton = LAPost::where('badbutton');

   
        return view('publicla',[
            'laposts' => $lapost,
            'fromdate' => $fromdate,
            'untildate' => $untildate,
            'keyword' => $keyword,  
            'badbutton' => $badbutton,   
        ]);
    }
    public function PublicTexas(Request $request){



        $from = $request['from'];
        $until = $request['until'];

        $fromdate = $request->input('from');
        $untildate = $request->input('until');




        $keyword = $request->input('keyword');

        $texaspost =TexasPost::query();

        if($from && $until && !empty($keyword)){
            $texaspost = $texaspost->whereBetween('date', [$from, $until]);
            $texaspost->where('title' ,'LIKE', "%{$keyword}%");
        }
        elseif($from && $until){
            $texaspost = $texaspost->whereBetween('date', [$from, $until]);
        }
        elseif($from && empty($until)){
            $texaspost = $texaspost->where('date',$from);
        }
        elseif(!empty($keyword)){
            $texaspost->where('title' ,'LIKE', "%{$keyword}%");
        }


        $texaspost =$texaspost->where('del_flg', 0)->get()->sortByDesc('date');
        foreach($texaspost as $val){
            $val->image= '/storage/images/' . $val->image;
        }

        $badbutton = TexasPost::where('badbutton');

   
        return view('publictexas',[
            'texasposts' => $texaspost,
            'fromdate' => $fromdate,
            'untildate' => $untildate,
            'keyword' => $keyword,  
            'badbutton' => $badbutton,   
        ]);
    }
    public function PublicColorado(Request $request){

        $coloradopost = New ColoradoPost;

        $coloradopost = $coloradopost->where('del_flg', 0)->where('user_id', Auth::id());

        $from = $request['from'];
        $until = $request['until'];

        $fromdate = $request->input('from');
        $untildate = $request->input('until');




        $keyword = $request->input('keyword');

        $coloradopost = ColoradoPost::query();

        if($from && $until && !empty($keyword)){
            $coloradopost = $coloradopost->whereBetween('date', [$from, $until]);
            $coloradopost->where('title' ,'LIKE', "%{$keyword}%");
        }
        elseif($from && $until){
            $coloradopost = $coloradopost->whereBetween('date', [$from, $until]);
        }
        elseif($from && empty($until)){
            $coloradopost = $coloradopost->where('date',$from);
        }
        elseif(!empty($keyword)){
            $coloradopost->where('title' ,'LIKE', "%{$keyword}%");
        }


        $coloradopost = $coloradopost->get()->sortByDesc('date');
        foreach($coloradopost as $val){
            $val->image= '/storage/images/' . $val->image;
        }

        $badbutton = ColoradoPost::where('badbutton');

   
        return view('publiccolorado',[
            'coloradoposts' => $coloradopost,
            'fromdate' => $fromdate,
            'untildate' => $untildate,
            'keyword' => $keyword,  
            'badbutton' => $badbutton,   
        ]);
    }






}
