@extends('customer.layouts.customerProfile')

    @section('profile content')
        <h1>User Information</h1>
        <p>Name: {{$user->name}}</p>
        <p>Email: {{$user->email}}</p>
        <p>Number: {{$user->number}}</p>

    @endsection

