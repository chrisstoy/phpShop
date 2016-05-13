@extends('master')

@section('body')
    <div class="container pdp index">
    <div class="well well-lg">
        <div class="row">
            <div class="col-sm-6 col-md-6">
				<div class="product-image">
					<img class="center-block" src='{{$product->image}}'>
				</div>
                <hr>
                <h3 class="text text-default text-center"><strong>List Price: <span class="text text-danger">{{$listPrice}}</span></strong></h3>
            </div>
            <div class="col-sm-6 col-md-6">
				<div class="row">
					<h3>{{$product->name}}</h3>
					<p><em>{{$product->blurb}}</em></p>
					<hr>
					<p>{{$product->description}}</p>
					<hr>
				</div>
				<div class="row">
					<form action="/cart/add" method="post">
						<input type="hidden" name="productId" value="{{$product->id}}">
						<button type="submit" class="btn btn-primary">Add to Cart</button>
					</form>
				</div>
            </div>
        </div>
    </div>
    </div>
@endsection