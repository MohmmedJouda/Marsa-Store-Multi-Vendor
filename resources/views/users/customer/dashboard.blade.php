@extends('layout')
@section('content')
    <div class="container" style="margin-top: -40px;">
    <h1>{{Auth::user()->role}}</h1>
    </div>
@endsection
