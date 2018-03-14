@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 hamburgerDiv">
            <a href="{{url('/home')}}">Accueil</a> > <a href="{{url('/buildings')}}">Mes propriétés</a>
            > <a href="{{route('buildings.show', [$building])}}" class="actual">{{$building->buildingName}}</a>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 contentPart">
            <h4 class="titleHome">DETAILS DE LA PROPRIETE</h4>
            <a href="#">Modifier la propriété</a> <a href="#">Supprimer la propriété</a>
            <br>
            NOM : {{$building->buildingName}}
            <br>
            LOCALISATION: {{$building->buildingLocation}}
            <br>
            NOMBRE D'ETAGES: {{$building->floorsNumber}}
            <br>
            APPARTEMENTS: <a href="#">Ajouter un appartement</a>
            <br>
            <a href="#" class="btn btn-mine">Modifier la propriété</a>
        </div>
    </div>
@endsection