@extends('layouts.default')

@section('title'){{$collection->name}} Collection - @endsection

@section('content')
<h2>{{ $collection->name }}</h2>
@endsection