@extends('layouts.default')

@section('title', 'Collections - ')

@section('content')
<h2>Your Collections <a href="{{ url('/collections/create') }}" class="no-dec"><i class="fa fa-fw fa-plus-square-o"></i></a></h2>
<br>
@forelse($collections as $collection)
<div class="collection" style="background-color:rgba({{$collection->getRGB()}},0.15)">
	@include('collections.partials._info')
</div>
@empty
<h3>No collections at this time...</h3>
@endforelse
@endsection