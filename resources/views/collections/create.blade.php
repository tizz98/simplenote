@extends('layouts.default')

@section('title', 'Create new Collection - ')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/kube-btns.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-colorpicker.min.css') }}">
@endsection

@section('content')
<h2>Create new Collection</h2>
<br>
@include('flash::message')
@include('layouts.partials._errors')
{!! Form::open(['route' => 'collections.store']) !!}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter collection name">
    </div>
    <label for="color">Color</label>
    <div class="input-group" id="color-picker">
        <input name="color" type="text" value="" class="form-control">
        <span class="input-group-addon"><i></i></span>
    </div>
    <br>
    <p id='buttons' class='btn-group'>
        <button class="btn" value="1" type="button"><i class="fa fa-fw fa-users"></i> Public</button>
        <button class="btn" value="0" type="button"><i class="fa fa-fw fa-user-secret"></i> Private</button>
    </p>
    <input type="hidden" id="is-public-target" value="0" name="is_public">
	<br>
	<button class="btn-outline" type="submit"><i class="fa fa-fw fa-floppy-o"></i> Save</button>
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('js/kube.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-colorpicker.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $('#buttons').buttons({
            target: '#is-public-target'
        });

        $('#color-picker input').val(get_random_color());

        $('#color-picker').colorpicker();
    });

    function get_random_color() {
        var colors = ['#A74EFF', '#FF70FE', '#337ab7', '#5cb85c', '#5bc0de', '#f0ad4e', '#d9534f'];

        return colors[Math.floor(Math.random() * colors.length)];
    }
</script>
@endsection