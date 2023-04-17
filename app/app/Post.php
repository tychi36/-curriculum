<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Like;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'user_id','id');
    }
    public function post(){
        return $this->belongsTo('App\Like', 'id', 'post_id');
    }
}
