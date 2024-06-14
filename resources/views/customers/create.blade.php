@extends('layouts.app')

@section('title', 'Create Customer')

@section('content')
    <h1>Create Customer</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        @include('customers.form')
        <button type="submit">Create</button>
    </form>
@endsection
