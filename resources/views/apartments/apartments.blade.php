@extends('layouts.apartmentsLayout')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Mes appartements</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{url('/home')}}">Accueil</a></li>
                        <li class="active">Mes appartements</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="animated fadeIn">
            {{--<div class="row addSomething">
                <div class="col-md-12">
                    <a href="{{url('/buildings/create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i>Ajouter
                        un appartement</a>
                </div>
            </div>--}}

            @foreach(Auth::user()->buildings as $building)
                <div class="row">
                    <div class="col-md-12">
                        <h5>{{$building->buildingName}} , {{$building->buildingLocation}}</h5>
                        <br>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Numéro</th>
                                <th scope="col">Loyer mensuel (F CFA)</th>
                                <th scope="col">Locataire</th>
                                <th scope="col">En règle ?</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($building->apartments as $apartment)
                                <tr>
                                    <th scope="row">{{$apartment->apartmentNumber}}</th>
                                    <td>{{$apartment->monthlyRent}}</td>
                                    <td>
                                        @if(!is_null($apartment->tenant))
                                        {{$apartment->tenant->lastName}} {{$apartment->tenant->firstName}}
                                        @else
                                            <a href="{{url('/apartments/'.$apartment->id.'/addtenant')}}" class="btn btn-outline-primary">Enregistrer le locataire</a>
                                        @endif
                                    </td>
                                    <td></td>
                                    <td><a href="{{route('apartments.show', $apartment)}}" title="Voir les détails de l'appartment"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection