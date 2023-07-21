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
        width: 50%; /* 50% of the container width (col-6) */
    }
    @media (max-width: 768px) {
        .content {
            width: 80%; /* Adjust the width for mobile screens */
        }
</style>
    <div class="container">
        <div class="content">
            <h1>Provide Your Shipping Address</h1>
            <div class="row">
                <div class="box_main">
                    <form action="{{route('addShippingInfo')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input name="number" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="village/city">village/city</label>
                            <input name="village_name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input name="postal_code" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Message</label>
                            <textarea name="message" type="text" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary">Next</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
