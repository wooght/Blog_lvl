<?php

// @author Wooght
// @date 2017-10-10
// @description admin index controller

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Articles;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\User;
use App\Wooght\wfanye;
use App\Admin;
use App\Role;

/*
后台默认控制器
文章操作相关功能
*/
class HomeController extends Controller
{
  /*
  构造指定中间件 middleware auth
  */
  public function __construct()
  {
      $this->middleware('auth.admin:admin');
  }

  /*
  默认方法
   */
  public function index($page=1)
  {
    //获取权限方法  已放在了view中
    // $user=User::find(Auth('admin')->user()->id);
    // if($user->hasRole('admins')){
    //   echo 'OK1';
    //   if($user->can('editor_articles')){
    //     echo 'OK2';
    //   }
    // }else{
    //   echo 'error'.Auth('admin')->user()->id;
    // }
    // dd('<br />end');


    //文章列表
    $at=new Articles;
    $at_num=Articles::all()->count();//总数
    $fy_boj=new wfanye($page,$at_num,'/admin',10,10);
    $fy=$fy_boj->show();

    // $list=$at->join('users',function($users){
    //   $users->on('articles.user_id','=','users.id');
    // })->select('articles.id as id','articles.article_title','articles.created_at','users.name','reads','comments')->skip(($page-1)*10)->take(10)->orderby('id','desc')->get();

    $list=$at->skip(($page-1)*10)->take(10)->orderby('id','desc')->get();
    //@基于 \App\Articles:action User
    //@视图通过 $listobj->user->name访问用户名

    return view('admin/home',compact('fy'))->withList($list);
  }
  /*
  删除文章
  */
  public function destroy($id){
    $art=Articles::find($id);
    if($art->delete()){
      return Redirect::to('admin/home');
    }
    return Redirect::to('/')->withError('删除失败!');
  }
  /*
  执行修改
  */
  public function update(Request $request,$id){
    $this->validate($request,[
      'title' => 'required|max:35',
      'body' => 'required|min:10'
    ],[
      'title.required' => '标题必须填写','title.max' => '标题必须在35字以内','body.required' => '必须填写内容'
    ]);

    $ats=Articles::find($id);
    $ats->article_title=Input::get('title');
    $ats->article_body=Input::get('body');
    if($ats->save()){
      return Redirect::to('admin/article/'.$id.'/edit')->withOk('修改成功!');
      /*
      withOk('')  将内容存放在session中供重定向后使用.
      */
    }
    return Redirect::to('/')->withOk('保存失败');
  }
  /*
  编辑文章
  */
  public function edit(Request $request,$id){
    if(!Articles::find($id)){
      return view('admin.home')->withError('没有此文章');
    }
    //$request->session()->forget('Ok'); //删除session
    $arts=Articles::join('users',function($users){
      $users->on('articles.user_id','=','users.id');
    })->select('articles.id as id','articles.article_title','articles.article_body','users.name','reads','comments')->find($id);
    return view('admin.article')->withArts($arts);
  }
  /*
  管理员列表
  */
  public function adminlist(){
    $admin=Admin::all();
    // $haha=[];
    // $arr=[];
    // foreach($admin as $one){
    //   $haha[$one->id]=json_decode($one->roles,true);
    // }
    // print_r($haha);
    // print_r($haha[3][0]);
    // $arr=$haha[3][0];
    // echo $arr['display_name'];
    // exit;
    return view('admin.adminlist',compact('admin'));
  }
  /*编辑管理员*/
  public function admineditor($id){
    $admin=Admin::find($id);
    $role=Role::all();
    return view('admin.admineditor',compact('role','admin'));
  }
  public function haha(){
    dd('后台首页，当前用户名：'.auth('admin')->user()->name);
  }
}
