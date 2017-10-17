<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //与用户多对一
    public function User(){
      return $this->belongsTo('App\User');
    }
}
