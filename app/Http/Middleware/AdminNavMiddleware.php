<?php

// @author wooght
// @date 2017-10-13
// @description view Middleware

namespace App\Http\Middleware;

//引入视图工厂
use Illuminate\Contracts\View\Factory as ViewFactory;

use Closure;
use App\Admin;

class AdminNavMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $view;

    public function __construct(ViewFactory $view){
      $this->view=$view;
    }
    public function handle($request, Closure $next)
    {
        //@handle 默认运行
        //@var Closure $next  下一步
        $use=new \App\User;
        $allnum=$use->returnAllNum();//获得计数数据
        $admins=Admin::find(Auth('admin')->user()->id);
        $allnum['admins']=$admins;//获得登录用户对象
        $this->view->share('allnum',$allnum);
        return $next($request);
    }
}
