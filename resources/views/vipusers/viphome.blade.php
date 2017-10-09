@extends('layout.index')
@section('content')
  <div name='user_form' class="user_form">
    <div class="new_tie">发布新贴</div>
    @if(count($errors)>0)
    <div class="blog_errors">

      !!!!内容填写有误:
      @foreach($errors->all() as $error)
      {{$error}}
      @endforeach

    </div>
    @endif

    <form method="post" action="{{URL('vipusers/fb')}}"  enctype="multipart/form-data">
      <div><span>标题:</span><input class="title" type="text" name="title"></div>
      <div>正文:</div>
      <div id="ueditor" name='body' class="edui-default">
        @include('UEditor::head')
      </div>
      {{ csrf_field() }}<!--Laravel通过post提交的表单必须有csrf-->
      <div><span>封面</span><input type="file" value="选择图片" style="width:200px; height:100px;" name="img" /></div>
      <div><input type="submit" class="submit" value="发布"></div>
    </form>
  </div>
  <script id="ueditor"></script>
<script>
    var ue=UE.getEditor("ueditor",{
      //toolbars:[
      //  ['Undo','Bold','Image']
      //],
      initialFrameWidth:900,
      initialFrameHeight:200,
      autoClearinitialContent:true
    });
    ue.ready(function(){
         //因为Laravel有防csrf防伪造攻击的处理所以加上此行
         ue.execCommand('serverparam','_token','{{ csrf_token() }}');
    });
</script>
@endsection
