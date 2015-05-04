@extends('layouts.default')

@section('content')
<div class="jumbotron">
	<h1>Welcome to SimpleNote!</h1>
	<p class="lead">Create simpler, more elegant notes with only the information you need in the simplest way possible.</p>
	<p><a class="btn btn-lg btn-success" href="{{ url('/auth/register') }}" role="button">Sign up today</a></p>
</div>

<div class="row marketing">
	<div class="col-lg-6">
		<h4>Notes</h4>
		<p>Create clean, simple and easy to read notes for any occasion. Whether for school, work or anything else!</p>

		<h4>Collections</h4>
		<p>Group your notes in collections so you can find them easier, as well as stay organized.</p>

		<h4>Sharing is Caring</h4>
		<p>You can make your notes or collections public so other people can find &amp; use them.</p>
	</div>

	<div class="col-lg-6">
		<h4>Responsive</h4>
		<p>You can create notes from your desktop or on the go with your smartphone or tablet!</p>

		<h4>Easy to Use</h4>
		<p>We've tried to make the note taking process as simple and easy as possible.</p>

		<h4>Fast</h4>
		<p>Our service strives to be as fast as possible for your note taking needs.</p>
	</div>
</div>
@endsection