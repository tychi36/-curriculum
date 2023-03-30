<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight_register extends Model
{
    public function user(){
        return $this->hasMany('App\User', 'user_id', 'id');
    }
}
