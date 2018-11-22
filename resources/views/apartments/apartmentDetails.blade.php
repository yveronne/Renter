@extends('layouts.apartmentsLayout')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-6">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Détails de l'appartement N°<strong>{{$apartment->apartmentNumber}}</strong></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{url('/home')}}">Accueil</a></li>
                        <li><a href="{{url('/apartments')}}">Mes appartements</a></li>
                        <li class="active">Détails de l'appartement</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <span class="spanTitle">PROPRIETE:</span> <span class="spanValue">{{$apartment->building->buildingName}}, {{$apartment->building->buildingLocation}}</span>
                    <br>
                    <span class="spanTitle">NUMERO DE L'APPARTEMENT:</span> <span class="spanValue">{{$apartment->apartmentNumber}}</span>
                    <br>
                    {{--<span class="spanTitle">LOCATAIRE:</span> <span class="spanValue">{{$apartment->tenant->lastName}} {{$apartment->tenant->firstName}}</span>
                    <br>--}}
                    <span class="spanTitle">LOYER MENSUEL:</span> <span class="spanValue">{{$apartment->monthlyRent}}</span>
                    <br>
                    <span class="spanTitle">NOMBRE DE SALON(S):</span> <span class="spanValue">{{$apartment->livingRoomsNumber}}</span>
                    <br>
                    <span class="spanTitle">NOMBRE DE CUISINE(S):</span> <span class="spanValue">{{$apartment->kitchensNumber}}</span>
                    <br>
                    <span class="spanTitle">NOMBRE DE CHAMBRE(S):</span> <span class="spanValue">{{$apartment->bedroomsNumber}}</span>
                    <br>
                    <span class="spanTitle">NOMBRE DE SALLE(S) DE BAIN:</span> <span class="spanValue">{{$apartment->bathroomsNumber}}</span>
                    <br>

                    <br>
                    <a href="#" data-toggle="modal" data-target="#updateApartmentModal" class="btn btn-primary">Modifier l'appartement</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateApartmentModal" tabindex="-1" role="dialog" aria-labelledby="updateApartmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateBuildingModalLabel">Modifier l'appartement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('apartments.update', [$apartment])}}" method="post">
                    {{csrf_field()}}

                    {{--<div class="modal-body">
                        <div class="row form-group{{$errors->has('buildingName') ? ' has-warning' : ''}}">
                            <div class="col-md-5">
                                <label for="buildingName" class="form-control-label">Nom de la propriété</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="buildingName" id="buildingName" value="{{$building->buildingName}}" class="form-control{{$errors->has('buildingName') ? ' is-invalid' : ''}}">
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
                                <input type="text" name="buildingLocation" id="buildingLocation" value="{{$building->buildingLocation}}" class="form-control{{$errors->has('buildingLocation') ? ' is-invalid' : ''}}">
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
                                <input type="number" step="1" name="floorsNumber" id="floorsNumber" value="{{$building->floorsNumber}}" class="form-control{{$errors->has('floorsNumber') ? ' is-invalid' : ''}}">
                                @if ($errors->has('buildingLocation'))
                                    <small class="text-danger">
                                        <strong>{{ $errors->first('floorsNumber') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                    </div>--}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection