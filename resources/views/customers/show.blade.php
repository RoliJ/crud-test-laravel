@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Customer Details</h1>
        </div>
        <div class="card-body">
            <p><strong>Firstname:</strong> {{ $customer->first_name }}</p>
            <p><strong>Lastname:</strong> {{ $customer->last_name }}</p>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Phone Number:</strong> {{ $customer->phone_number }}</p>
            <p><strong>Bank Account Number:</strong> {{ $customer->bank_account_number }}</p>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
@endsection
