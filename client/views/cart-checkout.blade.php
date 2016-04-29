@include('product-list-item')

@extends('master')

@section('body')

    <div class="well">
        <div class="panel panel-default">
            <div class="panel-heading"><h2>Order Summary</div>
            <div class="panel-body">
                @foreach ( $lineItems as $lineItem )
                    <div class="thumbnail">
                        <img width="32px" src='{{$lineItem->product->image}}' class="center-block product-image">
                        <p class="list-group-item-text">{{$lineItem->product->name}}</p>
                        <span class="text text-default pull-right"><strong>Price: <span class="text text-danger">{{money_format('$%i', $lineItem->cartItem->price)}}</span></strong></span>
                    </div>
                @endforeach
            </div>
            <div class="panel-footer text-center">
                <a href="/cart"><span class="btn btn-primary">Place Order</span></a>
            </div>
        </div>

    </div>

@endsection