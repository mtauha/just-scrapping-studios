@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Order</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="number" id="user_id" name="user_id" class="form-control" value="{{ $order->user_id }}" required>
        </div>
        <div class="form-group">
            <label for="total">Total Price</label>
            <input type="number" id="total" name="total" class="form-control" step="0.01" value="{{ $order->total }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Order</button>
    </form>
</div>
@endsection