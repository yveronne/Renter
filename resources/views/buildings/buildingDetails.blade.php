@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 hamburgerDiv">
            <a href="{{url('/home')}}">Accueil</a> > <a href="{{url('/buildings')}}">Mes propriétés</a>
            > <a href="{{route('buildings.show', [$building])}}" class="actual">{{$building->buildingName}}</a>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 contentPart">
            <h4 class="titleHome">DETAILS DE LA PROPRIETE</h4>

            <i class="fas fa-undo-alt"></i><a href="{{url('/buildings')}}">Retour à la liste des propriétés</a>
            <i class="fas fa-edit"></i><a href="#">Modifier la propriété</a>
            <i class="fas fa-trash-alt"></i><a href="#" data-toggle="modal" data-target="#centralModalDanger">Supprimer la propriété</a>
            <br>

            NOM : {{$building->buildingName}}
            <br>
            LOCALISATION: {{$building->buildingLocation}}
            <br>
            NOMBRE D'ETAGES: {{$building->floorsNumber}}
            <br>
            APPARTEMENTS: <i class="fas fa-plus"></i><a href="#">Ajouter un appartement</a>
            <br>
            <a href="#" class="btn btn-mine">Modifier la propriété</a>

            <!-- Central Modal Medium Danger -->
            <div class="modal fade" id="centralModalDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notify modal-danger" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <p class="heading lead">Êtes-vous sûr de vouloir supprimer ceci?</p>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>

                        <!--Body-->
                        <div class="modal-body">
                            <div class="text-center">
                                NOM : {{$building->buildingName}}
                                <br>
                                LOCALISATION: {{$building->buildingLocation}}
                                <br>
                                NOMBRE D'ETAGES: {{$building->floorsNumber}}
                            </div>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                            <form action="{{route('buildings.destroy', [$building])}}" method="POST">
                                <input type="hidden" name="_method" value="delete" />
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>

                            <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">Annuler</a>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
            <!-- Central Modal Medium Danger-->

        </div>
    </div>
@endsection