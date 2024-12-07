@extends('layouts.app')

@section('content')
    <h1>Create Order Item</h1>
    <form action="{{ route('order_items.store') }}" method="POST">
        @csrf
        <div>
            <label for="order_id">Order ID:</label>
            <input type="number" id="order_id" name="order_id" required>
        </div>
        <div>
            <label for="product_id">Product ID:</label>
            <input type="number" id="product_id" name="product_id">
        </div>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>
        </div>
        <div>
            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="Scrapbook Product">Scrapbook Product</option>
                <option value="1 on 1 Training">1 on 1 Training</option>
                <option value="Online Training">Online Training</option>
                <option value="Special Scrapbook Album Tutorial">Special Scrapbook Album Tutorial</option>
            </select>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection