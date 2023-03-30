<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function like(){
        return $this->hasMany('App\User', 'user_id', 'id');
    }
}
