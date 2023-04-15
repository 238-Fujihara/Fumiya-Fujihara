<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badbutton extends Model
{
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function EdmondsPost(){
        return $this->belongsTo('App\EdmondsPost','edmondspost_id');
    }
    public function SeattlePost(){
        return $this->belongsTo('App\SeattlePost', 'seattlepost_id');
    }
    protected $fillable = [
        'reason','edmondspost_id','seattlepost_id','user_id', 'name',
    ];
}
