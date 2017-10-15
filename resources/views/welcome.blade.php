@extends('layout.index')
@section('content')
  <div name='index_title' class='index_title'>
    <div name='title_left' class="title_left f_left">共:{{$atnum->count()}}条主题供您阅读</div>
    <div name='title_button' class="title_button f_left"><input onclick="go()" class="fb_button" type='button' value='发布' /></div>
  </div>
  @foreach($list as $one)
  @if(!empty($one->img))
  <div class="article_list">
    <table width="100%">
      <td width="100">
        <img width="100" height="100" src="{{asset('uploads/image/'.$one->img)}}" />
      </td>
      <td>
        <table width="100%">
          <tr>
            <td>
              <a href='{{URL('article/id/'.$one->id)}}'>{{$one->article_title}}</a>
            </td>
          </tr>
          <tr>
            <td>
              <!--strip_tags 清除html标签-->
              <span style="font-size:16px; color:#ccc;">{!!strip_tags($one->article_contents)!!}</span>
            </td>
          </tr>
          <tr>
            <td>
              <div>发布:[{{$one->user->name}}] <span class="f_right">阅读:{{$one->reads}},评论:{{$one->comments}},{{$one->created_at}}</span></div>
            </td>
          </tr>
        </table>
      </td>
    </table>
  </div>
  @else
  <div class="article_list">
    [{{$one->name}}]发布:<a href='{{URL('article/id/'.$one->id)}}'>{{$one->article_title}}</a> <span class="f_right">阅读:{{$one->reads}},评论:{{$one->comments}},{{$one->created_at}}</span>
  </div>
  @endif
  @endforeach
  {!!$fy!!}
  <script type="text/javascript">
    function go(){
      window.location='/vipusers';
    }
  </script>
@endsection
