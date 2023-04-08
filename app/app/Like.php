<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function users(){
        return $this->belongsTo('App\users');
}   
    public function posts(){
        return $this->belongsTo('App\posts');
}
}
