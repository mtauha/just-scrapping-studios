@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">My Enrollments and Bookings</h1>

    <div class="row">
        <!-- Course Enrollments -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header">Course Enrollments</div>
                <div class="card-body">
                    @if($courseEnrollments->isEmpty())
                        <p>You have no course enrollments.</p>
                    @else
                        <ul class="list-group">
                            @foreach($courseEnrollments as $enrollment)
                                <li class="list-group-item">
                                    <strong>Course:</strong> {{ $enrollment->course_name }}<br>
                                    <strong>Enrollment Date:</strong> {{ $enrollment->enrollment_date }}<br>
                                    <strong>Start Date:</strong> {{ $enrollment->start_date }}<br>
                                    <strong>End Date:</strong> {{ $enrollment->end_date }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        <!-- Training Enrollments -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header">Training Enrollments</div>
                <div class="card-body">
                    @if($trainingEnrollments->isEmpty())
                        <p>You have no training enrollments.</p>
                    @else
                        <ul class="list-group">
                            @foreach($trainingEnrollments as $enrollment)
                                <li class="list-group-item">
                                    <strong>Training:</strong> {{ $enrollment->training_name }}<br>
                                    <strong>Enrollment Date:</strong> {{ $enrollment->enrollment_date }}<br>
                                    <strong>Time:</strong> {{ $enrollment->time }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        <!-- Competition Enrollments -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header">Competition Enrollments</div>
                <div class="card-body">
                    @if($competitionEnrollments->isEmpty())
                        <p>You have no competition enrollments.</p>
                    @else
                        <ul class="list-group">
                            @foreach($competitionEnrollments as $enrollment)
                                <li class="list-group-item">
                                    <strong>Competition:</strong> {{ $enrollment->competition_name }}<br>
                                    <strong>Enrollment Date:</strong> {{ $enrollment->enrollment_date }}<br>
                                    <strong>Start Date:</strong> {{ $enrollment->start_date }}<br>
                                    <strong>End Date:</strong> {{ $enrollment->end_date }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        <!-- Bookings -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header">Bookings</div>
                <div class="card-body">
                    @if($bookings->isEmpty())
                        <p>You have no bookings.</p>
                    @else
                        <ul class="list-group">
                            @foreach($bookings as $booking)
                                <li class="list-group-item">
                                    <strong>{{ ucfirst(str_replace('_', ' ', $booking->type)) }}:</strong> on
                                    {{ $booking->date }} at {{ $booking->time }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection