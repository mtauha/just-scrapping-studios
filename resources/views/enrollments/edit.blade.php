@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Enrollment</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="number" id="user_id" name="user_id" class="form-control" value="{{ $enrollment->user_id }}" required>
        </div>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="number" id="course_id" name="course_id" class="form-control" value="{{ $enrollment->course_id }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Enrollment</button>
    </form>
</div>
@endsection