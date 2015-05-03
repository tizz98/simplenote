@extends('layouts.default')

@section('title', 'Collections - ')

@section('content')
<h2>Your Collections <a href="{{ url('/collections/create') }}" class="no-dec"><i class="fa fa-fw fa-plus-square-o"></i></a></h2>
<br>
@forelse($collections as $collection)
<div class="collection" style="background-color:rgba({{$collection->getRGB()}},0.15)">
	<h3><a href="{{ route('collections.show', $collection->id) }}" class="link">{{$collection->name}}</a> <a href="{{ route('collections.edit', $collection->id) }}" class="no-dec"><i class="fa fa-fw fa-pencil"></i></a><a href="{{ route('collections.destroy', $collection->id) }}" class="no-dec"><i class="fa fa-fw fa-trash-o"></i></a></h3>
	<ul class="list-unstyled">
		<li>
			@if ($collection->is_public)
				<i class="fa fa-fw fa-users"></i> Public
			@else
				<i class="fa fa-fw fa-user-secret"></i> Private
			@endif
		</li>
		<li><i class="fa fa-fw fa-calendar-o"></i> created {{ date('d F Y', strtotime($collection->created_at)) }}</li>
	</ul>
</div>
@empty
<h3>No collections at this time...</h3>
@endforelse
@endsection