@extends('layouts.app')

@php
use Illuminate\Support\Facades\Redis;
@endphp

@section('content')
    <div class="container">
        <h1>Your Cart</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <ul>
            @foreach($cart as $item => $quantity)
                <li>
                    {{ Redis::hget('cart_names:' . auth()->id(), $item) }}: {{ $quantity }} x ${{ Redis::hget('cart_prices:' . auth()->id(), $item) }}
                    <form action="{{ route('cart.increase', $item) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary">+</button>
                    </form>
                    <form action="{{ route('cart.decrease', $item) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-warning">-</button>
                    </form>
                    <form action="{{ route('cart.remove', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to remove this item?');">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <h3>Total: ${{ $total }}</h3>
    </div>
@endsection