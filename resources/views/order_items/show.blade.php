@extends('layouts.app')

@section('content')
    <h1>Order Item #{{ $orderItem->id }}</h1>
    <p>Order ID: {{ $orderItem->order_id }}</p>
    <p>Product ID: {{ $orderItem->product_id }}</p>
    <p>Quantity: {{ $orderItem->quantity }}</p>
    <p>Price: ${{ $orderItem->price }}</p>
    <a href="{{ route('order_items.edit', $orderItem->id) }}">Edit</a>
    <form action="{{ route('order_items.destroy', $orderItem->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection