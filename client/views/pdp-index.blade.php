@extends('master')

@section('body')
    <div class="container pdp index">
    <div class="well well-lg">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <img src='{{$product->image}}'>
            </div>
            <div class="col-sm-6 col-md-6">
                <h3>{{$product->name}}</h3>
                <p><em>{{$product->blurb}}</em></p>
                <hr>
                <p>{{$product->description}}</p>
            </div>
        </div>
    </div>
    </div>
@endsection