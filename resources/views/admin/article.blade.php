@extends('layout.app')

@section('content')
<!--后台首页,默认文章列表-->
<div class="content">
  <div class="ad_daohang">
    <span class="now"><a href="#">文章列表</a></span>
    <span><a href="#">用户列表</a></span>
    <span><a href="#">全部评论</a></span>
  </div>
  <div name='user_form' class="user_form">
    <div class="new_tie">编辑帖子</div>

      @if(count($errors)>0)
      <div class="blog_errors">
      !!!!内容填写有误,修改失败:
      @foreach($errors->all() as $error)
      {{$error}}
      @endforeach
      </div>
      @endif
      @if(session('ok'))
      success(session('ok'));
      @endif
    <form method="post" action="{{URL('admin/article/'.$arts->id)}}">
      <div><span>标题:</span> <input value="{{$arts->article_title}}" class="title" type="text" name="title"></div>
      <div><span>正文:</span> <textarea class='content' required='required' name="body">{{$arts->article_body}}</textarea></div>
      <input type="hidden" name="id" value="{{$arts->id}}" />
      <input type="hidden" name="_token" value="{{ csrf_token() }}"><!--Laravel通过post提交的表单必须有csrf-->
      <input name="_method" type="hidden" value="PUT">
      <div><input type="submit" class="submit" value="提交"></div>
    </form>
  </div>
</div>
@endsection
