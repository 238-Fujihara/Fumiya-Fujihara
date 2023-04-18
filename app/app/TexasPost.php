<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class TexasPost extends Model
{
    public function User(){
        return $this->belongsTo('App\users');
}
public function badbuttons(){
  return $this->hasMany('App\Badbutton');
}
    protected $fillable = [
    'image','title','user_id', 'date',
];
public function getimages(){
    $texasPost = TexasPost::query();
    if(Auth::user()){
        $texasPost->where('user_id', Auth::id());
    }
    $texasPost = $texasPost->get();
    foreach ($texasPost as $val){
        $val->image= '/storage/images/' . $val->image;
    }
    return $texasPost;
}
    //
}
