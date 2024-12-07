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
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        <p class="card-text">${{ $course->price }}</p>
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#enrollModal-{{ $course->id }}">Enroll</button>
                    </div>
                </div>
            </div>

            <!-- Enroll Modal -->
            <div class="modal fade" id="enrollModal-{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="enrollModalLabel-{{ $course->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="enrollModalLabel-{{ $course->id }}">Enroll in {{ $course->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('general_requests.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="enrollment_type" value="course">
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="number" name="age" id="age" class="form-control" required>
                                </div>
                                <p>Are you sure you want to enroll in this course?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Enroll</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection