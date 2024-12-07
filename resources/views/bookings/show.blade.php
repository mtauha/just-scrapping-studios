@extends('layouts.app')

@section('content')
    <h1>Booking #{{ $booking->id }}</h1>
    <p>User ID: {{ $booking->user_id }}</p>
    <p>Name: {{ $booking->name }}</p>
    <p>Type: {{ $booking->type }}</p>
    <p>Date: {{ $booking->date }}</p>
    <p>Time: {{ $booking->time }}</p>
    <p>Duration: {{ $booking->duration }} minutes</p>
    <a href="{{ route('bookings.edit', $booking->id) }}">Edit</a>
    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection