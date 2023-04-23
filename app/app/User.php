<?php

namespace App;

use App\Notifications\PasswordResetUserNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    public function selectUserFindById($id)
{
    // 「SELECT id, name, email WHERE id = ?」を発行する
    $query = $this->select([
        'id',
        'name',
        'email'
    ])->where([
        'id' => $id
    ]);
    // first()は1件のみ取得する関数
    return $query->first();
}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Override to send for password reset notification.
     *
     * @param [type] $token
     * @return void
     */
    public function sendPasswordResetUserNotification($token)
    {
        $this->notify(new PasswordResetUserNotification($token));
    }

    public function likes()
    {
        return $this->belongsToMany('App\Models\Post','likes','user_id','post_id')->withTimestamps();
    }

    //この投稿に対して既にlikeしたかどうかを判別する
    public function isLike($postId)
    {
      return $this->likes()->where('post_id',$postId)->exists();
    }

    //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
    public function like($postId)
    {
      if($this->isLike($postId)){
        //もし既に「いいね」していたら何もしない
      } else {
        $this->likes()->attach($postId);
      }
    }

    //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    public function unlike($postId)
    {
      if($this->isLike($postId)){
        //もし既に「いいね」していたら消す
        $this->likes()->detach($postId);
    } 
}
    public function EdmondsPost(){
        return $this->hasMany('App\EdmondsPost','edmondspost_id');
    }
    public function SeattlePost(){
        return $this->hasMany('App\SeattlePost', 'seattlepost_id');
    }
    public function WashingtonPost(){
        return $this->hasMany('App\WashingtonPost','washingtonpost_id');
    }
    public function LAPost(){
        return $this->hasMany('App\LAPost','lapost_id');
    }
    public function TexasPost(){
        return $this->hasMany('App\TexasPost','texaspost_id');
    }
    public function ColoradoPost(){
        return $this->belongsTo('App\ColoradoPost','coloradopost_id');
    }

}
