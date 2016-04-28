@include('product-list-item')

@extends('master')

@section('body')
    <div class="well">
        <div class="panel panel-default">
            <div class="panel-heading"><h2><em>&quot;{{$product->name}}&quot;</em> added to cart</h2></div>
            <div class="panel-body">
                @yield('product-list-item')
            </div>
            <div class="panel-footer text-center">
                <a href="/cart"><span class="btn btn-primary">View Cart</span></a>
            </div>
        </div>

    </div>

@endsection