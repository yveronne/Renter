@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 hamburgerDiv">
            <a href="{{route('home')}}">Accueil</a> > <a href="{{route('apartments.index')}}">Mes propriétés</a> > <a href="{{route('apartments.create')}}" class="actual">Ajouter un appartement</a>
        </div>
    </div>
@endsection