@extends('layouts.default')

@section('title'){{ $note->title }} - Note - @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">
@endsection

@section('content')
@include('notes.partials._info')
<br>
<div id="note-text">
{!! $note->body_text !!}
</div>
@endsection

@section('js')
<script src="{{ asset('js/delete.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@endsection
