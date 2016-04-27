@extends('master')

@section('body')

    <div class="error">We are sorry. There was an error processing your request</div>

    <div class="panel">
        {{$exception}}
    </div>

@endsection