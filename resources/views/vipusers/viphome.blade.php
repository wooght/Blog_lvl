@extends('layout.index')
@section('content')
  <div name='user_form' class="user_form">
    <div class="new_tie">发布新贴</div>
    <div class="blog_errors">
      @if(count($errors)>0)
      !!!!内容填写有误:
      @foreach($errors->all() as $error)
      {{$error}}
      @endforeach
      @endif
    </div>
    <form method="post" action="{{URL('vipusers/fb')}}">
      <div><span>标题:</span><input class="title" type="text" name="title"></div>
      <div><span>正文:</span> <textarea class='content' required='required' name="body"></textarea></div>
      {{ csrf_field() }}<!--Laravel通过post提交的表单必须有csrf-->
      <div><input type="submit" class="submit" value="发布"></div>
    </form>
  </div>
@endsection
