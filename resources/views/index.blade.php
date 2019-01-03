<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/styles.js')}}"></script>
    <script>
        if (window != top) top.location.href = location.href;
    </script>
</head>
<body>
<!--头部 开始-->
<div class="top_box">
    <div class="top_left">
        <div class="logo">FAM</div>
        <ul>
            <li><a href="#" class="active">首页</a></li>
        </ul>
    </div>
    <div class="top_right">
        <ul>
            <li>欢迎使用本系统：{{ Auth::user()->name }}</li>
            <li><a href="{{url('admin/auth/updatePass')}}" target="main">修改密码</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    注销
                </a></li>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            </form>
        </ul>
    </div>
</div>
<!--头部 结束-->

<!--左侧导航 开始-->
<div class="menu_box">
    <ul>
        @foreach($menu as $menuOne)
            <li>
                <h3><i class="fa fa-fw fa-list-ul"></i>{{$menuOne['m_name']}}</h3>
                @if($menuOne['childMenu'])
                    <ul class="sub_menu">
                        @foreach($menuOne['childMenu'] as $menuTwo)
                            @if($menuTwo['childMenu'])
                                <li>
                                    <h3><i class="fa fa-fw fa-plus-circle"></i>{{$menuTwo['m_name']}}</h3>
                                    <ul class="sub_menu">
                                        @foreach($menuTwo['childMenu'] as $menuThree)
                                            <li class="leaf_menu">
                                                <a href="{{route($menuThree['url'])}}" target="main"><!--$menuThree['url']-->
                                                    {{$menuThree['m_name']}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="leaf_menu"><a href="{{route($menuTwo['url'])}}"
                                                         target="main">{{$menuTwo['m_name']}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
<!--左侧导航 结束-->

<!--主体部分 开始-->
<div class="main_box">
    <iframe src="{{url('/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
</div>
<!--主体部分 结束-->

<!--底部 开始-->
<div class="bottom_box">
    CopyRight © 2019. Powered By FD ERP<a href=""></a>.
</div>
<!--底部 结束-->
</body>
</html>