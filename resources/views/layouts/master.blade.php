<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IranVN - شبکه مجازی ایران @yield('title')</title>

        <!-- Fonts -->
        <!-- Styles -->
    {{--  <link href="css/bt-rtl.css" rel="stylesheet">   --}}
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
     
     
@yield('header')
    </head>
    <body>
          
<nav id="navbar-example2" class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>

  <ul class="nav navbar-nav" >
                        @guest
                            <li><a href="{{ route('login') }}">ورود</a></li>
                            <li><a href="{{ route('register') }}">ثبت نام</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            خروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
</nav>
           
           
           <nav class="nav navbar navbar-default ">
            <div class="container">
                <div class="navbar-header" >

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav" >
                        @guest
                            <li><a href="{{ route('login') }}">ورود</a></li>
                            <li><a href="{{ route('register') }}">ثبت نام</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            خروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                        <li id="aboutli"><a href="">درباره ما</a></li>
                        <li id="contactli"><a href="">ارتباط</a></li>
                        <li id="homeli"><a href="\">خانه</a></li>
                        <li> &nbsp;&nbsp; </li>
                    
                        <!-- Authentication Links -->
                       <!-- Branding Image -->
                    <a class="navbar-brand  " href="{{ url('/') }}">
                        {{ config('app.name', 'شبکه مجازی ایران') }}
                    </a>
                    </ul>
                </div>
            </div>
            
        </nav>
           <div class="container fix-top">
           @yield('content')
           </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>       

        {{--  navbar-fixed-bottom  --}}
        <footer class="navbar  bg-primary">
   
            @yield('footer')
            <p class="text-center">َتمامی حقوق محفوظ است</p>
            <p class="text-center"> {{ config('app.name', 'شبکه مجازی ایران') }}</p>
            
        </footer>
    </body>
</html>  