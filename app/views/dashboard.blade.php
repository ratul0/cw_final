@extends('layouts.default')

@section('content')
    @include('includes.alert')
	This is Dashboard.
    <a href="{{route('products.create')}}">Add Product</a>
@stop