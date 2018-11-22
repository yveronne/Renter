@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 hamburgerDiv">
            <a href="{{url('/home')}}">Accueil</a> > <a href="{{url('/buildings')}}">Mes propriétés</a>
            > <a href="{{route('buildings.edit', [$building])}}" class="actual">Modifier une propriété</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 contentPart">
            <h4 class="titleHome">MODIFIER UNE PROPRIETE</h4>
            <form action="{{route('buildings.update', [$building])}}" method="POST" class="col-md-6 col-md-offset-3">
                {{csrf_field()}}
                {{method_field('PATCH')}}

                @include('partials.errors')

                <div class="md-form{{ $errors->has('buildingName') ? 'has-error' : ''}}">
                    <input type="text" id="buildingName" class="form-control" name="buildingName" value="{{ $building->buildingName }}" autofocus>
                    <label for="buildingName">Nom de la propriété</label>
                </div>

                <div class="md-form{{ $errors->has('buildingLocation') ? 'has-error' : ''}}">
                    <input type="text" id="buildingLocation" class="form-control" name="buildingLocation" value="{{ $building->buildingLocation }}">
                    <label for="buildingLocation">Localisation</label>
                </div>

                <div class="md-form{{ $errors->has('floorsNumber') ? 'has-error' : ''}}">
                    <input type="text" id="floorsNumber" class="form-control" name="floorsNumber" value="{{ $building->floorsNumber }}">
                    <label for="floorsNumber">Nombre d'étages</label>

                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-mine" type="submit">Appliquer les modifications</button>
                </div>
            </form>

        </div>
    </div>
@endsection