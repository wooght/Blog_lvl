<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
  use AuthenticatesUsers;

  protected $redirectTo = '/admin/home';//登陆后位置
  protected $redirectAfterLogout='/';
  protected $username;

  public function __construct()
  {
      //定义此控制器的中间件
      //guest:admin 是因为RegisterController文件指定为guest
      $this->middleware('guest:admin', ['except' => 'logout']);//except 除了,及除了退出以外都会用到此中间件
      $this->username = config('admin.global.username');
  }
  //定义视图
  public function showLoginForm()
  {
      return view('admin.login.index');
  }
  //自定义认证驱动,及指定auth配置文件下guard的哪一个
  protected function guard()
  {
      //名词解释 auth 认证,guard 警卫,护卫,guest 客人,except 除外,除了
      return auth()->guard('admin');
  }
  public function logout(){
    //Auth::check()获取失败,必须指定guard admin  默认guard是web
    if(Auth('admin')->check()){
      Auth('admin')->logout();
    }
    return redirect('/admin/login');
  }
}
