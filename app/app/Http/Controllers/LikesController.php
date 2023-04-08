<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EdmondsPost;
use App\SeattlePost;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Like;

class LikesController extends Controller
{
    public function store($postId)
    {
        Auth::user()->like($postId);
        return 'ok!'; //レスポンス内容
    }

    public function destroy($postId)
    {
        Auth::user()->unlilikeke($postId);
        return 'ok!'; //レスポンス内容
    }
}
