@extends('layouts.default')

@section('content')
    @include('includes.alert')
    {{$product->name}}
@stop