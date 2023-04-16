<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function like(){
        return $this->hasMany('App\User', 'user_id', 'id');
    }
    public function post(){
        return $this->hasMany('App\Post', 'post_id', 'id');
    }
    public function like_exist($user_id, $post_id) {        
        return Like::where('user_id', $user_id)->where('post_id', $post_id)->exists();       
    }
}
