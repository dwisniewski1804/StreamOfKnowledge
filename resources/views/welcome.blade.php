<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-light_green.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <title>Stream of Knowledge</title>
        <link rel="icon" href="{{ asset('Pictures/ikona.png') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('/css/homepage.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-light_green.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-light_green.min.css" /> 
        <!-- MDB -->
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <link href="{{asset('mdb/css/mdb.min.css') }}" rel="stylesheet">
        <link href="{{ asset('mdb/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('mdb/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/skin.css') }}" rel="stylesheet">
        <link rel="icon" href="{{ asset('Pictures/ikona.png') }}">
        <!-- Scripts -->
        <script src="{{ asset('mdl/material.min.js') }}"></script>

        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{asset('mdb/js/tether.min.js')}}"></script>

        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{asset('mdb/js/bootstrap.min.js') }}"></script>

        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{asset('mdb/js/mdb.min.js') }}"></script>



    </head>
    <body>
        <div class="flex-center position-ref full-height" style="">
            @if (Route::has('login'))
            <div class="top-right links welcome-login-links">
                @if (Auth::check())
                <a href="{{ url('/home') }}" data-toggle="tooltip" data-placement="bottom" title="Start"><i class="fa fa-home" aria-hidden="true"></i></a>
                @else
                <a href="{{ url('/login') }}" data-toggle="tooltip" data-placement="bottom" title="Zaloguj"><i class="fa fa-sign-in" aria-hidden="true"></i>
                </a>
                <a href="{{ url('/register') }}" data-toggle="tooltip" data-placement="bottom" title="Zarejestruj"><i class="fa fa-user-plus" aria-hidden="true"></i>
                </a>
                @endif
            </div>
            @endif
            <div class="content" style="">
                <div class="title ">
                    Stream of Knowledge 
                </div>
                <div class="links row">
                    <div class="col-md-2 "></div>
                    <div class="col-md-2 homepage-card">

                        <!--Card-->
                        <div class="card card-cascade wider">

                            <!--Card image-->
                            <div class="view overlay hm-white-slight">
                                <img src="{{asset('Pictures/homepage_wiedza.jpg') }}" class="img-fluid homepage-image">
                                <a href="#!">
                                    <div class="mask waves-effect waves-light"></div>
                                </a>
                            </div>
                            <!--/Card image-->

                            <!--Card content-->
                            <div class="card-block text-center">
                                <!--Title-->
                                <h4 class="card-title" ><strong>Wiedza</strong></h4>

                                <p class="card-text">Zdobąź ją!</p>

                                <a class="icons-sm li-ic" id="homepageWiedzzaPoziomy"><i class="fa fa-tasks"> </i></a>
                                <div class="mdl-tooltip" for="homepageWiedzzaPoziomy">{{$levelsC}} stopnie nauczania</div>

                                <a class="icons-sm drib-ic"  id="homepageWiedzzaPrzedmioty"><i class="fa fa-book"> </i></a>
                                <div class="mdl-tooltip" for="homepageWiedzzaPrzedmioty">{{$subjectsC}}przedmioty</div>
                                <a class="icons-sm gplus-ic" id="homepageWiedzzaTematy"><i class="fa fa-pencil-square"> </i></a>
                                <div class="mdl-tooltip" for="homepageWiedzzaTematy">{{$sectionsC}} tematów</div>

                                <a class="icons-sm ins-ic" id="homepageWiedzaMaterialy"><i class="fa fa-download"> </i></a>
                                <div class="mdl-tooltip" for="homepageWiedzaMaterialy">1035 materiałów</div>


                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </div>
                    <div class="col-md-2 homepage-card">

                        <!--Card-->
                        <div class="card card-cascade wider">

                            <!--Card image-->
                            <div class="view overlay hm-white-slight">
                                <img src="{{asset('Pictures/homepage_forum.jpg') }}" class="img-fluid homepage-image">
                                <a href="{{ action('ForumController@start') }}">
                                    <div class="mask waves-effect waves-light"></div>
                                </a>
                            </div>
                            <!--/Card image-->

                            <!--Card content-->
                            <div class="card-block text-center">
                                <!--Title-->
                                <h4 class="card-title"><strong>FORUM</strong></h4>

                                <p class="card-text">Zadaj pytanie!</p>

                                <!--Dribbble-->
                                <a class="icons-sm drib-ic"><i class="fa fa-dribbble"> </i></a>
                                <!--Linkedin-->
                                <a class="icons-sm li-ic"><i class="fa fa-linkedin"> </i></a>
                                <!--Google +-->
                                <a class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a>
                                <!--Instagram-->
                                <a class="icons-sm ins-ic"><i class="fa fa-instagram"> </i></a>

                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </div>
                    <div class="col-md-2 homepage-card">

                        <!--Card-->
                        <div class="card card-cascade wider">

                            <!--Card image-->
                            <div class="view overlay hm-white-slight">
                                <img src="{{asset('Pictures/homepage_korki.jpg') }}" class="img-fluid homepage-image">
                                <a href="#!">
                                    <div class="mask waves-effect waves-light"></div>
                                </a>
                            </div>
                            <!--/Card image-->

                            <!--Card content-->
                            <div class="card-block text-center">
                                <!--Title-->
                                <h4 class="card-title"><strong>Korepetycje</strong></h4>

                                <p class="card-text">SZukasz pomocy?</p>

                                <!--Dribbble-->
                                <a class="icons-sm drib-ic"><i class="fa fa-dribbble"> </i></a>
                                <!--Linkedin-->
                                <a class="icons-sm li-ic"><i class="fa fa-linkedin"> </i></a>
                                <!--Google +-->
                                <a class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a>
                                <!--Instagram-->
                                <a class="icons-sm ins-ic"><i class="fa fa-instagram"> </i></a>

                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </div>

                    <div class="col-md-2 homepage-card">

                        <!--Card-->
                        <div class="card card-cascade wider">

                            <!--Card image-->
                            <div class="view overlay hm-white-slight">
                                <img src="{{asset('Pictures/homepage_konkursy.jpg') }}" class="img-fluid homepage-image" >
                                <a href="#!">
                                    <div class="mask waves-effect waves-light"></div>
                                </a>
                            </div>
                            <!--/Card image-->

                            <!--Card content-->
                            <div class="card-block text-center">
                                <!--Title-->
                                <h4 class="card-title"><strong>Konkursy</strong></h4>
                                <p class="card-text">Wygraj coś ! </p>

                                <!--Dribbble-->
                                <a class="icons-sm drib-ic"><i class="fa fa-dribbble"> </i></a>
                                <!--Linkedin-->
                                <a class="icons-sm li-ic"><i class="fa fa-linkedin"> </i></a>
                                <!--Google +-->
                                <a class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a>
                                <!--Instagram-->
                                <a class="icons-sm ins-ic"><i class="fa fa-instagram"> </i></a>

                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </div>

                </div>
            </div>
        </div>
        <script>
$(function () {
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();

    });
})
        </script>
    </body>
</html>
