@extends('layouts.app')

@section('content')
<h1>Enrollment #{{ $enrollment->id }}</h1>
<p>User ID: {{ $enrollment->user_id }}</p>
<p>Course ID: {{ $enrollment->course_id }}</p>
<a href="{{ route('enrollments.edit', $enrollment->id) }}">Edit</a>
<form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
@endsection