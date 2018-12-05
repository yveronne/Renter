@extends('layouts.buildingsLayout')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-6">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Détails de la propriété <strong>{{$building->buildingName}}</strong></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{url('/home')}}">Accueil</a></li>
                        <li><a href="{{url('/buildings')}}">Mes propriétés</a></li>
                        <li class="active">Détails de la propriété</li>
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
                    <span class="spanTitle">NOM :</span> <span class="spanValue">{{$building->buildingName}}</span>
                    <br>
                    <span class="spanTitle">LOCALISATION:</span> <span class="spanValue">{{$building->buildingLocation}}</span>
                    <br>
                    <span class="spanTitle">NOMBRE D'ETAGES:</span> <span class="spanValue">{{$building->floorsNumber}}</span>
                    <br>
                    <span class="spanTitle">APPARTEMENTS:</span> <span id="addApartmentLink"><i class="fa fa-plus"></i><a class="btn-outline-primary" href="{{url('/buildings/'.$building->id.'/addapartment')}}" >Ajouter un appartement</a></span>
                    <br>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Numéro</th>
                                <th scope="col">Loyer Mensuel (F CFA)</th>
                                <th scope="col">Locataire</th>
                                <th scope="col">En règle?</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($building->apartments as $apartment)
                            <tr>
                                <th scope="row">{{$apartment->apartmentNumber}}</th>
                                <td>{{$apartment->monthlyRent}}</td>
                                <td>
                                    @if($apartment->getCurrentTenant())
                                        {{$apartment->getCurrentTenant()->lastName}} {{$apartment->getCurrentTenant()->firstName}}
                                    @endif
                                </td>
                                <td>
                                    @if($apartment->getCurrentTenant() && $apartment->getCurrentTenant()->getUnpaidRents() == 0)
                                        Oui
                                    @else
                                        Non
                                    @endif
                                </td>
                                <td><a href="{{url('/apartments/'.$apartment->id)}}" title="Voir les détails de l'appartment"><i class="fa fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <a href="#" data-toggle="modal" data-target="#updateBuildingModal" class="btn btn-primary">Modifier la propriété</a>
                    <a href="#" data-toggle="modal" data-target="#deleteBuildingModal" class="btn btn-danger">Supprimer la propriété</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateBuildingModal" tabindex="-1" role="dialog" aria-labelledby="updateBuildingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateBuildingModalLabel">Modifier la propriété</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('buildings.update', [$building])}}" method="post">
                    {{csrf_field()}}

                    <div class="modal-body">
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
                                <input type="number" step="1" min="0" name="floorsNumber" id="floorsNumber" value="{{$building->floorsNumber}}" class="form-control{{$errors->has('floorsNumber') ? ' is-invalid' : ''}}">
                                @if ($errors->has('floorsNumber'))
                                    <small class="text-danger">
                                        <strong>{{ $errors->first('floorsNumber') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteBuildingModal" tabindex="-1" role="dialog" aria-labelledby="deleteBuildingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateBuildingModalLabel">Êtes-vous sûr de vouloir supprimer la propriété suivante?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('buildings.destroy', [$building])}}" method="post">
                    {{csrf_field()}}

                    <div class="modal-body">
                        <h6>Nom de la propriété: </h6> {{$building->buildingName}}
                        <h6>Localisation: </h6> {{$building->buildingLocation}}
                        <h6>Nombre d'étages: </h6> {{$building->floorsNumber}}
                        <h6>Nombre d'appartements: </h6> {{$building->apartments->count()}}
                        <h6>Nombre de locataires: </h6> {{$building->getTenantsNumber()}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Oui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection