@extends('layouts.app')

@section('content')
    <h1>Bookings</h1>
    <a href="{{ route('bookings.create') }}">Create New Booking</a>
    <ul>
        @foreach($bookings as $booking)
            <li>
                <a href="{{ route('bookings.show', $booking->id) }}">{{ $booking->name }}</a>
                <a href="{{ route('bookings.edit', $booking->id) }}">Edit</a>
                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection