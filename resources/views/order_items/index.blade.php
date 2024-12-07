@extends('layouts.app')

@section('content')
    <h1>Order Items</h1>
    <a href="{{ route('order_items.create') }}">Create New Order Item</a>
    <ul>
        @foreach($orderItems as $orderItem)
            <li>
                <a href="{{ route('order_items.show', $orderItem->id) }}">Order Item #{{ $orderItem->id }}</a>
                <a href="{{ route('order_items.edit', $orderItem->id) }}">Edit</a>
                <form action="{{ route('order_items.destroy', $orderItem->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection