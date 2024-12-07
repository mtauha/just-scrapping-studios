@extends('layouts.app')

@section('content')
    <h1>Edit Booking</h1>
    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="user_id">User ID:</label>
            <input type="number" id="user_id" name="user_id" value="{{ $booking->user_id }}" required>
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $booking->name }}" required>
        </div>
        <div>
            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="coffee_relaxation" {{ $booking->type == 'coffee_relaxation' ? 'selected' : '' }}>Coffee and Relaxation Area</option>
                <option value="kids_play_area" {{ $booking->type == 'kids_play_area' ? 'selected' : '' }}>Kids Play Area</option>
            </select>
        </div>
        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="{{ $booking->date }}" required>
        </div>
        <div>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" value="{{ $booking->time }}" required>
        </div>
        <div>
            <label for="duration">Duration (minutes):</label>
            <input type="number" id="duration" name="duration" value="{{ $booking->duration }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection