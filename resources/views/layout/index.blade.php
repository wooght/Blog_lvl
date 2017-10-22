<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','Blog-wooght')}}</title>

        <!-- Fonts -->
        <link href="{{asset('css/blog_lvl.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/wooght.css')}}" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body>
      <div name='top' class='top'>
        <span class="index"><a href='/'>Blog-wooght</a></span>
        <!--判断是否是游客-->
        @guest
        <span class="f_right"><a href='{{ route('register') }}'>注册</a></span>
        <span class="f_right"><a href='{{ route('login') }}'>登陆</a></span>
        <!--不是游客运行-->
        @else
        <span class="f_right">
          您好:<b>{{Auth::user()->name}}</b> | <a style="font-size:12px; color:#333;" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              退出
          </a>
        </span>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        <!--身份认证结束-->
        @endguest
      </div>
      <div class="content">
            @yield('content')
      </div>
      <div class="footer">{{config('app.name'),'博客系统'}} by wooght</div>
    </body>
</html>
