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
    <span class="f_right"><a class="edi_button" href='{{URL('admin/article/'.$one->id.'/edit')}}'>编辑</a>
      <a class="edi_button" href="#" onclick="document.getElementById('delete_form{{$one->id}}').submit();">del</a>
    </span>
    <form action="{{URL('admin/article/'.$one->id)}}" id='delete_form{{$one->id}}' style="display:none;" method="post">
      <input type='_method' value='delete'>
      <input value='{{$one->id}}' name="id">
      {{ csrf_token() }}
    </form>
    <span class="f_right">阅读:{{$one->reads}},评论:{{$one->comments}},{{$one->created_at}}</span>
  </div>
  @endforeach
</div>
@endsection
