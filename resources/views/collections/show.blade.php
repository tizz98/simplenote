@extends('layouts.default')

@section('title'){{$collection->name}} Collection - @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">
@endsection

@section('content')
@include('flash::message')
@include('collections.partials._info')
<hr>
@foreach($notes as $note)
	@if ($note->is_public || $note->user == Auth::User())
	<div class="note">
		@include('notes.partials._info')
		@include('notes.partials._stats')
	</div>
	@endif
@endforeach
{!! $notes->render() !!}
@endsection

@section('js')
<script src="{{ asset('js/delete.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@endsection
