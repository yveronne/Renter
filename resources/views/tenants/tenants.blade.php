@extends('layouts.tenantsLayout')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Mes locataires</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{url('/home')}}">Accueil</a></li>
                        <li class="active">Mes locataires</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            @foreach($user->buildings as $building)
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{$building->buildingName}} , {{$building->buildingLocation}}</h4>
                    </div>
                </div>
                <br>
                <div>
                    @foreach($building->apartments->chunk(4) as $apartments)
                        <div class="row">
                            @foreach($apartments as $apartment)
                                @if($apartment->getCurrentTenant())
                                    <div class="col-md-4">
                                    <aside class="profile-nav alt">
                                        <section class="card">
                                            <div class="card-header user-header alt bg-dark">
                                                <div class="media">
                                                    <a href="#">
                                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{asset('images/admin.jpg')}}">
                                                    </a>
                                                    <div class="media-body">
                                                        <h2 class="text-light display-6">{{$apartment->getCurrentTenant()->lastName}} {{$apartment->getCurrentTenant()->firstName}}</h2>
                                                        <h3 style="color: slategray">N°{{$apartment->apartmentNumber}}</h3>
                                                    </div>
                                                </div>
                                            </div>


                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <a href="#"> <i class="fa fa-frown-o"></i> Loyers impayés <span class="badge badge-danger pull-right">{{$apartment->getCurrentTenant()->getUnpaidRents()}}</span></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="#"> <i class="fa fa-meh-o"></i> Loyers incomplets <span class="badge badge-warning pull-right">{{$apartment->getCurrentTenant()->getUncompletedRents()}}</span></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="#"> <i class="fa fa-smile-o"></i> Loyers payés <span class="badge badge-success pull-right">{{$apartment->getCurrentTenant()->getPaidRents()}}</span></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{url('/tenants/details/'.$apartment->getCurrentTenant()->id)}}" class="btn btn-outline-primary">Détails du locataire</a>
                                                </li>
                                            </ul>

                                        </section>
                                    </aside>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection