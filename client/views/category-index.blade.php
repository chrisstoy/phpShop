@extends('master')

@section('body')

    <div class="container category index">

        <div class="panel panel-info">
            <div class="panel-heading">
            <h1>Items with category: <strong class="text-primary">{{$category}}</strong></h1>
            </div>
            <div class="panel-body">
                @foreach ( $products as $product )
                    <div class="row">
                        <div class="col-md-1">
                            <img src='{{$product->image}}'>
                        </div>
                        <div class="col-md-8">
                            <span>{{$product->name}}</span>
                        </div>
                    </div>
                @endforeach
           </div>
        </div>
    </div>
@endsection