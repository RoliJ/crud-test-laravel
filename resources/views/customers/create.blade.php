@extends('layouts.app')

@section('content')
    <h1>Create Customer</h1>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        @include('customers.form')
        <button type="submit">Create</button>
    </form>
@endsection
