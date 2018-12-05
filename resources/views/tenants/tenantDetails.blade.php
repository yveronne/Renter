@extends('layouts.tenantsLayout')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Détails du locataire</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{url('/home')}}">Accueil</a></li>
                        <li><a href="{{url('/tenants')}}">Mes locataires</a></li>
                        <li class="active">Détails du locataire</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    @include('partials.success')
                    <h4 class="titleCentered">Informations sur le locataire</h4>
                    <div style="text-align: right">
                        <a href="#" data-toggle="modal" data-target="#addPaymentModal" class="btn btn-outline-primary">Enregistrer un paiement</a>
                    </div>
                    <br>
                </div>
                <div class="col-md-6">
                    <span class="spanTitle">Civilité:</span> <span class="spanValue">{{$tenant->civility}}</span>
                    <br>
                    <span class="spanTitle">Noms:</span> <span class="spanValue">{{$tenant->lastName}} {{$tenant->firstName}}</span>
                    <br>
                    <span class="spanTitle">Numéro de CNI:</span> <span class="spanValue">{{$tenant->cniNumber}}</span>
                    <br>
                    <span class="spanTitle">Numéro de téléphone:</span> <span class="spanValue">{{$tenant->phoneNumber}}</span>
                    <br>
                    <span class="spanTitle">Adresse mail:</span> <span class="spanValue">{{$tenant->email}}</span>
                    <br>
                    <span class="spanTitle">Profession:</span> <span class="spanValue">{{$tenant->profession}}</span>
                    <br>
                    <span class="spanTitle">Statut matrimonial:</span> <span class="spanValue">{{$tenant->maritalStatus}}</span>
                    <br>
                    <span class="spanTitle">Date d'occupation:</span> <span class="spanValue">{{(new \DateTime($tenant->tenureDate))->format('d-m-Y')}}</span>
                    <br>
                    <span class="spanTitle">Caution versée:</span> <span class="spanValue">{{$tenant->caution}} F CFA</span>
                    <br>
                </div>
                <div class="col-md-6">
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-frown-o"></i>
                            </div>
                            <div class="h4 mb-0">
                                <span class="count">{{$tenant->getUnpaidRents()}}</span>
                            </div>
                            <small class="text-muted text-uppercase font-weight-bold">Loyers impayés</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: {{$tenant->getUnpaidRents()*100 / $tenant->rents->count()}}%; height: 5px;"></div>
                        </div>
                    </div>
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-meh-o"></i>
                            </div>
                            <div class="h4 mb-0">
                                <span class="count">{{$tenant->getUncompletedRents()}}</span>
                            </div>
                            <small class="text-muted text-uppercase font-weight-bold">Loyers incomplets</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: {{$tenant->getUncompletedRents()*100 / $tenant->rents->count()}}%; height: 5px;"></div>
                        </div>
                    </div>
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-smile-o"></i>
                            </div>
                            <div class="h4 mb-0">
                                <span class="count">{{$tenant->getPaidRents()}}</span>
                            </div>
                            <small class="text-muted text-uppercase font-weight-bold">Loyers payés</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: {{$tenant->getPaidRents()*100 / $tenant->rents->count()}}%; height: 5px;"></div>
                        </div>
                    </div>
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="h4 mb-0">
                                <span class="count">{{$tenant->rents->count()}}</span>
                            </div>
                            <small class="text-muted text-uppercase font-weight-bold">Loyers</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 100%; height: 5px;"></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-12">
                    <h4 class="titleCentered">Les paiements effectués</h4>
                    <br>
                    <table class="table table-striped table-bordered bootstrap-data-table">
                        <thead>
                        <tr>
                            <th>Date du paiement</th>
                            <th>Montant perçu (en F CFA)</th>
                            <th>Loyer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tenant->getPayments() as $payment)
                            <tr>
                                <td>{{(new \DateTime($payment->paymentDate))->format('d-m-Y')}}</td>
                                <td>{{$payment->amount}}</td>
                                <td>{{ucfirst((new \Jenssegers\Date\Date($payment->rent->rentMonth))->format('F Y'))}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="col-md-12">
                    <h4 class="titleCentered">Les loyers</h4>
                    <br>
                    <table class="table table-striped table-bordered bootstrap-data-table">
                        <thead>
                        <tr>
                            <th>Mois du loyer</th>
                            <th>Réglé entièrement ?</th>
                            <th>Nombre de paiements</th>
                            <th>Date (Montant) des paiements</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tenant->rents->sortByDesc('id') as $rent)
                            <tr>
                                <td>{{ucfirst((new \Jenssegers\Date\Date($rent->rentMonth))->format('F Y'))}}</td>
                                <td>
                                    @if($rent->settled)
                                        Oui
                                    @else
                                        Non
                                    @endif
                                </td>
                                <td>{{$rent->payments->count()}}</td>
                                <td>
                                    @foreach($rent->payments as $payment)
                                        {{(new \Jenssegers\Date\Date($payment->paymentDate))->format('d F Y')}} ( {{$payment->amount}} F CFA) ;
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addPaymentModal" tabindex="-1" role="dialog" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPaymentModalLabel">Enregistrer un paiement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('tenants.addPayment', [$tenant])}}" method="post">
                    {{csrf_field()}}

                    <div class="modal-body">
                        <span class="spanTitle">Propriété: </span><span class="spanValue">{{$tenant->apartment->building->buildingName}}, {{$tenant->apartment->building->buildingLocation}}</span><br>
                        <span class="spanTitle">Appartement: </span><span class="spanValue">{{$tenant->apartment->apartmentNumber}}</span><br>
                        <span class="spanTitle">Locataire: </span><span class="spanValue">{{$tenant->lastName}} {{$tenant->firstName}}</span><br><br>
                        <div class="row form-group{{$errors->has('amount') ? ' has-warning' : ''}}">
                            <div class="col-md-5">
                                <label for="amount" class="form-control-label">Montant du paiement</label>
                            </div>
                            <div class="col-md-7">
                                <input type="number" step="500" min="0" name="amount" id="amount" value="{{old('amount')}}" class="form-control{{$errors->has('amount') ? ' is-invalid' : ''}}">
                                @if ($errors->has('amount'))
                                    <small class="text-danger">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group{{$errors->has('date') ? ' has-warning' : ''}}">
                            <div class="col-md-5">
                                <label for="date" class="form-control-label">Date du paiement</label>
                            </div>
                            <div class="col-md-7">
                                <input type="date" name="date" id="date" value="{{old('date')}}" class="form-control{{$errors->has('date') ? ' is-invalid' : ''}}">
                                @if ($errors->has('date'))
                                    <small class="text-danger">
                                        <strong>{{ $errors->first('date') }}</strong>
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


@endsection