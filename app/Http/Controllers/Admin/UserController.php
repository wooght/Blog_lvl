<?php

// @author Wooght
// @date 2017-10-10
// @description admin user controller

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Articles;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\User;
use App\Wooght\wfanye;

class UserController extends Controller
{
  /*
  构造指定中间件 middleware auth
  */
  public function __construct()
  {
      $this->middleware('auth.admin:admin');
  }

  public function index($page=1)
  {
    //用户列表
    $user_num=User::all()->count();//总数
    $fy_boj=new wfanye($page,$user_num,'/admin/user',10,10);
    $fy=$fy_boj->show();
    $users=User::select('users.id','users.name','users.email','users.created_at')->skip(($page-1)*10)->take(10)->orderby('id','desc')->get();

    //统计计数，要么放在主表中，要么放在附表中  不能每次去count查询
    // foreach($users as $user){
    //   $user->articlenum=$user->Articles()->count();
    //   $user->commentnum=$user->Comments()->count();  视图可以直接使用此方法
    // }

    return view('admin/user',compact('fy'))->withUsers($users);
  }

  public function articleslist($id,$page=1)
  {
    //文章列表
    $at=User::find($id);
    $at_num=$at->Articles()->count();//总数
    $fy_boj=new wfanye($page,$at_num,'/admin/articleslist/id/'.$id,10,10);
    $fy=$fy_boj->show();
    //一对多  先得到一，再得到多
    $list=$at->Articles()->skip(($page-1)*10)->take(10)->orderby('id','desc')->get();
    return view('admin/home',compact('fy'))->withList($list);
  }

  /*
  Eloquent hasMany,belongsTo 关系及应用
  主表中，定义的方法可以直接在查询中或查询结果中使用
  如此控制器articleslist方法中$at->Articles()->skip....中的使用

  随表（多表中），定义的方法只能当属性使用
  如：
  $ats=Articles::all();
  foreach($ats as $at){
    echo $at->user->name;//得到所属用户的用户名
  }
  */
}
