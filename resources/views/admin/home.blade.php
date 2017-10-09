@extends('layout.app')

@section('content')
<!--后台首页,默认文章列表-->
<div class="content">
  <div class="ad_daohang">
    <span class="now"><a href="#">文章列表</a></span>
    <span><a href="#">用户列表</a></span>
    <span><a href="#">全部评论</a></span>
  </div>
  @foreach($list as $one)
  <div class="article_list">
    [{{$one->name}}]发布:<a href='{{URL('article/id/'.$one->id)}}'>{{$one->article_title}}</a>
    <span class="f_right">
      <a class="edi_button" href='{{URL('admin/article/'.$one->id.'/edit')}}'>编辑</a>
      <form action="{{URL('admin/article/'.$one->id)}}" id='delete_form{{$one->id}}' style="display:inline;" method="post">
        <input name='_method' type="hidden" value='DELETE'><!--DELETE大写-->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!--不能input传递其他参数-->
        <input style="height:20px; border:1px solid red; width:30px; line-height:20px; float:left; font-size:12px;" type="submit" value="del">
      </form>
    </span>
    <span class="f_right">阅读:{{$one->reads}},评论:{{$one->comments}},{{$one->created_at}}</span>
  </div>
  @endforeach
</div>
@endsection
