@extends('layouts.default')

@section('title')Settings - @endsection

@section('content')
<h2>Settings</h2>
<br>
@include('flash::message')
@include('layouts.partials._errors')
<div class="form-horizontal form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
        <p class="form-control-static">{{ Auth::User()->username }}</p>
    </div>
</div>
<br>
{!! Form::open(['class' => 'form-horizontal', 'route' => 'changeEmail']) !!}
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="text" name="email" value="{{ Auth::User()->email }}" class="form-control">
        </div>
    </div>
    <button class="btn-outline" type="submit"><i class="fa fa-fw fa-floppy-o"></i> Save</button>
{!! Form::close() !!}
<br>
<hr>
<br>
{!! Form::open(['class' => 'form-horizontal']) !!}
    <div class="form-group">
        <label for="current_password" class="col-sm-2 control-label">Current Password</label>
        <div class="col-sm-10">
            <input type="text" name="current_password" class="form-control" placeholder="Current password...">
        </div>
    </div>
    <div class="form-group">
        <label for="new_password" class="col-sm-2 control-label">New Password</label>
        <div class="col-sm-10">
            <input type="text" name="new_password" class="form-control" placeholder="New password...">
        </div>
    </div>
    <div class="form-group">
        <label for="new_password_confirm" class="col-sm-2 control-label">Confirm Password</label>
        <div class="col-sm-10">
            <input type="text" name="new_password_confirm" class="form-control" placeholder="Confirm password...">
        </div>
    </div>
    <button class="btn-outline-red" type="submit"><i class="fa fa-fw fa-key"></i> Change Password</button>
{!! Form::close() !!}
@endsection