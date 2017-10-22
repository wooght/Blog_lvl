<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!--边兰头像-->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset("adminlte/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ auth('admin')->user()->name }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i>{{$allnum['admins']->roles[0]['display_name']}}</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="搜索...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">管理选项</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>用户管理</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right">{{$allnum['users_num']}}</span>
          </span>
        </a>
        @if($allnum['admins']->hasRole('admins'))
        <ul class="treeview-menu">
          <li><a href="{{URL('admin/user')}}"><i class="fa fa-circle-o">用户列表</i></a></li>
          <!--拥有管理权限才显示管理员管理,Entrust权限应用-->
          @if($allnum['admins']->can('editor_user'))
          <li><a href="{{URL('admin/adminlist')}}"><i class="fa fa-circle-o">管理员列表</i></a></li>
          @endif
        </ul>
        @endif
      </li>
      <li>
        <a href="{{URL('admin')}}">
          <i class="fa fa-calendar"></i> <span>帖子管理</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red">{{$allnum['articles_num']}}</small>
          </span>
        </a>
      </li>
      <li>
        <a href="{{URL('admin/comment')}}">
          <i class="fa fa-envelope"></i> <span>评论管理</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-yellow">{{$allnum['comments_num']}}</small>
          </span>
        </a>
      </li>
      <li class="header">数据统计</li>
      <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">文章总数</span>
              <span class="info-box-number">{{$allnum['articles_num']}}</span>
            </div>
      </div>

      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">评论总数</span>
          <span class="info-box-number">{{$allnum['comments_num']}}</span>
        </div>
      </div>

      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">注册用户</span>
          <span class="info-box-number">{{$allnum['users_num']}}</span>
        </div>
      </div>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
