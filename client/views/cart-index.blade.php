@extends('master')

@section('body')

    <div class="well">

        <div class="panel panel-info">

            <div class="panel-heading">
                <h3>Shopping Cart</h3>
            </div>

            <div class="panel-body">
                <ol class="list-group">
                @foreach ( $lineItems as $lineItem )
                    <li class="list-group-item">
                        <div class="row">
                            <a href="/pdp?productId={{$lineItem->product->id}}">
                            <div class="col-sm-1">
                                <img src='{{$lineItem->product->image}}' class="center-block product-image">
                            </div>
                            <div class="col-sm-7">
                                <p class="list-group-item-text">{{$lineItem->product->name}}</p>
                            </div>
                            </a>
                            <div class="col-sm-3">
                                <span class="text text-default pull-right"><strong>Price: <span class="text text-danger">{{money_format('$%i', $lineItem->cartItem->price)}}</span></strong></span>
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-warning"><span class="glyphicon glyphicon-remove"</button>
                            </div>
                        </div>
                    </li>
                @endforeach
                </ol>
                <div class="pull-right">
                    <h5 lass="text text-default">Number of Items: <span class="text text-warning">{{$cart->numberOfItemsInCart()}}</span></h5>
                    <h3 lass="text text-default"><strong>Total: <span class="text text-danger">{{money_format('$%i', $cart->cartValue())}}</span></strong></h3>
                    <button class="btn btn-primary">Checkout</button>
                </div>
            </div>

        </div>

    </div>

@endsection