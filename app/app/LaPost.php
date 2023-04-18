<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class LaPost extends Model
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
    $laPost = laPost::query();
    if(Auth::user()){
        $laPost->where('user_id', Auth::id());
    }
    $laPost = $laPost->get();
    foreach($laPost as $val){
        $val->image= '/storage/images/' . $val->image;
    }
    return $laPost;
}
    
}
