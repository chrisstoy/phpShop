@include('product-list-item')

@extends('master')

@section('body')

    <div class="well">
        <div class="panel panel-default">
            <div class="panel-heading text-center"><h2>Congratulations!</h2>
            <div class="panel-body">
                Your order has been placed.
            </div>
            <div class="panel-footer text-center">
                <a href="/main"><span class="btn btn-primary">Return to Products</span></a>
            </div>
        </div>

    </div>

@endsection