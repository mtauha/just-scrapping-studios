@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">General Requests</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('admin.general_requests.index') }}">
        <div class="form-group">
            <label for="category">Select Category:</label>
            <select name="category" id="category" class="form-control" onchange="this.form.submit()">
                <option value="all" {{ $category == 'all' ? 'selected' : '' }}>All</option>
                <option value="course" {{ $category == 'course' ? 'selected' : '' }}>Course</option>
                <option value="competition" {{ $category == 'competition' ? 'selected' : '' }}>Competition</option>
                <option value="training" {{ $category == 'training' ? 'selected' : '' }}>Training</option>
                <option value="booking" {{ $category == 'booking' ? 'selected' : '' }}>Booking</option>
            </select>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    @if($category == 'course')
                        <th>Enrollment Type</th>
                        <th>Course ID</th>
                        <th>Course Name</th>
                    @elseif($category == 'competition')
                        <th>Enrollment Type</th>
                        <th>Competition ID</th>
                        <th>Competition Name</th>
                    @elseif($category == 'training')
                        <th>Enrollment Type</th>
                        <th>Training ID</th>
                        <th>Training Name</th>
                    @elseif($category == 'booking')
                        <th>Enrollment Type</th>
                        <th>Booking Type</th>
                        <th>Booking Date</th>
                        <th>Booking Time</th>
                        <th>Duration (minutes)</th>
                    @else
                        <th>Enrollment Type</th>
                        <th>Course ID</th>
                        <th>Competition ID</th>
                        <th>Training ID</th>
                    @endif
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($generalRequests as $request)
                    <tr>
                        <td>{{ $request->user->id }}</td>
                        <td>{{ $request->user->name }}</td>
                        @if($category == 'course')
                            <td>{{ $request->enrollment_type }}</td>
                            <td>{{ $request->course_id }}</td>
                            <td>{{ $request->course->name }}</td>
                        @elseif($category == 'competition')
                            <td>{{ $request->enrollment_type }}</td>
                            <td>{{ $request->competition_id }}</td>
                            <td>{{ $request->competition->name }}</td>
                        @elseif($category == 'training')
                            <td>{{ $request->enrollment_type }}</td>
                            <td>{{ $request->training_id }}</td>
                            <td>{{ $request->training->name }}</td>
                        @elseif($category == 'booking')
                            <td>{{ $request->enrollment_type }}</td>
                            <td>{{ $request->booking_type }}</td>
                            <td>{{ $request->date }}</td>
                            <td>{{ $request->time }}</td>
                            <td>{{ $request->duration }}</td>
                        @else
                            <td>{{ $request->enrollment_type }}</td>
                            <td>{{ $request->course_id }}</td>
                            <td>{{ $request->competition_id }}</td>
                            <td>{{ $request->training_id }}</td>
                        @endif
                        <td>
                            <form action="{{ route('admin.general_requests.approve', $request->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                            </form>
                            <form action="{{ route('admin.general_requests.reject', $request->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection