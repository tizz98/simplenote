@extends('layouts.default')

@section('title', 'Notes - ')

@section('content')
<h2>Notes</h2>
@forelse ($notes as $note)
<div class="note">
@include('notes.partials._info')
{!! $note->shortText !!}
@if (strlen($note->shortText) < strlen($note->body_text))
 | <a href="{{ route('notes.show', $note->id) }}" class="link">more &rarr;</a>
 @endif
</div>
@empty
<h4>No notes at this time...</h4>
@endforelse
@endsection