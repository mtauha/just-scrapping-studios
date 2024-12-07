@extends('layouts.app')

@section('content')
    <h1>Order #{{ $order->id }}</h1>
    <p>User ID: {{ $order->user_id }}</p>
    <p>Total Price: ${{ $order->total_price }}</p>
    <a href="{{ route('orders.edit', $order->id) }}">Edit</a>
    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection