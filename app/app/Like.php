<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function users(){
        return $this->hasMany('App\users');
}   
    public function posts(){
        return $this->hasMany('App\posts');
}
}
