@extends('layouts.buildingsLayout')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Ajouter une propriété</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{url('/home')}}">Accueil</a></li>
                        <li><a href="{{url('/buildings')}}">Mes propriétés</a></li>
                        <li class="active">Ajouter une propriété</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <form action="{{route('buildings.store')}}" method="POST" class="col-md-6 col-md-offset-3">
                {{csrf_field()}}

                <div class="row form-group{{$errors->has('buildingName') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="buildingName" class="form-control-label">Nom de la propriété</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="buildingName" id="buildingName" value="{{old('buildingName')}}" class="form-control{{$errors->has('buildingName') ? ' is-invalid' : ''}}">
                        @if ($errors->has('buildingName'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('buildingName') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('buildingLocation') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="buildingLocation" class="form-control-label">Localisation</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="buildingLocation" id="buildingLocation" value="{{old('buildingLocation')}}" class="form-control{{$errors->has('buildingLocation') ? ' is-invalid' : ''}}">
                        @if ($errors->has('buildingLocation'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('buildingLocation') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('floorsNumber') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="floorsNumber" class="form-control-label">Nombre d'étages</label>
                    </div>
                    <div class="col-md-7">
                        <input type="number" step="1" name="floorsNumber" id="floorsNumber" value="{{old('floorsNumber')}}" class="form-control{{$errors->has('floorsNumber') ? ' is-invalid' : ''}}">
                        @if ($errors->has('buildingLocation'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('floorsNumber') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
@endsection

