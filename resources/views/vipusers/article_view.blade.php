@extends('layout.index')
@section('content')
  <div name='index_title' class='index_title'>
    {{$article->article_title}}
  </div>
  <div class="article_list">
    <span>作者:{{$article->name}},阅读:{{$article->reads}},评论:{{$article->comments}},发布:{{$article->created_at}}</span>
  </div>
  <div class="article_list">
    {!!$article->article_body!!}
  </div>
  <!--发布回复表单-->
  <div name='rply_form' class="rply_form">
    @if(count($errors)>0)
    <div class="blog_errors">

      @foreach($errors->all() as $error)
      {{$error}}
      @endforeach

    </div>
    @endif
    <form method="post" action="/vipusers/hf">
      <textarea name="body" class="comment"></textarea>
      <input type="submit" class="f_right" value="发布评论" />
      <input type="hidden" value="{{$article->id}}" name="article_id" />
      {{ csrf_field() }}
    </form>
  </div>
  <!--评论内容-->
  <div class="comts_list">
    @foreach($comts_list as $comts)
    <div class="comts_user"v>{{$comts->user->name}}</div>
    <div class="comts_body">{{$comts->comment_body}}</div>
    @endforeach
  </div>
@endsection
