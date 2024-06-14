@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
    <h1>Customer Details</h1>
    <p>Firstname: {{ $customer->first_name }}</p>
    <p>Lastname: {{ $customer->last_name }}</p>
    <p>Email: {{ $customer->email }}</p>
    <p>Phone Number: {{ $customer->phone_number }}</p>
    <p>Bank Account Number: {{ $customer->bank_account_number }}</p>
    <a href="{{ route('customers.index') }}">Back to List</a>
@endsection
