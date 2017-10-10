<?php
//博客系统游客浏览部分 by wooght
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Comments;

use Illuminate\Support\Facades\Input;
use App\User;

use App\Wooght\wfanye;

class BlogHomeController extends Controller
{
  //默认首页
  public function index($page=0){
    $at=new Articles;
    $atnum=Articles::all();
    //链表查询文章及所属个人信息
    $at_list=$at->join('users',function($user){
      $user->on('articles.user_id','=','users.id');
    })->select('article_title','img','article_contents','article_body','articles.id as id','name','articles.created_at','reads','comments')->orderBy('id','desc')->skip($page*10-10)->take(10)->get();
    //翻页
    $fyobj=new wfanye($page,$atnum->count(),'',10,10);
    $fy=$fyobj->show();
    return view('welcome',compact('fy','atnum'))->withList($at_list);
  }
  //测试后台
  public function adm_index(){
    return view('adminlte');
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

  //判断邮箱
  public function is_email(Request $request){
    $input=Input::get('email');
    //这里用find(array) 查询为空  ???
    $result=User::where(array('email'=>$input));
    if($result->count()>0){
      return 'exists';
    }else{
      return 'notexists';
    }
  }
}
