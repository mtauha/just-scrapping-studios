@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Courses</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        @foreach($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $course->image_url }}" class="card-img-top" alt="{{ $course->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        <p class="card-text">${{ $course->price }}</p>
                        <p class="card-text">{{ $course->description }}</p>
                        <a href="{{ route('courses.enrollments', $course->id) }}" class="btn btn-primary btn-block mt-2">View Enrollments</a>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary btn-block mt-2">Edit</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you want to delete this course?');">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection