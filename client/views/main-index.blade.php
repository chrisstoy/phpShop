@extends('master')

@section('body')

<div class="container-fluid main index">
	<div class="page-header">
    	<h1>Today's Random Products</h1>
	</div>
	<div class="panel">
		<div class="well well-lg">
			<div class="row">
			@foreach( $products as $product )
				<div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
                        <a href='/pdp?productId={{$product->id}}' title="Click for more details">
                            <img src='{{$product->image}}'>
                            <h4 class="text-center">{{$product->name}}</h4>
                        </a>
                        <p class="text-center">{{$product->blurb}}</p>
                    </div>
				</div>
			@endforeach
			</div>
		</div>
	</div>
</div>

@endsection


