<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badbutton extends Model
{
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function EdmondsPost(){
        return $this->belongsTo('App\EdmondsPost');
    }
    public function SeattlePost(){
        return $this->belongsTo('App\SeattlePost');
    }
    protected $fillable = [
        'reason','edmondspost_id','seattlepost_id','user_id'
    ];
}
