<?php
/**
 * @author wooght
 * @date 2017-10-11
 * @description Autoloaded middleware
 * @description share view to route::web
 */

namespace App\Http\Middleware;

use Closure;

use Illuminate\Contracts\View\Factory as ViewFactory;

class wNavigation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(ViewFactory $view){
      $this->view=$view;
    }
    public function handle($request, Closure $next)
    {
        $count=[];
        // 没用use引入类时 可直接命令路径访问
        $count['articles']=\App\Articles::get_count();
        $count['comments']=\App\Comments::get_count();
        $count['users']=\App\User::get_count();
        //view->share 视图变量共享
        $this->view->share('navcount',$count);
        return $next($request);
    }
}
