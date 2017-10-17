<?php
/*
 *@author wooght
 *@date 2017-10-09
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Articles extends Model
{
    use Notifiable;
    protected $fillable=[
      'article_title',
      'article_contents',
      'article_body'
    ];

    public static function get_count(){
      return self::all()->count();
    }

    // @var id article.id
    public static function numadd($id){
      $one=self::find($id);
      $one->reads+=5;
      $one->comments+=1;
      $one->save();
    }
}
