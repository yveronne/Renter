@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 hamburgerDiv">
            <a href="{{route('home')}}">Accueil</a> > <a href="{{route('buildings.index')}}" class="actual">Mes propriétés</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 contentPart">
            <h4 class="titleHome">MES PROPRIETES</h4>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <span class="right"><i class="fas fa-plus"></i><a href="{{route('buildings.create')}}">Ajouter une propriété</a></span>
            <br>
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