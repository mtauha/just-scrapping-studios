@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Orders</h1>
    <ul>
        @foreach($orders as $order)
            <li>
                Order #{{ $order->id }}
                <form action="{{ route('cart.add') }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="item" value="order_{{ $order->id }}">
                    <input type="hidden" name="name" value="Order #{{ $order->id }}">
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection