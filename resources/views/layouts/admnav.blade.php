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
        <a href="#"><i class="fa fa-circle text-success"></i>在线</a>
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
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="#"><i class="fa fa-link"></i> <span>主题列表</span></a></li>
      <li><a href="#"><i class="fa fa-link"></i> <span>用户管理</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>评论管理</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>用户管理</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right">{{$allnum['users_num']}}</span>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{URL('admin/user')}}"><i class="fa fa-circle-o">用户列表</i></a></li>
          <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i>管理员列表</a></li>
        </ul>
      </li>
      <li>
        <a href="{{URL('admin')}}">
          <i class="fa fa-calendar"></i> <span>主题管理</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red">{{$allnum['articles_num']}}</small>
          </span>
        </a>
      </li>
      <li>
        <a href="pages/mailbox/mailbox.html">
          <i class="fa fa-envelope"></i> <span>评论管理</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-yellow">{{$allnum['comments_num']}}</small>
          </span>
        </a>
      </li>
      <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>

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
