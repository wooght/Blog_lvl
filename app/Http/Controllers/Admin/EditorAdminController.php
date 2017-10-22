<?php

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
use DB;
use Carbon\Carbon;

class EditorAdminController extends Controller
{
    public function __construct(){
      $this->middleware('auth.admin:admin');
    }
    public function edit($id){
      $admin=Admin::find($id);
      $role=Role::all();
      return view('admin.admineditor',compact('role','admin'));
    }
    public function update(Request $request,$id){
      //执行修改
      $this->validate($request,[
        'name' => 'required|max:5'
      ],[
        'name.required' => '必须填写用户名','name.max'=>'用户名不能超过5个汉字'
      ]);
      $admin=Admin::find($id);
      $admin->name=Input::get('name');
      $admin->updated_at=Carbon::now();
      //修改权限
      //先删除权限,在添加权限
      $role=DB::table('role_user')->where('user_id','=',$id)->delete();
      $admin->attachRole(Input::get('role_id'));
      $admin->save();
      return Redirect::to('/admin/adminlist');
    }
}
