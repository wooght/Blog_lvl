<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Articles;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\User;
use App\Wooght\wfanye;
use App\Comments;

class CommentController extends Controller
{

    public function __construct(){
      $this->middleware('auth.admin:admin');
    }

    public function index($page=1){
      //所有评论
      $comts=Comments::all();
      $fy_boj=new wfanye($page,$comts->count(),'/admin/comment',20,5);
      $fy=$fy_boj->show();
      $comts=Comments::skip(($page-1)*20)->take(20)->orderby('id','desc')->get();
      return view('admin.commentlist',compact('comts'))->withFy($fy);
    }

    public function destroy($id){
      $comt=Comments::find($id);
      if($comt->delete()){
        return Redirect::back()->withok('已删除');
      }else{
        return Redirect::back()->withok('删除失败,请稍后重试');//back() 会刷新返回的页面
      }
    }

    public function articleview($id){
      $art=Articles::find($id);
      $comts=Comments::where('article_id','=',$id)->orderby('id','desc')->get();
      return view('admin.articleview',compact('art','comts'));
    }
}
