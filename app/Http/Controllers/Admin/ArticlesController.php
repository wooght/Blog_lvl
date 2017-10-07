<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//资源控制器所需类
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use App\Articles;
use Redirect;
class ArticlesController extends Controller
{
    //修改文章
    public function articleup(Request $request){
      $this->validate($request,[
        'title' => 'required|max:25',
        'body' => 'required|min:10'],['title.required' => '标题必须填写']);
      $arts=Articles::find(Input::get('id'));
      if($arts){
        $arts->article_body=Input::get('body');
        $arts->article_title=Input::get('title');
        $arts->save();
      }
      return Redirect::to('admin/article/id/'.Input::get('id'));
    }
    //删除文章
    public function destore(){
      $arts=Articles::find(Input::get('id'));
      $arts->delete();
      return Redirect::to('admin/home');
    }
}
