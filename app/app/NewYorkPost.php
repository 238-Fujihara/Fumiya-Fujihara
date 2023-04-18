<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class NewYorkPost extends Model
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
    $nyPost = NewYorkPost::query();
    if(Auth::user()){
        $nyPost->where('user_id', Auth::id());
    }
    $nyPost = $nyPost->get();
    foreach($nyPost as $val){
        $val->image= '/storage/images/' . $val->image;
    }
    return $nyPost;
}
    //
}
