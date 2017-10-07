@extends('layout.index')
@section('content')
  <div name='index_title' class='index_title'>
    <div name='title_left' class="title_left f_left">共:{{count($list)}}条主题供您阅读</div>
    <div name='title_button' class="title_button f_left"><input onclick="go()" class="fb_button" type='button' value='发布' /></div>
  </div>
  @foreach($list as $one)
  <div class="article_list">
    [{{$one->name}}]发布:<a href='{{URL('article/id/'.$one->id)}}'>{{$one->article_title}}</a> <span class="f_right">阅读:{{$one->reads}},评论:{{$one->comments}},{{$one->created_at}}</span>
  </div>
  @endforeach
  <script type="text/javascript">
    function go(){
      window.location='/vipusers';
    }
  </script>
@endsection
