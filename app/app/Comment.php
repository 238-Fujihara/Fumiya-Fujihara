<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function posts(){
        return $this->hasMany('App\posts');
}   
    public function User(){
        return $this->hasMany('App\Users');
    }
}
