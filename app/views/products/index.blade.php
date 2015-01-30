@extends('layouts.default')

@section('content')
    @include('includes.alert')
    @foreach($products as $product)
        {{$product->name}}
    @endforeach
@stop