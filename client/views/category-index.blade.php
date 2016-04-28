@extends('master')

@section('body')

    <div class="container category index">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Items with category:
                    <div class="dropdown label">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                            {{$category}}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            @foreach( $categories as $cat)
                                <li><a href="/category?category={{$cat}}">{{$cat}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </h2>
            </div>
            <div class="panel-body">
                <div class="list-group">
                @foreach ( $products as $product )
                    <a href="/pdp?productId={{$product->id}}" class="list-group-item">
                        <img src='{{$product->image}}' class="product-image">
                        <p class="list-group-item-text">{{$product->name}}</p>
                    </a>
                @endforeach
                </div>
           </div>
        </div>
    </div>
@endsection