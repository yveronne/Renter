@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 hamburgerDiv">
        <a href="#" class="actual">Accueil</a>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 contentPart">
        <h4 class="titleHome">Les loyers récents</h4>
        <table class="table">
            <thead>
            <tr>
                <th>Payé le </th>
                <th>Nom du locataire</th>
                <th>Propriété</th>
                <th>Appartement</th>
                <th>Montant</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>24/02/2018</td>
                <td>ATANGANA Loïc</td>
                <td>La casa Jialla</td>
                <td>2</td>
                <td>70000</td>
            </tr>
            <tr>
                <td>24/02/2018</td>
                <td>KAMI Vernes</td>
                <td>La casa Bianca</td>
                <td>1</td>
                <td>70000</td>
            </tr>
            <tr>
                <td>24/02/2018</td>
                <td>THEUMI Rubenne</td>
                <td>La casa Jialla</td>
                <td>3</td>
                <td>90000</td>
            </tr>
            </tbody>
        </table>
        <div class="buttonHome">
            <button type="button" class="btn btn-mine homeButton">Voir les autres loyers</button>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12 contentPart">
        <h4 class="titleHome">Mes propriétés</h4>
        <div class="row">
            <div class="col-md-3 card">

                <!--Card image-->
                <img class="img-fluid" src="{{asset('images/photo_immeuble.jpg')}}" alt="Image d'appartement">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="buildingName">La casa Jialla</h4>
                    <!--Text-->
                    <h5>Ngousso, Carrefour hôtel le Paradis</h5>
                    <h6>2 étages</h6>
                    <a href="#" class="btn btn-mine">Détails</a>
                </div>

            </div>
            <div class="col-md-1"></div>

            <div class="col-md-3 card">
                <!--Card image-->
                <img class="img-fluid" src="{{asset('images/photo_immeuble.jpg')}}" alt="Image d'appartement">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="buildingName">La casa Jialla</h4>
                    <!--Text-->
                    <h5>Ngousso, Carrefour hôtel le Paradis</h5>
                    <h6>2 étages</h6>
                    <a href="#" class="btn btn-mine">Détails</a>
                </div>
            </div>
            <div class="col-md-1"></div>

            <div class="col-md-3 card">
                <!--Card image-->
                <img class="img-fluid" src="{{asset('images/photo_immeuble.jpg')}}" alt="Image d'appartement">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="buildingName">La casa Jialla</h4>
                    <!--Text-->
                    <h5>Ngousso, Carrefour hôtel le Paradis</h5>
                    <h6>2 étages</h6>
                    <a href="#" class="btn btn-mine">Détails</a>
                </div>
            </div>
        </div>

        <div class="buttonHome">
            <button type="button" class="btn btn-mine">Toutes mes propriétés</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 contentPart">
        <h4 class="titleHome">Mes locataires</h4>
        <div class="row">
            <div class="col-md-3 tenantCard">
                <div class="tenantPhoto">

                </div>
                <div class="tenantInfo">
                    <h3>Djintja Eulogène Aimée</h3>
                    <h6>Appartement 3</h6>
                    <h6>La casa Jialla</h6>
                </div>
                <button type="button" class="btn btn-mine">Détails</button>

            </div>
            <div class="col-md-1"></div>

            <div class="col-md-3 tenantCard">
                <div class="tenantPhoto">

                </div>
                <div class="tenantInfo">
                    <h3>Djintja Eulogène Aimée</h3>
                    <h6>Appartement 3</h6>
                    <h6>La casa Jialla</h6>
                </div>
                <button type="button" class="btn btn-mine">Détails</button>

            </div>
            <div class="col-md-1"></div>

            <div class="col-md-3 tenantCard">
                <div class="tenantPhoto">

                </div>
                <div class="tenantInfo">
                    <h3>Djintja Eulogène Aimée</h3>
                    <h6>Appartement 3</h6>
                    <h6>La casa Jialla</h6>
                </div>
                <button type="button" class="btn btn-mine">Détails</button>

            </div>
        </div>
        <div class="buttonHome">
            <button type="button" class="btn btn-mine">Tous mes locataires</button>
        </div>
    </div>
</div>
@endsection