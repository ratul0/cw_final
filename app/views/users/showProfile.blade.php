@extends('layouts.default')

@section('content')
    @include('includes.alert')

    <div class="row">{{$user->full_name}}</div>
    <div class="row">{{$user->mobile}}</div>
    <div class="row">{{$user->email}}</div>
    <div class="row">{{$user->location}}</div>
    <div class="row">{{$user->updated_at->diffForHumans()}}</div>

    <a class="btn btn-default" href="{{route('user.profile.update')}}">Profile Update</a>

@stop