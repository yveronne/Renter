@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 hamburgerDiv">
            <a href="{{route('home')}}">Accueil</a> > <a href="{{route('buildings.index')}}">Mes propriétés</a> > <a href="{{route('buildings.create')}}" class="actual">Ajouter une propriété</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 contentPart">
            <h4 class="titleHome">AJOUTER UNE PROPRIETE</h4>
            <form action="{{route('buildings.store')}}" method="POST" class="col-md-6 col-md-offset-3">
                {{csrf_field()}}

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="md-form{{ $errors->has('buildingName') ? 'has-error' : ''}}">
                    <input type="text" id="buildingName" class="form-control" name="buildingName" value="{{ old('buildingName') }}" autofocus>
                    <label for="buildingName">Nom de la propriété</label>
                </div>
                {{--@if($errors->has('buildingName'))
                    <small class="text-danger">{{ $errors->first('buildingName') }}</small>
                @endif--}}

                <div class="md-form{{ $errors->has('buildingLocation') ? 'has-error' : ''}}">
                    <input type="text" id="buildingLocation" class="form-control" name="buildingLocation" value="{{ old('buildingLocation') }}">
                    <label for="buildingLocation">Localisation</label>
                </div>
                {{--@if($errors->has('buildingLocation'))
                    <small class="text-danger">{{ $errors->first('buildingLocation') }}</small>
                @endif--}}

                <div class="md-form{{ $errors->has('floorsNumber') ? 'has-error' : ''}}">
                    <input type="text" id="floorsNumber" class="form-control" name="floorsNumber" value="{{ old('floorsNumber') }}">
                    <label for="floorsNumber">Nombre d'étages</label>

                </div>
                {{--@if($errors->has('floorsNumber'))
                    <small class="text-danger">{{ $errors->first('floorsNumber') }}</small>
                @endif--}}

                <div class="text-center mt-4">
                    <button class="btn btn-mine" type="submit">Ajouter</button>
                </div>
            </form>

        </div>
    </div>

@endsection
