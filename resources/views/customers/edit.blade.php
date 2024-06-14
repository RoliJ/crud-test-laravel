@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Customer</h1>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('customers.update', $customer) }}" method="POST">
                @csrf
                @method('PUT')
                @include('customers.form')
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
