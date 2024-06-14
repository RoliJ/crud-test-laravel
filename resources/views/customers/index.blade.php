@extends('layouts.app')

@section('content')
    <h1>Customers</h1>
    <a href="{{ route('customers.create') }}">Create Customer</a>
    <table>
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->firstname }}</td>
                    <td>{{ $customer->lastname }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>
                        <a href="{{ route('customers.show', $customer) }}">View</a>
                        <a href="{{ route('customers.edit', $customer) }}">Edit</a>
                        <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
