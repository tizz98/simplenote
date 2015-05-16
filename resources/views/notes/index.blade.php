@extends('layouts.default')

@section('title', 'Notes - ')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">
@endsection

@section('content')
	<h2>Notes <a href="{{ url('/notes/create') }}" class="no-dec"><i class="fa fa-fw fa-plus-square-o"></i></a></h2>
	@include('flash::message')
	@forelse ($notes as $note)
		<div class="note">
		@include('notes.partials._info')
		@include('notes.partials._stats')
		</div>
	@empty
		<h4>No notes at this time...</h4>
	@endforelse
	{!! $notes->render() !!}
@endsection

@section('js')
<script src="{{ asset('js/delete.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@endsection
