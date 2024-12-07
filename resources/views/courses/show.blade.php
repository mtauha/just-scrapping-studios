@extends('layouts.app')

@section('content')
    <h1>{{ $course->name }}</h1>
    <p>{{ $course->description }}</p>
    <p>Start Date: {{ $course->start_date }}</p>
    <p>End Date: {{ $course->end_date }}</p>
    <p>Price: ${{ $course->price }}</p>
    <a href="{{ route('courses.edit', $course->id) }}">Edit</a>
    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection