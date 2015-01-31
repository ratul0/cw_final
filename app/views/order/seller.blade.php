@extends('layouts.default')

@section('content')
    @include('includes.alert')
    <h3>  Order </h3>
    <hr class="soft"/>

    </table>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Buyer ID</th>
            <th>Total Amount</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product price</th>
            <th>Product Quantity</th>
            <th>Created At</th>

            <th></th>
            <th></th>

        </tr>
        </thead>
        <tbody>

        @foreach($orders as $order)
            <tr>

                <!-- cart image thumbs will go under the img bellow -->

                <td>
                    {{$order->id}}
                </td>

                <td>
                    {{User::find($order->buyer_id)->full_name}}
                </td>

                <td>
                    {{$order->total_price}}
                </td>

                <td>
                    {{$order->name}}
                </td>

                <td>
                    {{$order->description}}
                </td>

                <td>
                    {{$order->price}}
                </td>

                <td>
                    {{$order->quantity}}
                </td>

                <td>
                    {{$order->created_at}}
                </td>

                <td>
                    @if(!$order->order_status)
                    <a class= "btn btn-large btn-danger" href="{{route('order.cancel',['id'=>$order->id])}}">Cancel</a>
                    @endif
                </td>

                <td>
                    @if(!$order->order_status)
                        <a class= "btn btn-large btn-success" href="{{route('order.approve',['id'=>$order->id])}}">Approve</a>
                    @endif
                </td>




            </tr>
        @endforeach




        </tbody>
    </table>

@stop