<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('feed::links')

    <link rel="stylesheet" href="/colormag/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/colormag/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/colormag/assets/css/font.css">
    <link rel="stylesheet" href="/colormag/assets/css/animate.css">
    <link rel="stylesheet" href="/colormag/assets/css/structure.css">
    <!--[if lt IE 9]>
    <script src="/colormag/assets/js/html5shiv.min.js"></script>
    <script src="/colormag/assets/js/respond.min.js"></script>
    <![endif]-->
</head>



<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<header id="header">
  <div class="container">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="{{ route('home') }}"><span>My News</span>Spot</a> </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav custom_nav">
            <li class=""><a href="{{ route('home') }}">Home</a></li>
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li><a href="{{ route('myposts') }}">My Posts</a></li>
                <li><a href="{{ route('news.create') }}">New News</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>
<section id="contentbody">
  <div class="container">
    <div class="row">
      <div class=" col-sm-12">
        <div class="row">
          <div class="leftbar_content">

            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif

            @yield('content')

            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="footer_inner">
          <p class="pull-left">Copyright &copy; 2014 My News Spot</p>
          <p class="pull-right">Developed By Hiren Shah</p>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="/colormag/assets/js/jquery.min.js"></script> 
<script src="/colormag/assets/js/bootstrap.min.js"></script> 
<script src="/colormag/assets/js/wow.min.js"></script> 
<script src="/colormag/assets/js/custom.js"></script>
</body>
</html>