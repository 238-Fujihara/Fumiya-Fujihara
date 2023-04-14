<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class EdmondsPost extends Model
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
    public function badbuttons(){
      return $this->hasMany('App\Badbutton');
  }

    protected $fillable = [
        'image','title','user_id', 'date',
    ];
    public function getimages(){
        $edmondsPost = EdmondsPost::query();
        if(Auth::user()){
            $edmondsPost->where('user_id', Auth::id());
        }
        $edmondsPost = $edmondsPost->get();
        foreach($edmondsPost as $val){
            $val->image= '/storage/images/' . $val->image;
        }
        return $edmondsPost;
    }
    public function is_liked_by_auth_user()
    {
      $id = Auth::id();
  
      $likers = array();
      foreach($this->likes as $like) {
        array_push($likers, $like->user_id);
      }
  
      if (in_array($id, $likers)) {
        return true;
      } else {
        return false;
      }
    }
    

}
