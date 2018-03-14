<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>{{config('app.name')}}</title>

        {{--Styles--}}
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/perso.css')}}">
        <link rel="stylesheet" href="{{asset('css/myStyle.css')}}">
        <script defer src  ="{{asset('js/fontawesome-all.js')}}"></script>
    </head>

    <body>
        <header>

            {{--Side bar navigation--}}
            <div id="slide-out" class="side-nav fixed">
                <div>
                    <a href="#">
                        <img src="{{asset('images/logo.png')}}" height="70" alt="Logo">
                    </a>
                </div>
                <hr>

                <div>
                    <img src="{{asset('images/IMG-20170701-WA0028.jpg')}}" height="150" alt="Profile picture" class="img rounded-circle">
                    <br>
                    <a href="#">{{Auth::user()->lastName}} {{Auth::user()->firstName}}</a>
                </div>
                <a href="#">Accueil</a>
                <a href="#">Mes propriétés</a>
                <a href="#">Mes appartements</a>
                <a href="#">Mes locataires</a>
                <a href="#">Les loyers</a>
                <a href="#">Les factures</a>
            </div>

            {{--End of side bar navigation--}}

            <nav class="navbar navbar-expand-md navbar-light">

                <div class="float-left">
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
                    <!-- Navbar brand -->
                    <a class="navbar-brand" href="#">
                        <img src="{{asset('images/logo.png')}}" height="70" alt="">
                    </a>
                </div>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="basicExampleNav">

                    <!-- Links -->
                    <ul class="nav navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/home')}}">Accueil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/buildings')}}">Mes propriétés</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Les loyers</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <!-- Dropdown -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                Bienvenue {{Auth::user()->lastName}} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="#"><i class="fas fa-cog"></i> Paramètres du compte</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('logout')}}"
                                    onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Links -->
                </div>


            </nav>
            <!--/.Navbar-->
        </header>

        <div class="container-fluid">
            <div class="row">
                <div class="d-none  d-md-block col-md-2" id="mySideBar">
                    <div>
                        <img class="img rounded-circle" src="{{asset('images/IMG-20170701-WA0028.jpg')}}" height="150">
                        <span class="nameSpan"><a href="#">{{Auth::user()->lastName}} {{Auth::user()->firstName}}</a></span>
                    </div>
                    <a href="{{url('/home')}}">Accueil</a>
                    <a href="{{url('/buildings')}}">Mes propriétés</a>
                    <a href="#">Mes appartements</a>
                    <a href="#">Mes locataires</a>
                    <a href="#">Les loyers</a>
                    <a href="#">Les factures</a>
                </div>

                <div class="col-xs-12  col-md-10 content">
                    @yield('content')
                </div>

            </div>
        </div>

        <!--Footer-->
        <footer class="page-footer font-small  pt-4 mt-4">

            <!--Footer Links-->
            <div class="container-fluid text-center text-md-left">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="{{url('/home')}}">Accueil</a> |
                        <a href="{{url('/buildings')}}">Mes propriétés</a> |
                        <a href="#">Mes appartements</a> |
                        <a href="#">Mes locataires</a> |
                        <a href="#">Les loyers</a>
                    </div>
                </div>
            </div>
            <!--/.Footer Links-->

            <!--Copyright-->
            <div class="footer-copyright py-3 text-center">
                <div class="container-fluid">
                    © 2018 Copyright: YEPMO Véronne, veronneyepmo@gmail.com

                </div>
            </div>
            <!--/.Copyright-->

        </footer>
        <!--/.Footer-->

        <script src="{{asset('js/compiled.min.js')}}"></script>
        <script>
            $(".button-collapse").sideNav();
        </script>
    </body>
</html>
