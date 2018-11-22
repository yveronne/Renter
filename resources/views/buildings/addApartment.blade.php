@extends('layouts.buildingsLayout')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-6">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Ajouter un appartement à <strong>{{$building->buildingName}}</strong></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{url('/home')}}">Accueil</a></li>
                        <li><a href="{{url('/buildings')}}">Mes propriétés</a></li>
                        <li><a href="{{url('/buildings/'.$building->id)}}">Détails</a></li>
                        <li class="active">Ajouter un appartement</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <form action="{{url('/buildings/'.$building->id.'/addapartment')}}" method="POST" class="col-md-6 col-md-offset-3">
                {{csrf_field()}}

                <div class="row form-group{{$errors->has('apartmentNumber') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="apartmentNumber" class="form-control-label">Numéro de l'appartement</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="apartmentNumber" id="apartmentNumber" value="{{old('apartmentNumber')}}" class="form-control{{$errors->has('apartmentNumber') ? ' is-invalid' : ''}}">
                        @if ($errors->has('apartmentNumber'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('apartmentNumber') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('monthlyRent') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="monthlyRent" class="form-control-label">Loyer mensuel</label>
                    </div>
                    <div class="col-md-7">
                        <input type="number" step="5000" name="monthlyRent" id="monthlyRent" value="{{old('monthlyRent')}}" class="form-control{{$errors->has('monthlyRent') ? ' is-invalid' : ''}}">
                        @if ($errors->has('monthlyRent'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('monthlyRent') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('livingRoomsNumber') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="livingRoomsNumber" class="form-control-label">Nombre de salon(s)</label>
                    </div>
                    <div class="col-md-7">
                        <input type="number" step="1" name="livingRoomsNumber" id="livingRoomsNumber" value="1" class="form-control{{$errors->has('livingRoomsNumber') ? ' is-invalid' : ''}}">
                        @if ($errors->has('livingRoomsNumber'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('livingRoomsNumber') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('kitchensNumber') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="kitchensNumber" class="form-control-label">Nombre de cuisine(s)</label>
                    </div>
                    <div class="col-md-7">
                        <input type="number" step="1" name="kitchensNumber" id="kitchensNumber" value="1" class="form-control{{$errors->has('kitchensNumber') ? ' is-invalid' : ''}}">
                        @if ($errors->has('kitchensNumber'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('kitchensNumber') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('bedroomsNumber') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="bedroomsNumber" class="form-control-label">Nombre de chambre(s)</label>
                    </div>
                    <div class="col-md-7">
                        <input type="number" step="1" name="bedroomsNumber" id="bedroomsNumber" value="{{old('bedroomsNumber')}}" class="form-control{{$errors->has('bedroomsNumber') ? ' is-invalid' : ''}}">
                        @if ($errors->has('bedroomsNumber'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('bedroomsNumber') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('bathroomsNumber') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="bathroomsNumber" class="form-control-label">Nombre de salle(s) de bain</label>
                    </div>
                    <div class="col-md-7">
                        <input type="number" step="1" name="bathroomsNumber" id="bathroomsNumber" value="1" class="form-control{{$errors->has('bathroomsNumber') ? ' is-invalid' : ''}}">
                        @if ($errors->has('bathroomsNumber'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('bathroomsNumber') }}</strong>
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