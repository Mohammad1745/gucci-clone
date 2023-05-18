@extends('customer.layouts.customer')
@section('content')
    </div>
<style>
    .container {
        display: flex;
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
    }

    .content {
        width: 70%; /* 50% of the container width (col-6) */
    }
    @media (max-width: 768px) {
        .content {
            width: 80%; /* Adjust the width for mobile screens */
        }
</style>
    <div class="container">
        <div class="content" style="padding-top: 20px;">
            <div class="row">
                <div class="col-7">
                    <div class="box_main">
                        <h3 style="font-weight: bold;">Products</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                @php
                                    $totalprice= 0;
                                @endphp
                                @foreach($carts as $cart)
                                    <tr>
                                        <td>{{$cart->product_name}}</td>
                                        <td>{{$cart->quantity}}</td>
                                        <td>{{$cart->price}}</td>
                                    </tr>
                                    @php
                                        $totalprice= $totalprice+$cart->price;
                                    @endphp

                                @endforeach
                                <tr>
                                    <td></td>
                                    <td class="">Total</td>
                                    <td class="text-right font-weight-bold">{{$totalprice}}$</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="box_main">
                        <h3 style="font-weight: bold;">Shipping Information</h3>
                        <p>Village/City- {{$shippingInfo->village_name}}</p>
                        <p>Postal Code- {{$shippingInfo->postal_code}}</p>
                        <p>Phone Number- {{$shippingInfo->number}}</p>
                    </div>
                </div>

            </div>
            <div class="row" style="justify-content: right">
                <div class=""style="padding: 5px">
                    <form action=""method="post">
                        @csrf

                        <button onclick="confirm('Are you sure you want to cancel?')" type="submit" class="btn btn-danger">Cancel Order</button>
                    </form>
                </div>
                <div style="padding: 5px">
                    <form action=""method="post">
                        @csrf
                        <button type="submit" class="btn btn-warning">Place Order</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
