<?php

namespace App\Http\Controllers\vipusers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use App\Articles;

use Redirect,Auth;

//vip相关操作
//发布帖子
class VipHomeController extends Controller
{
  //绑定auth 认证
  public function __construct()
  {
      $this->middleware('auth');
  }
  //添加帖子 一个控制器操作一个表
  public function store(Request $request)
  {
      $this->validate($request, [
          'title' => 'required|max:25',
          'body' => 'required|min:10',],['title.required'=>'标题必须填写','title.max'=>'标题必须在25字以内','body.min'=>'内容必须大于10字']);
      $at = new Articles;
      $at->article_title = Input::get('title');
      $at->article_body = Input::get('body');
      $at->article_contents=Input::get('body');
      $at->user_id = Auth::user()->id;//获取当前用户ID

      if ($at->save()) {
          return Redirect::to('/');
      } else {
          return Redirect::back()->withInput()->withErrors('保存失败！');
      }
  }
  public function index()
  {
      return view('vipusers/viphome');
  }
  //编辑文章
  public function edit($id){
//    if(!Articles::find($id)){
//      return view('admin.article')->withError('没有此文章');
//    }
    $arts=Articles::join('users',function($users){
      $users->on('articles.user_id','=','users.id');
    })->select('articles.id as id','articles.article_title','articles.article_body','users.name','reads','comments')->find($id);
    return view('vipusers.articleedi')->withArts($arts);
  }
  //修改文章
  public function update(Request $request,$id){
    $this->validate($request,[
      'title' => 'required|max:25',
      'body' => 'required|min:10'],['title.required' => '标题必须填写']);
    $arts=Articles::find(Input::get('id'));
    if($arts){
      $arts->article_body=Input::get('body');
      $arts->article_title=Input::get('title');
      $arts->save();
    }
    return Redirect::to('article/id/'.Input::get('id'));
  }
}
