@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ajouter une propriété</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('buildings.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('buildingName') ? ' has-error' : '' }}">
                                <label for="buildingName" class="col-md-4 control-label">Nom de la propriété</label>

                                <div class="col-md-6">
                                    <input id="buildingName" class="form-control" name="buildingName" value="{{ old('buildingName') }}" autofocus>

                                    @if ($errors->has('buildingName'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('buildingName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('buildingLocation') ? ' has-error' : '' }}">
                                <label for="buildingLocation" class="col-md-4 control-label">buildingLocation</label>

                                <div class="col-md-6">
                                    <input id="buildingLocation" type="text" class="form-control" name="buildingLocation" required>

                                    @if ($errors->has('buildingLocation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('buildingLocation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('floorsNumber') ? ' has-error' : '' }}">
                                <label for="floorsNumber" class="col-md-4 control-label">floorsNumber</label>

                                <div class="col-md-6">
                                    <input id="floorsNumber" type="text" class="form-control" name="floorsNumber" required>

                                    @if ($errors->has('floorsNumber'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('floorsNumber') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
