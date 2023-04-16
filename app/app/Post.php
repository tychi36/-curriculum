<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;

class Post extends Model
{
    public function user(){
        return $this->hasMany('App\User', 'user_id', 'id');
    }
    public function post(){
        return $this->belongsTo('App\Like', 'id', 'post_id');
    }
}
