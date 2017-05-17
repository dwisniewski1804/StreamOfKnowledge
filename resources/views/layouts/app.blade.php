<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-light_green.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <title>{{ config('app.name', 'Stream of Knowledge') }}</title>
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-light_green.min.css" /> 
        <!-- MDB -->
        <link href="{{asset('mdb/css/mdb.min.css') }}" rel="stylesheet">
        <link href="{{ asset('mdb/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('mdb/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/skin.css') }}" rel="stylesheet">
        <link rel="icon" href="{{ asset('Pictures/ikona.png') }}">
        <!-- Scripts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script src="{{ asset('mdl/material.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{asset('mdb/js/tether.min.js')}}"></script>

        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{asset('mdb/js/bootstrap.min.js') }}"></script>

        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{asset('mdb/js/mdb.min.js') }}"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script>
window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
]) !!}
;
        </script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        </script>

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top" id="globalHeader">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Stream of Knowledge') }}
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->

                        <ul class="nav navbar-nav">
                            &nbsp;

                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right" style="display:inline-block; font-size:20px;">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li > <a href="{{ url('/login') }}" data-toggle="tooltip" data-placement="bottom" title="Zaloguj"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                </a></li>
                            <li> <a href="{{ url('/register') }}" data-toggle="tooltip" data-placement="bottom" title="Zarejestruj"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                </a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} 
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li style="width:100%">
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                                            Wyloguj
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="menuGlobal">

            </div><div id="contentRight">
                @yield('content')
            </div>
            <!--            <div class="footer">
                            <div class="footerIcons">
                                <a href="https://www.facebook.com/" class="logoFacebook"> 
                                </a>
                                <a href="https://twitter.com/?lang=pl" class="logoTwitter"> 
                                </a>
                                <a href="https://www.youtube.com" class="logoYoutube"> 
                                </a>
                            </div>
                            <div style="font-size: 9px;">
                                Created by Damian Wiśniewski
                            </div>
                            <div style="font-size: 7px;">
                                Wszelkie prawa zastrzerzone                </div>
                        </div>-->
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
//                                               $(document).ready(function () {
//                                                   $(window).bind('mousewheel', function (e) {
//                                                       if (e.originalEvent.wheelDelta / 120 > 0) {
//                                                           console.log('scrolling up !');
//
//                                                       } else {
//                                                           console.log('scrolling down !');
//                                                           var styles = {
//                                                               position: 'absolute',
//                                                               bottom: "0"
//                                                           };
//                                                           $('.footer').css(styles);
//                                                       }
//                                                   });
//                                               });
        </script>
    </body>
</html>
