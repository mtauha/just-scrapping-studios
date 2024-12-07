@extends('layouts.app')

@section('content')
    <h1>Create Order</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div>
            <label for="user_id">User ID:</label>
            <input type="number" id="user_id" name="user_id" required>
        </div>
        <div>
            <label for="total_price">Total Price:</label>
            <input type="number" id="total_price" name="total_price" step="0.01" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection