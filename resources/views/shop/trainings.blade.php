@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Trainings</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @php
        $onlineTrainings = $trainings->filter(function($training) {
            return strpos($training->type, '1') === false;
        });
        $oneToOneTrainings = $trainings->filter(function($training) {
            return strpos($training->type, '1') !== false;
        });
    @endphp

    <h2 class="my-4">Online Trainings</h2>
    <div class="row">
        @foreach($onlineTrainings as $training)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $training->image_url }}" class="card-img-top" alt="{{ $training->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $training->name }}</h5>
                        <p class="card-text">{{ $training->description }}</p>
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#trainingModal-{{ $training->id }}">Book Now</button>
                    </div>
                </div>
            </div>

            <!-- Training Modal -->
            <div class="modal fade" id="trainingModal-{{ $training->id }}" tabindex="-1" role="dialog" aria-labelledby="trainingModalLabel-{{ $training->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="trainingModalLabel-{{ $training->id }}">Book {{ $training->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('general_requests.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <img src="{{ $training->image_url }}" class="img-fluid mb-3" alt="{{ $training->name }}">
                                <input type="hidden" name="enrollment_type" value="training">
                                <input type="hidden" name="training_id" value="{{ $training->id }}">
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
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="time">Time</label>
                                    <input type="time" name="time" id="time" class="form-control" required>
                                </div>
                                <p>Are you sure you want to book this training session?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="my-4">1 to 1 Trainings</h2>
    <div class="row">
        @foreach($oneToOneTrainings as $training)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $training->image_url }}" class="card-img-top" alt="{{ $training->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $training->name }}</h5>
                        <p class="card-text">{{ $training->description }}</p>
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#trainingModal-{{ $training->id }}">Book Now</button>
                    </div>
                </div>
            </div>

            <!-- Training Modal -->
            <div class="modal fade" id="trainingModal-{{ $training->id }}" tabindex="-1" role="dialog" aria-labelledby="trainingModalLabel-{{ $training->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="trainingModalLabel-{{ $training->id }}">Book {{ $training->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('general_requests.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <img src="{{ $training->image_url }}" class="img-fluid mb-3" alt="{{ $training->name }}">
                                <input type="hidden" name="enrollment_type" value="training">
                                <input type="hidden" name="training_id" value="{{ $training->id }}">
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
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="time">Time</label>
                                    <input type="time" name="time" id="time" class="form-control" required>
                                </div>
                                <p>Are you sure you want to book this training session?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection