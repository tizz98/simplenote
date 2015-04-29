@extends('layouts.default')

@section('content')


<h1>Sign In</h1>

@include('layouts.partials._errors')

{!! Form::open(['route' => 'login_path']) !!}

<!--- Username Field --->
<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<!--- Password Field --->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<!--- Sign In Field --->
<div class="form-group">
    {!! Form::submit('Sign In', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

@stop