@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 hamburgerDiv">
            <a href="#">Accueil</a> > <a href="#" class="actual">Mes propriétés</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 contentPart">
            <h4 class="titleHome">MES PROPRIETES</h4>
            <a href="#">Ajouter une propriété</a>
            <br>
            <div class="row">
                @foreach($buildings as $building)
                    <div class="col-md-3 card">

                        <!--Card image-->
                        <img class="img-fluid" src="{{asset('images/photo_immeuble.jpg')}}" alt="Image d'appartement">

                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="buildingName">{{$building->buildingName}}</h4>
                            <!--Text-->
                            <h5>{{$building->buildingLocation}}</h5>
                            <h6>{{$building->floorsNumber}} étages</h6>
                            <a href="{{route('buildings.show', [$building])}}" class="btn btn-mine">Détails</a>
                        </div>

                    </div>
                    <div class="col-md-1"></div>
                @endforeach
            </div>

        </div>
    </div>
@endsection