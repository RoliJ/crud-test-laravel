@extends('layouts.app')

@section('content')
    <h1>Edit Customer</h1>
    <form action="{{ route('customers.update', $customer) }}" method="POST">
        @csrf
        @method('PUT')
        @include('customers.form')
        <button type="submit">Update</button>
    </form>
@endsection
