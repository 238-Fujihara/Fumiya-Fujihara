<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class SeattlePost extends Model
{
    public function likes(){
        return $this->belongsto('App\likes');
}   
    public function comments(){
        return $this->belongsto('App\comments');
}
    public function User(){
        return $this->belongsTo('App\users');
}
    protected $fillable = [
    'image','title','user_id', 'date',
];
public function getimages(){
    $seattlePost = SeattlePost::query();
    if(Auth::user()){
        $seattlePost->where('user_id', Auth::id());
    }
    $seattlePost = $seattlePost->get();
    foreach($seattlePost as $val){
        $val->image= '/storage/images/' . $val->image;
    }
    return $seattlePost;
}
}
