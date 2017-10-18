<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;//支持Entrust

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

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

    //与文章一对多关系
    public function articles(){
      return $this->hasMany('App\Articles');
    }
    //与评论一对多关系
    public function comments(){
      return $this->hasMany('App\Comments');
    }
    //返回nav所需数据
    public function returnAllNum(){
      // @return array
      $allnum=[];
      $allnum['articles_num']=\App\Articles::all()->count();
      $allnum['users_num']=self::all()->count();
      $allnum['comments_num']=\App\Comments::all()->count();
      return $allnum;
    }
    //获取记录条数
    public static function getnum(){
      return self::all()->count();
    }
}
