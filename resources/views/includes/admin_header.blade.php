<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('lib_css/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('lib_css/css/blog-post.css')}}" rel="stylesheet">
    <link href="{{asset('lib_css/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('lib_css/css/metisMenu.css')}}" rel="stylesheet">
    <link href="{{asset('lib_css/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('lib_css/css/styles.css')}}" rel="stylesheet">
    <link href="{{asset('lib_css/css/custom.css')}}" rel="stylesheet">
    <!-- TinyMce -->
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    @yield('upload_css')
</head>
<body id="admin-page">
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}">Home</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right" >
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }}<i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{route('users.edit', Auth::user()->id)}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li> <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        {{--<ul class="nav navbar-nav navbar-right">--}}
        {{--@if(auth()->guest())--}}
        {{--@if(!Request::is('auth/login'))--}}
        {{--<li><a href="{{ url('/auth/login') }}">Login</a></li>--}}
        {{--@endif--}}
        {{--@if(!Request::is('auth/register'))--}}
        {{--<li><a href="{{ url('/auth/register') }}">Register</a></li>--}}
        {{--@endif--}}
        {{--@else--}}
        {{--<li class="dropdown">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>--}}
        {{--<ul class="dropdown-menu" role="menu">--}}
        {{--<li><a href="{{route('/logout')}}">Logout</a></li>--}}

        {{--<li><a href="{{ url('/admin/profile') }}/{{auth()->user()->id}}">Profile</a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--@endif--}}
        {{--</ul>--}}
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{route('users.index')}}">All Users</a></li>
                            <li><a href="{{route('users.create')}}">Create User</a></li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-newspaper-o"></i> Posts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{route('posts.index')}}">All Posts</a></li>
                            <li><a href="{{route('posts.create')}}">Create Post</a></li>
                            <li><a href="{{route('comments.index')}}">All Comment</a></li>
                            <li><a href="{{route('replies.index')}}">All Reply</a></li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-list-alt"></i> Categories<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{route('categories.index')}}">All Categories</a></li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-picture-o"></i> Media<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{route('media.index')}}">All Media</a></li>
                            <li><a href="{{route('media.create')}}">Upload Media</a></li>
                        </ul>
                    <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/profile"><i class="fa fa-dashboard fa-fw"></i>Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="">All Posts</a></li>
                        <li><a href="">Create Post</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
    </div>
</div>