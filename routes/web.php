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
Route::get('article/id/{id}','BlogHomeController@article_view');//文章详情
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
  $router->get('login', 'LoginController@showLoginForm');
  $router->post('login', 'LoginController@login');
  $router->post('logout', 'LoginController@logout');
  Route::get('home', 'HomeController@index');//后台首页-文章列表

  /*管理内容*/
  Route::resource('article','HomeController');//文章资源管理
  $router->put('articleup','ArticlesController@articleup');
  $router->delete('articledel','ArticlesController@destore');
});
Auth::routes();
