@extends('layouts.app')

@section('content')
<h1>Create Enrollment</h1>
<form action="{{ route('enrollments.store') }}" method="POST">
    @csrf
    <div>
        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" required>
    </div>
    <div>
        <label for="course_id">Course ID:</label>
        <input type="number" id="course_id" name="course_id" required>
    </div>
    <button type="submit">Create</button>
</form>
@endsection