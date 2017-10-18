<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
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
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
