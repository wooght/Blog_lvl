<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//博客系统 路由
Route::get('/', 'BlogHomeController@index');//首页
Route::get('page/{page}','BlogHomeController@index');
Route::get('article/id/{id}','BlogHomeController@article_view');//文章详情
//Route::get('is_email','BlogHomeController@is_email');//判断用户名和邮箱
/*后台模板测试*/
Route::get('adm_index','BlogHomeController@adm_index');

Route::group(['prefix'=>'vipusers','namespace'=>'vipusers','middleware'=>'auth'],function(){
  //从此路由进来的请求,都会通过middleware的判断
  Route::resource('fb','VipHomeController');//发布
  Route::resource('hf','UsersRplyController');//回复
  Route::get('/','VipHomeController@index');//会员默认定位到这里
  //Route::get('article/id/{id}','VipHomeController@article_view');此处必须登陆后才能查看内容
});
Route::group(['prefix' => 'admin','namespace' => 'Admin'],function ($router){
  /*认证模块*/
  $router->get('/','HomeController@index');
  $router->get('serach','HomeController@index');
  $router->get('login', 'LoginController@showLoginForm');
  $router->post('login', 'LoginController@login');
  $router->post('logout', 'LoginController@logout');
  Route::get('home', 'HomeController@index');//后台首页-文章列表
  Route::get('page/{id}','HomeController@index');//
  Route::get('user','UserController@index');
  Route::get('user/page/{page}','UserController@index');
  Route::get('articleslist/id/{id}','UserController@articleslist');
  Route::get('articleslist/id/{id}/page/{page}','UserController@articleslist');


  /*管理内容*/
  Route::resource('article','HomeController');//文章资源管理
  Route::resource('admin','EditorAdminController');//管理员资源管理
  Route::resource('comment','CommentController');//评论资源管理
  Route::get('comment/page/{page}','CommentController@index');
  Route::get('articleview/{id}','CommentController@articleview');
  /*
    资源管理包括:index,edit,update,story,destory
    提交方式包括:/,/id/edit,PUT,/,DELETE,
  */
  //$router->put('articleup','ArticlesController@articleup');

  /*管理员管理*/
  Route::get('adminlist','HomeController@adminlist');
  Route::get('admineditor/id/{id}','HomeController@admineditor');
});
Auth::routes();
