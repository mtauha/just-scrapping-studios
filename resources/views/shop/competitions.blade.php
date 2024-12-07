@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Competitions</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        @foreach($competitions as $competition)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $competition->image_url }}" class="card-img-top" alt="{{ $competition->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $competition->name }}</h5>
                        <p class="card-text">${{ $competition->price }}</p>
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#competitionModal-{{ $competition->id }}">Book Now</button>
                    </div>
                </div>
            </div>

            <!-- Competition Modal -->
            <div class="modal fade" id="competitionModal-{{ $competition->id }}" tabindex="-1" role="dialog" aria-labelledby="competitionModalLabel-{{ $competition->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="competitionModalLabel-{{ $competition->id }}">Book {{ $competition->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('general_requests.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <img src="{{ $competition->image_url }}" class="img-fluid mb-3" alt="{{ $competition->name }}">
                                <input type="hidden" name="enrollment_type" value="competition">
                                <input type="hidden" name="competition_id" value="{{ $competition->id }}">
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
                                <p>Are you sure you want to book this competition?</p>
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