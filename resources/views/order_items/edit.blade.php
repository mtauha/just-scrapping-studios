@extends('layouts.app')

@section('content')
<h1>Edit Order Item</h1>
<form action="{{ route('order_items.update', $orderItem->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="order_id">Order ID:</label>
        <input type="number" id="order_id" name="order_id" value="{{ $orderItem->order_id }}" required>
    </div>
    <div>
        <label for="product_id">Product ID:</label>
        <input type="number" id="product_id" name="product_id" value="{{ $orderItem->product_id }}">
    </div>
    <div>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="{{ $orderItem->quantity }}" required>
    </div>
    <div>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" value="{{ $orderItem->price }}" required>
    </div>
    <div>
        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="Scrapbook Product" {{ $orderItem->type == 'Scrapbook Product' ? 'selected' : '' }}>Scrapbook
                Product</option>
            <option value="1 on 1 Training" {{ $orderItem->type == '1 on 1 Training' ? 'selected' : '' }}>1 on 1 Training
            </option>
            <option value="Online Training" {{ $orderItem->type == 'Online Training' ? 'selected' : '' }}>Online Training
            </option>
            <option value="Special Scrapbook Album Tutorial" {{ $orderItem->type == 'Special Scrapbook Album Tutorial' ? 'selected' : '' }}>Special Scrapbook Album Tutorial</option>
        </select>
    </div>
    <button type="submit">Update</button>
</form>
@endsection