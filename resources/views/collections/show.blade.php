@extends('layouts.default')

@section('title'){{$collection->name}} Collection - @endsection

@section('content')
@include('collections.partials._info')
<hr>
@endsection