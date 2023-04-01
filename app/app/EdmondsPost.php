<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = [
        'image','title','user_id', 'date',
    ];

}
