@extends('layouts.default')

@section('title'){{$collection->name}} Collection - @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">
@endsection

@section('content')
@include('flash::message')
@include('collections.partials._info')
<hr>
@foreach($collection->notes as $note)
<div class="note">
	@include('notes.partials._info')
	@include('notes.partials._stats')
</div>
@endforeach
@endsection

@section('js')
<script src="{{ asset('js/delete.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@endsection
