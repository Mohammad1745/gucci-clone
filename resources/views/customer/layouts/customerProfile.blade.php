@extends('customer.layouts.customer')
@section('content')
    </div>
<div class="container">
    <div class="row">
        <div class="col-lg-4"style="margin-top:50px;padding-bottom: 30px">
            <div class="box_main"  >
                <ul>
                    <li><a href="{{route('user_dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('pendingOrder')}}">Pending Order</a></li>
                    <li><a href="#">History</a></li>
                    <li><a href="{{route('logout')}}">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6"style="margin-top:50px;padding-bottom: 30px">

                <div class="box_main">
                    @yield('profile content')
                </div>
        </div>
    </div>
</div>
@endsection
