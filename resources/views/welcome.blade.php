<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Renter</title>

        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

        <!-- Styles -->
        <link href="{{asset('css/welcomeStyle.css')}}" rel="stylesheet">

    </head>

    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Accueil</a>
                    @else
                        <a href="{{ route('login') }}">Se connecter</a>
                        <a href="{{ route('register') }}">S'inscrire</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title col-md-12 col-sm-12 col-xs-12">
                    Bienvenue sur Renter
                </div>
                <h3>Connectez-vous pour commencer</h3>

            </div>
        </div>
    </body>
</html>
