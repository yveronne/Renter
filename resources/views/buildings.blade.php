@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12"></div>
                @foreach($buildings as $building)
                    <span>{{$building->buildingName}}</span>
                @endforeach
        </div>
    </div>
@endsection