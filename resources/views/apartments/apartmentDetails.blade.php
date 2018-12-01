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
        @include('partials.success')
        @include('partials.errors')
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="titleCentered">Informations sur l'appartement</h4>
                    <span class="spanTitle">Propriété:</span> <span class="spanValue">{{$apartment->building->buildingName}}, {{$apartment->building->buildingLocation}}</span>
                    <br>
                    <span class="spanTitle">Numéro de l'appartement:</span> <span class="spanValue">{{$apartment->apartmentNumber}}</span>
                    <br>
                    <span class="spanTitle">Loyer mensuel:</span> <span class="spanValue">{{$apartment->monthlyRent}}</span>
                    <br>
                    <span class="spanTitle">Nombre de salon(s):</span> <span class="spanValue">{{$apartment->livingRoomsNumber}}</span>
                    <br>
                    <span class="spanTitle">Nombre de cuisine(s):</span> <span class="spanValue">{{$apartment->kitchensNumber}}</span>
                    <br>
                    <span class="spanTitle">Nombre de chambre(s):</span> <span class="spanValue">{{$apartment->bedroomsNumber}}</span>
                    <br>
                    <span class="spanTitle">Nombre de salle(s) de bain:</span> <span class="spanValue">{{$apartment->bathroomsNumber}}</span>
                    <br>

                    <br>
                    <a href="#" data-toggle="modal" data-target="#updateApartmentModal" class="btn btn-primary">Modifier l'appartement</a>
                </div>
                <div class="col-md-6">
                    <h4 class="titleCentered">Informations sur le locataire actuel</h4>
                    <div style="text-align: center">
                        <img class="align-self-center rounded-circle mr-3" style="width:150px; height:150px;" alt="" src="{{asset('images/admin.jpg')}}">
                    </div>
                    @if($tenant)
                        <span class="spanTitle">Nom :</span> <span class="spanValue">{{$tenant->lastName}} {{$tenant->firstName}}</span>
                        <br>
                        <span class="spanTitle">Numéro de CNI:</span> <span class="spanValue">{{$tenant->cniNumber}}</span>
                        <br>
                        <span class="spanTitle">Numéro de téléphone :</span> <span class="spanValue">{{$tenant->phoneNumber}}</span>
                        <br>
                        <span class="spanTitle">Date d'occupation:</span> <span class="spanValue">{{(new \DateTime($tenant->tenureDate))->format('d-m-Y')}}</span>
                        <br>
                        <a href="#" data-toggle="modal" data-target="#removeCurrentTenantModal" class="btn btn-danger">Retirer le locataire</a>
                    @else   {{-- todo add a button to add a tenant--}}
                    <a href="{{url('/apartments/'.$apartment->id.'/addtenant')}}" class="btn btn-primary">Ajouter un locataire</a>
                    @endif
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="titleCentered">Loyers perçus</h4>
                    <table class="table table-striped table-bordered" id="bootstrap-data-table">
                        <thead>
                            <tr>
                                <th>Date du loyer</th>
                                <th>Nom du locataire</th>
                                <th>Montant perçu (en F CFA)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($apartment->rents as $rent)
                                <tr>
                                    <td>{{(new \DateTime($rent->rentMonth))->format('m-Y')}}</td>
                                    <td>{{$rent->tenant->lastName}}</td>
                                    <td>{{$rent->getTotalAmountOfPayments()}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateApartmentModal" tabindex="-1" role="dialog" aria-labelledby="updateApartmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateBuildingModalLabel">Modifier l'appartement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('apartments.update',[$apartment])}}" method="post">
                    {{csrf_field()}}

                    <div class="modal-body">
                        @include('partials.errors')
                        <div class="row form-group{{$errors->has('apartmentNumber') ? ' has-warning' : ''}}">
                            <div class="col-md-5">
                                <label for="apartmentNumber" class="form-control-label">Numéro</label>
                            </div>
                            <div class="col-md-7">
                                <input type="number" step="1" min="0" name="apartmentNumber" id="apartmentNumber" value="{{$apartment->apartmentNumber}}" class="form-control{{$errors->has('apartmentNumber') ? ' is-invalid' : ''}}">
                                @if ($errors->has('apartmentNumber'))
                                    <small class="text-danger">
                                        <strong>{{ $errors->first('apartmentNumber') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group{{$errors->has('monthlyRent') ? ' has-warning' : ''}}">
                            <div class="col-md-5">
                                <label for="monthlyRent" class="form-control-label">Loyer mensuel <br>(en F CFA)</label>
                            </div>
                            <div class="col-md-7">
                                <input type="number" step="5000" min="0" name="monthlyRent" id="monthlyRent" value="{{$apartment->monthlyRent}}" class="form-control{{$errors->has('monthlyRent') ? ' is-invalid' : ''}}">
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
                                <input type="number" step="1" min="0" name="livingRoomsNumber" id="livingRoomsNumber" value="{{$apartment->livingRoomsNumber}}" class="form-control{{$errors->has('livingRoomsNumber') ? ' is-invalid' : ''}}">
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
                                <input type="number" step="1" min="0" name="kitchensNumber" id="kitchensNumber" value="{{$apartment->kitchensNumber}}" class="form-control{{$errors->has('kitchensNumber') ? ' is-invalid' : ''}}">
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
                                <input type="number" step="1" min="0" name="bedroomsNumber" id="bedroomsNumber" value="{{$apartment->bedroomsNumber}}" class="form-control{{$errors->has('bedroomsNumber') ? ' is-invalid' : ''}}">
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
                                <input type="number" step="1" min="0" name="bathroomsNumber" id="bathroomsNumber" value="{{$apartment->bathroomsNumber}}" class="form-control{{$errors->has('bathroomsNumber') ? ' is-invalid' : ''}}">
                                @if ($errors->has('bathroomsNumber'))
                                    <small class="text-danger">
                                        <strong>{{ $errors->first('bathroomsNumber') }}</strong>
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
    @if($apartment->getCurrentTenant())
        <div class="modal fade" id="removeCurrentTenantModal" tabindex="-1" role="dialog" aria-labelledby="removeCurrentTenantModal" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="removeCurrentTenantModalLabel">Êtes-vous sûr de vouloir retirer le locataire suivant de l'appartement?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('apartments.removeTenant', [$apartment])}}" method="post">
                        {{csrf_field()}}

                        <div class="modal-body">
                            <h6>Propriété: </h6> {{$apartment->building->buildingName}}, {{$apartment->building->buildingLocation}}
                            <h6>Numéro de l'appartement: </h6> {{$apartment->apartmentNumber}}
                            <h6>Nom du locataire: </h6> {{$tenant->lastName}} {{$tenant->firstName}}
                            <h6>Numéro de téléphone: </h6> {{$tenant->cniNumber}}
                            <h6>Loyers incomplets et impayés: </h6> {{$tenant->getUnpaidRents() + $tenant->getUncompletedRents()}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Oui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection