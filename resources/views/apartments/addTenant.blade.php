@extends('layouts.apartmentsLayout')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-6">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Enregistrer le locataire</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{url('/home')}}">Accueil</a></li>
                        <li><a href="{{url('/apartments')}}">Mes appartements</a></li>
                        <li><a href="{{url('/apartments/'.$apartment->id)}}">Détails</a></li>
                        <li class="active">Enregistrer le locataire</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <form action="{{url('/apartments/'.$apartment->id.'/addtenant')}}" method="POST" class="col-md-6 col-md-offset-3">
                {{csrf_field()}}

                <div class="row form-group">
                    <div class="col-md-5">
                        <h6>Propriété</h6>
                    </div>
                    <div class="col-md-7">
                        <strong>{{$apartment->building->buildingName}} , {{$apartment->building->buildingLocation}}</strong>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-5">
                        <h6>Numéro de l'appartement</h6>
                    </div>
                    <div class="col-md-7">
                        <strong>{{$apartment->apartmentNumber}}</strong>
                    </div>
                </div>
                <div class="row form-group{{$errors->has('civility') ? ' has-warning' : ''}}">
                    <div class="col col-md-5"><label class=" form-control-label">Civilité</label></div>
                    <div class="col col-md-7">
                        <div class="form-check">
                            <div class="radio">
                                <label for="mister" class="form-check-label ">
                                    <input type="radio" id="mister" name="mister" value="Monsieur" class="form-check-input">Monsieur
                                </label>
                            </div>
                            <div class="miss">
                                <label for="miss" class="form-check-label ">
                                    <input type="radio" id="miss" name="miss" value="Madame" class="form-check-input">Madame
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group{{$errors->has('lastName') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="lastName" class="form-control-label">Noms</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="lastName" id="lastName" value="{{old('lastName')}}" class="form-control{{$errors->has('lastName') ? ' is-invalid' : ''}}">
                        @if ($errors->has('lastName'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('lastName') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('firstName') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="firstName" class="form-control-label">Prénoms</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="firstName" id="firstName" value="{{old('firstName')}}" class="form-control{{$errors->has('firstName') ? ' is-invalid' : ''}}">
                        @if ($errors->has('firstName'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('firstName') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('email') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="email" class="form-control-label">Adresse mail</label>
                    </div>
                    <div class="col-md-7">
                        <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control{{$errors->has('email') ? ' is-invalid' : ''}}">
                        @if ($errors->has('email'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('cniNumber') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="cniNumber" class="form-control-label">Numéro de carte nationale d'identité</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="cniNumber" id="cniNumber" value="{{old('cniNumber')}}" class="form-control{{$errors->has('cniNumber') ? ' is-invalid' : ''}}">
                        @if ($errors->has('cniNumber'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('cniNumber') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('profession') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="profession" class="form-control-label">Profession</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="profession" id="profession" value="{{old('profession')}}" class="form-control{{$errors->has('profession') ? ' is-invalid' : ''}}">
                        @if ($errors->has('profession'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('profession') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('maritalStatus') ? ' has-warning' : ''}}">
                    <div class="col col-md-5"><label class=" form-control-label">Statut matrimonial</label></div>
                    <div class="col col-md-7">
                        <div class="form-check">
                            <div class="radio">
                                <label for="single" class="form-check-label ">
                                    <input type="radio" id="single" name="single" value="Célibataire" class="form-check-input">Célibataire
                                </label>
                            </div>
                            <div class="Marié(e)">
                                <label for="maried" class="form-check-label ">
                                    <input type="radio" id="maried" name="maried" value="Marié(e)" class="form-check-input">Marié(e)
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group{{$errors->has('phoneNumber') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="phoneNumber" class="form-control-label">Numéro de téléphone</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="phoneNumber" id="phoneNumber" value="{{old('phoneNumber')}}" class="form-control{{$errors->has('phoneNumber') ? ' is-invalid' : ''}}">
                        @if ($errors->has('phoneNumber'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('phoneNumber') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('tenureDate') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="tenureDate" class="form-control-label">Date de début d'occupation</label>
                    </div>
                    <div class="col-md-7">
                        <input type="date" name="tenureDate" id="tenureDate" value="{{old('tenureDate')}}" class="form-control{{$errors->has('tenureDate') ? ' is-invalid' : ''}}">
                        @if ($errors->has('tenureDate'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('tenureDate') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('caution') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="caution" class="form-control-label">Caution (en F CFA)</label>
                    </div>
                    <div class="col-md-7">
                        <input type="number" name="caution" id="caution" value="{{old('caution')}}" class="form-control{{$errors->has('caution') ? ' is-invalid' : ''}}">
                        @if ($errors->has('caution'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('caution') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{$errors->has('advance') ? ' has-warning' : ''}}">
                    <div class="col-md-5">
                        <label for="advance" class="form-control-label">Nombre de mois d'avance de loyer</label>
                    </div>
                    <div class="col-md-7">
                        <input type="number" step="1" min="0" name="advance" id="advance" value="{{old('advance')}}" class="form-control{{$errors->has('advance') ? ' is-invalid' : ''}}">
                        @if ($errors->has('advance'))
                            <small class="text-danger">
                                <strong>{{ $errors->first('advance') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection