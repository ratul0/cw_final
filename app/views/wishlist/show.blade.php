@extends('layouts.default')

@section('content')
    @include('includes.alert')
    <h3>  WishList </h3>
    <hr class="soft"/>

    </table>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Wish List Id</th>
            <th>Product Name</th>
            <th>Product Description</th>

        </tr>
        </thead>
        <tbody>

        @foreach($wishlists as $wishlist)
            <tr>

                <!-- cart image thumbs will go under the img bellow -->

                <td>
                    {{$wishlist->id}}
                </td>
                <td>
                    <a href="{{route('product.show',['id'=>$wishlist->product_id])}}">{{$wishlist->name}}</a>

                </td>
                <td>
                    {{$wishlist->description}}
                </td>


            </tr>
        @endforeach




        </tbody>
    </table>

@stop