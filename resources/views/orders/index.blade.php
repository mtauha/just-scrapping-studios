@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Orders</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="list-group">
        @foreach($orders as $order)
            <div class="list-group-item">
                <h5 class="mb-1">Order #{{ $order->id }}</h5>
                <p class="mb-1">Total: ${{ $order->total }}</p>
                <small>Placed on {{ $order->created_at->format('d M Y') }}</small>
                <div class="mt-2">
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?');">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection