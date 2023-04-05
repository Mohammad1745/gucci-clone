@extends('admin.layouts.admin')
@section('title')
    Completed Order
@endsection
@section('content')

    <div style="padding: 5vw; justify-content: center">
        <div>
            <h5>Completed Order</h5>
        </div>
        <table class="table table-dark table-hover">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Place</th>
                <th>Customer Feedback</th>
                <th>Order Details</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Md Tamim Hossain</td>
                <td>Dhaka Bangladesh</td>
                <td>4.5/5</td>
                <td><a class="btn btn-light">Details</a></td>
                <td>Completed</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
