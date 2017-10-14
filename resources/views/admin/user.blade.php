@extends('layouts.adminlte')
<!--后台首页,默认文章列表-->
@section('header')
    用户管理
    <small>用户列表查看</small>
@endsection
@section('bread')
    <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
    <li class="active">用户列表</li>
@endsection
@section('content')
<section class="content container-fluid">
  <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>email</th>
                    <th>文章数</th>
                    <th>评论数</th>
                    <th>注册时间</th>
                    <th>编辑</th>
                  </tr>
                  @foreach($users as $one)
                  <tr>
                    <td>{{$one->id}}</td>
                    <td>{{$one->name}}</td>
                    <td>{{$one->email}}</td>
                    <td><span class="badge bg-red">{{$one->articlenum}}</span></td>
                    <td><span class="badge bg-blue">{{$one->commentnum}}</span></td>
                    <td>{{$one->created_at}}</td>
                    <td><span class="label label-success"><a style="color:#fff;" href='{{URL('admin/articleslist/id/'.$one->id)}}'>查看文章</a></span></td>
                    <td><span class="label label-warning"><a style="color:#fff;" href="#" onclick="document.getElementById('del_fm{{$one->id}}').submit();">查看评论</a></span></td>
                  </tr>
                  <form action="{{URL('admin/article/'.$one->id)}}" id='del_fm{{$one->id}}' style="display:none;" method="post">
                    <input name='_method' type="hidden" value='DELETE'><!--DELETE大写-->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!--不能input传递其他参数-->
                  </form>
                  @endforeach
                </table>
              </div>
              {!!$fy!!}
</section>
@endsection
