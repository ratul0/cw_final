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

            <th>Seller Profile</th>
            <th>Created At</th>
            <th>Total Amount</th>
            <th>Status</th>


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
                    <?php $user_info = User::find(Product::find($order->product_id)->user_id);?>
                    <a href="{{route('seller.profile',['id'=>$user_info->id])}}">{{$user_info->full_name}}</a>

                </td>
                <td>
                    {{$order->created_at}}
                </td>


                <td>{{$order->total_price}}</td>
                @if($order->order_status==0)
                    <td>Pending</td>
                @elseif($order->order_status==1)
                    <td>Delivered</td>
                @elseif($order->order_status==2)
                    <td>Cancelled</td>
                @endif



            </tr>
        @endforeach




        </tbody>
    </table>

@stop