@extends('master')

@section('body')

<div class="container-fluid">
	<!-- display today's random products -->
	<h2>Today's Random Products</h2>
	<div class="panel">
		<div class="well well-lg">
			<div class="row">
			@foreach( $products as $product )
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<a href='/pdp?productId={{$product->id}}'>
							<img src='{{$product->image}}'>
							<h3 class="text-center">{{$product->name}}</h3>
							<p class="text-center">{{$product->blurb}}</p>
						</a>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div>
</div>

@endsection


