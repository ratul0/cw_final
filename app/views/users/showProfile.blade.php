@extends('layouts.default')

@section('content')
    @include('includes.alert')

    <fieldset>

        <div class="form-group">
        	<b>Full Name:</b>  {{$user->full_name}}
        </div>

        <div class="form-group">
        	<b>Email:</b>  {{$user->email}}
        </div>

        <div class="form-group">
        	<b>Mobile:</b>  {{$user->mobile}}
        </div>

        <div class="form-group">
        	<b>Last Updated at:</b>  {{$user->updated_at->diffForHumans()}}
        </div>

    </fieldset>

    <a class="btn btn-default" href="{{route('user.profile.update')}}">Profile Update</a>

@stop