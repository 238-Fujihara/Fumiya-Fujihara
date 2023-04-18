<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ColoradoPost extends Model
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
    $coloradoPost = ColoradoPost::query();
    if(Auth::user()){
        $coloradoPost->where('user_id', Auth::id());
    }
    $coloradoPost = $coloradoPost->get();
    foreach($coloradoPost as $val){
        $val->image= '/storage/images/' . $val->image;
    }
    return $coloradoPost;
}

}
