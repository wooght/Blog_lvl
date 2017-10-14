<?php
// @author wooght
// @date 2017-10-11

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //对评论一对多
    public function Comments(){
      return $this->hasMany('App\Comments');
    }
    public function addreads($id){
      $art=self::find($id);
      $art->reads+=rand(0,10);
      $art->comments+=1;
      $art->save();
    }
}
