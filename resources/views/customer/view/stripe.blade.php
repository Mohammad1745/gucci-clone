
<!-- resources/views/payment.blade.php -->

@extends('customer.layouts.customer')
@section('content')
    </div>
<div class="container" >
    <div class="container" style="display: flex; justify-content: center; align-items: center; ">
        <img src="/img/customer/stripe.svg.png" style="width: 200px; height: 120px;">
    </div>


    <div class='row'>

        <div class='col-md-4'></div>
        <div class='col-md-4'>
            <form accept-charset="UTF-8" action="{{route('placeOrder')}}" class="require-validation"

                  id="payment-form" method="post">
                @csrf

                <div class='form-row'style="display: block;margin-top: 30px">
                    <h3 style="font-weight: bold;">Card Information</h3>
                    <div class='col-xs-12 form-group card required'>
                        <label class='control-label'>Card Holder Name</label>
                        <input name="name" autocomplete='off' class='form-control card-number' size='20'
                               type='text' placeholder="Enter Card Holder Name">
                    </div>
                </div>
                <div class='form-row'style="display: block">
                    <div class='col-xs-12 form-group card required'>
                        <label class='control-label'>Card Number</label>
                        <input name="number" autocomplete='off' class='form-control card-number' size='20'
                               type='text' placeholder="Enter Card number">
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col-xs-4 form-group cvc required'>
                        <label class='control-label'>CVC</label>
                        <input name="cvc" autocomplete='off' class='form-control card-cvc'
                               placeholder='CVV' size='4' type='text'>
                    </div>
                    <div class='col-xs-4 form-group expiration required'>
                        <label class='control-label'>Expiration</label>
                        <input name="month" class='form-control card-expiry-month' placeholder='MM' size='2'
                               type='text'>
                    </div>
                    <div class='col-xs-4 form-group expiration required'>
                        <label class='control-label'>YEAR</label>
                        <input name="year" class='form-control card-expiry-year' placeholder='YYYY'
                               size='4' type='text'>
                    </div>
                </div>
                <!-- <div class='form-row'>
                  <div class='col-md-12'>
                    <div class='form-control total btn btn-info'>
                      Total: <span class='amount'>$300</span>
                    </div>
                  </div>
                </div> -->
                <div class='form-row'>
                    <div class='col-md-12 form-group'>
                        <button class='form-control btn btn-primary submit-button'
                                type='submit' style="margin-top: 10px;">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
        <div class='col-md-4'></div>
    </div>
</div>
    @endsection('content')
