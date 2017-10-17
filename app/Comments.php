<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

      public static function get_count(){
        return self::all()->count();
      }
}
