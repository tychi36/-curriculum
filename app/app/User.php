<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use  App\Post;

class User extends Authenticatable
{
    use Notifiable;

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
    //１対多
    // public function post(){
    //     return $this->belongsTo('App\Post', 'user_id', 'id');
    // }
    //テスト
    public function post(){
        return $this->hasMany('App\Post', 'user_id','id');
    }

    public function comment(){
        return $this->belongsTo('App\Comment', 'user_id', 'id');
    }
    public function like(){
        return $this->belongsTo('App\Like', 'user_id', 'id');
    }
    public function weight_register(){
        return $this->belongsTo('App\Weight_register', 'user_id', 'id');
    }
    //1対１
    public function weight_mgmt(){
        return $this->hasOne('App\Weight_mgmt', 'user_id', 'id');
    }
}
