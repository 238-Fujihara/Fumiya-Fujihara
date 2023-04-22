<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badbutton extends Model
{
    public function Users(){
        return $this->belongsTo('App\User');
    }
    public function EdmondsPost(){
        return $this->belongsTo('App\EdmondsPost','edmondspost_id');
    }
    public function SeattlePost(){
        return $this->belongsTo('App\SeattlePost', 'seattlepost_id');
    }
    public function WashingtonPost(){
        return $this->belongsTo('App\WashingtonPost','washingtonpost_id');
    }
    public function LAPost(){
        return $this->belongsTo('App\LAPost','lapost_id');
    }
    public function TexasPost(){
        return $this->belongsTo('App\TexasPost','texaspost_id');
    }
    public function ColoradoPost(){
        return $this->belongsTo('App\ColoradoPost','coloradopost_id');
    }


    protected $fillable = [
        'reason','edmondspost_id','seattlepost_id','user_id', 'name','washingtonpost_id','lapost_id','texaspost_id','coloradopost_id'
    ];
}
