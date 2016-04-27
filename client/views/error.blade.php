@extends('master')

@section('body')

    <div class="container container-fluid">

        <div class="panel panel-danger">
            <div class="panel-heading"><h3 class="panel-title">We are sorry. There was an error processing your request</h3></div>
            <div class="panel-body">
                <h3>It appears you have tried to access a page that does not exist.</h3>
                <p>
                The page you requested, <code>{{$page}}</code>, does not exist.
                </p>
           </div>
           <div class="panel-footer">Press <a href="/">here</a> to return to main page</div>
        </div>

    </div>
@endsection