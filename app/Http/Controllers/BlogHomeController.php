<?php
//博客系统游客浏览部分 by wooght
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Comments;
class BlogHomeController extends Controller
{
  //默认首页
  public function index(){
    $at=new Articles;
    //链表查询文章及所属个人信息
    $at_list=$at->join('users',function($user){
      $user->on('articles.user_id','=','users.id');
    })->select('article_title','article_body','articles.id as id','name','articles.created_at','reads','comments')->get();
    return view('welcome')->withList($at_list);
  }
  //查看文章详细信息
  public function article_view($id){
    $at=Articles::find($id);
    //阅读数加一
    if($at){
      $at->reads=$at->reads+1;
      //先find 再save 及修改的意思
      $at->save();
    }
    //文章内容
    $article=Articles::join('users',function($user){
      $user->on('articles.user_id','=','users.id');
    })->select('article_title','article_body','articles.id as id','name','articles.created_at','reads','comments')->find($id);
    //评论内容
    $comts_list=Comments::join('users',function($user){
      $user->on('comments.user_id','=','users.id');
    })->select('comments.comment_body','comments.id as cmtsid','users.name','comments.created_at')->where('comments.article_id','=',$id)->get();
    return view('vipusers/article_view',compact('article','comts_list'));
  }
}
