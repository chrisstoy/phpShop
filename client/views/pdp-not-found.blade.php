@extends('master')

@section('body')

    <div class="panel panel-danger">
        <div class="panel-heading"><h3 class="panel-title">We are sorry. There was an error processing your request</h3></div>
        <div class="panel-body">
            <h3>The Product you requested does not exist.</h3>
            <p>
            The product you requested, <code>{{$productId}}</code>, does not exist.
            </p>
       </div>
       <div class="panel-footer">Press <a href="/">here</a> to return to main page</div>
    </div>
    </div>

@endsection