<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>#CodeHacking-Post</title>
     <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lemon|Montserrat|Ubuntu&display=swap" rel="stylesheet">
    <!--  Favicon -->
   <link rel="icon" href="{{asset('images/favicon.ico')}}">
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('lib_css/css/bootstrap.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('lib_css/css/blog-post.css')}}" rel="stylesheet">
    <link href="{{asset('lib_css/css/custom.css')}}" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('home')}}">#Codehacking</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::guest())
                        <li> <a href="{{url('login')}}">Login</a> </li>
                        <li> <a href="{{url('register')}}">Register</a> </li>
                    @elseif(Auth::user()->role->name == "Subscriber")
                        <li> <a href="{{url('logout')}}">Logout</a> </li> 
                    @else
                        <li> <a href="{{url('admin')}}">Admin</a> </li>
                        <li> <a href="{{url('logout')}}">Logout</a> </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>