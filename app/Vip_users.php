<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//启用auth功能依赖上面两个
use Illuminate\Database\Eloquent\Model;

class Vip_users extends Authenticatable
{
    use Notifiable;//启用auth功能依赖
    //自动填充
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //黑名单
    protected $hidden = [
        'password', 'remember_token',
    ];
}
