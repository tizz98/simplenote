@extends('layouts.default')

@section('title'){{ $note->title }} - Note - @endsection

@section('content')
@include('notes.partials._info')
<br>
<div id="note-text">
{!! $note->body_text !!}
</div>
@endsection