@extends('layouts.buildingsLayout')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Mes propriétés</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{url('/home')}}">Accueil</a></li>
                        <li class="active">Mes propriétés</li>
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
            <div class="row addSomething">
                <div class="col-md-12">
                    <a href="{{url('/buildings/create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i>Ajouter une propriété</a>
                </div>
            </div>
            @foreach($buildings->chunk(4) as $buildingsChunk)
                <div class="row">
                    @foreach($buildingsChunk as $building)
                        <div class="col-md-3">
                            <div class="card">
                                <img src="{{asset('images/photo_immeuble.jpg')}}" alt="" class="img-fluid" style="height: 20%">
                                <div class="card-body">
                                    <h4 class="buildingCardTitle">{{$building->buildingName}}</h4>
                                    <p class="card-text">
                                        <span><span class="ti-location-pin"></span> {{$building->buildingLocation}}</span><br>
                                        <i class="fa fa-sort-numeric-asc"></i> <span>{{$building->floorsNumber}} étages</span><br>
                                        <a href="{{route('buildings.show', [$building])}}" class="btn btn-primary">Détails</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection