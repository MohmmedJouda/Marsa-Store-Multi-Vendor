@extends('layout')
@section('content')
    <h1>{{ Auth::user()->role }}</h1>
@endsection
