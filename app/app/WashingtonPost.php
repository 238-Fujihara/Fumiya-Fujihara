<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class WashingtonPost extends Model
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
    $washingtonPost = WashingtonPost::query();
    if(Auth::user()){
        $washingtonPost->where('user_id', Auth::id());
    }
    $washingtonPost = $washingtonPost->get();
    foreach($washingtonPost as $val){
        $val->image= '/storage/images/' . $val->image;
    }
    return $washingtonPost;
}

}
