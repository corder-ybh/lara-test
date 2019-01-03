<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body style="background-color: #eee">
<div id="app">
    {{--<nav class="navbar navbar-default navbar-static-top">--}}
    {{--<div class="container">--}}
    {{--<div class="navbar-header">--}}

    {{--<!-- Collapsed Hamburger -->--}}
    {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">--}}
    {{--<span class="sr-only">Toggle Navigation</span>--}}
    {{--<span class="icon-bar"></span>--}}
    {{--<span class="icon-bar"></span>--}}
    {{--<span class="icon-bar"></span>--}}
    {{--</button>--}}

    {{--<!-- Branding Image -->--}}
    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
    {{--{{ config('app.name', 'Laravel') }}--}}
    {{--</a>--}}
    {{--</div>--}}

    {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
    {{--<!-- 导航条左边 -->--}}
    {{--<ul class="nav navbar-nav">--}}
    {{--<li><a href="{{ url('/') }}">Home</a></li>--}}
    {{--@if (!Auth::guest())--}}
    {{--<li><a href="{{ route('posts.create') }}">New Article</a></li>--}}
    {{--@endif--}}
    {{--@if (!Auth::guest())--}}
    {{--<li><a href="{{ route('users.index') }}">用户列表</a></li>--}}
    {{--@endif--}}
    {{--</ul>--}}

    {{--<!-- 导航条右边 -->--}}
    {{--<ul class="nav navbar-nav navbar-right">--}}
    {{--<!-- 登录注册链接 -->--}}
    {{--@if (Auth::guest())--}}
    {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
    {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
    {{--@else--}}
    {{--<li class="dropdown">--}}
    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" roles="button" aria-expanded="false">--}}
    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
    {{--</a>--}}

    {{--<ul class="dropdown-menu" roles="menu">--}}
    {{--<li>--}}
    {{--@roles('Admin') --}}{{-- Laravel-permission blade 辅助函数 --}}
    {{--<a href="#"><i class="fa fa-btn fa-unlock"></i>Admin</a>--}}
    {{--@endrole--}}
    {{--<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
    {{--Logout--}}
    {{--</a>--}}

    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
    {{--{{ csrf_field() }}--}}
    {{--</form>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</li>--}}
    {{--@endif--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</nav>--}}

    @if(Session::has('flash_message'))
        <div class="container">
            <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include ('errors.list') {{-- 引入错误文件 --}}
        </div>
    </div>
    <div class="container" >
        <div style="width: 40%;margin: 0 auto;">
            <h3>登录</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" style="width: 10%;height: 34px" class="col-md-4 col-form-label text-md-right">邮&nbsp;&nbsp;箱：</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" style="width: 10%;height: 34px;" class="col-md-4 col-form-label text-md-right">密&nbsp;&nbsp;码：</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                {{--<div class="form-group row">--}}
                {{--<div class="col-md-6 offset-md-4">--}}
                {{--<div class="form-check">--}}
                {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                {{--<label class="form-check-label" for="remember">--}}
                {{--{{ __('Remember Me') }}--}}
                {{--</label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            登录
                        </button>

                        {{--@if (Route::has('password.request'))--}}
                        {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                        {{--{{ __('Forgot Your Password?') }}--}}
                        {{--</a>--}}
                        {{--@endif--}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
