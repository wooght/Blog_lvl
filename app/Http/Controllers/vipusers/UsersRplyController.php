<?php

namespace App\Http\Controllers\vipusers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

use App\Comments,App\Articles;
use Auth,Redirect;//引入认证,重定向类

//评论相关操作
//评论回复
class UsersRplyController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    public function store(Request $request){
      //字段验证
      $this->validate($request,[
        'body' => 'required|min:10',
      ],['body.required' => '必须填写评论内容','body.min' => '评论内容必须大于10汉字']);
      //执行添加
      $cmts=new Comments;
      $cmts->user_id=Auth::user()->id;
      $cmts->article_id=Input::get('article_id');
      $cmts->comment_body=Input::get('body');
      if($cmts->save()){
        //添加评论数量
        $db=Articles::find(Input::get('article_id'));
        $db->comments=$db->comments+1;
        if($db->save()){
          return Redirect::to('article/id/'.Input::get('article_id'));
        }else{
          return Redirect::back()->withInput()->withErrors('保存失败');
        }
      }else{
        return Redirect::back()->withInput()->withErrors('保存失败');
      }
    }
    public function index(){
      return view('vipusers/viphome');
    }
}
