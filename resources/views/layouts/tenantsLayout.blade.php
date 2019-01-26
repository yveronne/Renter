<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mes locataires</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('scss/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/myStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/lib/datatable/dataTables.bootstrap.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css">

</head>
<body>


<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{url('/home')}}">Renter</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-item">
                    <a href="{{url('/home')}}"> <i class="menu-icon fa fa-home"></i>{{__('menu.accueil')}}</a>
                </li>
                <li class="menu-item">
                    <a href="{{url('/buildings')}}"> <i class="menu-icon fa fa-building"></i>{{__('menu.proprietes')}}</a>
                </li>
                <li class="menu-item">
                    <a href="{{url('/apartments')}}"><i class="menu-icon fa fa-sort-numeric-asc"></i>{{__('menu.appartements')}}</a>
                </li>
                <li class="menu-item-has-children dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="menu-icon fa fa-users"></i>{{__('menu.locataires')}}</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="active"><i class="menu-icon fa fa-users"></i><a href="{{url('/tenants')}}">Tous les locataires</a></li>
                        <li><i class="menu-icon fa fa-frown-o"></i><a href="{{url('/tenants/insolvent')}}">Les locataires insolvables</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                        Bienvenue {{Auth::user()->lastName}}
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa-cog"></i>Paramètres de mon compte</a>

                        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>Déconnexion
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>

                <div class="language-select dropdown" id="language-select">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                        <i class="flag-icon flag-icon-us"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="language" >
                        <div class="dropdown-item">
                            <span class="flag-icon flag-icon-fr"></span>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-us"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->

    @yield('content')

</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="{{asset('js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/myScript.js')}}"></script>

<script src="{{asset('js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/pdfmake.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{asset('js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/datatables-init.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    } );
</script>



{{--<script src="{{asset('js/dashboard.js')}}"></script>--}}

</body>
</html>
