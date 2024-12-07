@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Bookings</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <!-- Coffee and Relaxation Area Booking -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <img src="https://img.freepik.com/premium-photo/coffee-cup-wooden-table-with-flowers-spring-season-calm-relax-coffee-hot-generative-ai_106651-7007.jpg"
                    class="card-img-top" alt="Coffee and Relaxation Area">
                <div class="card-body">
                    <h5 class="card-title">Coffee and Relaxation Area</h5>
                    <p class="card-text">Book a relaxing session in our coffee and relaxation area.</p>
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                        data-target="#coffeeRelaxationModal">Book Now</button>
                </div>
            </div>
        </div>

        <!-- Kids Play Area Booking -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <img src="https://www.zameen.com/blog/wp-content/uploads/2020/01/16-20-1024x658.jpg"
                    class="card-img-top" alt="Kids Play Area">
                <div class="card-body">
                    <h5 class="card-title">Kids Play Area</h5>
                    <p class="card-text">Book a fun session in our kids play area.</p>
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                        data-target="#kidsPlayAreaModal">Book Now</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Coffee and Relaxation Area Modal -->
<div class="modal fade" id="coffeeRelaxationModal" tabindex="-1" role="dialog"
    aria-labelledby="coffeeRelaxationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coffeeRelaxationModalLabel">Book Coffee and Relaxation Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('general_requests.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="enrollment_type" value="booking">
                    <input type="hidden" name="booking_type" value="coffee_relaxation">
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
                    <div class="form-group">
                        <label for="duration">Duration (minutes)</label>
                        <input type="number" name="duration" id="duration" class="form-control" required>
                    </div>
                    <p>Are you sure you want to book this appointment?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Book</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Kids Play Area Modal -->
<div class="modal fade" id="kidsPlayAreaModal" tabindex="-1" role="dialog" aria-labelledby="kidsPlayAreaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kidsPlayAreaModalLabel">Book Kids Play Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('general_requests.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="enrollment_type" value="booking">
                    <input type="hidden" name="booking_type" value="kids_play_area">
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
                    <div class="form-group">
                        <label for="duration">Duration (minutes)</label>
                        <input type="number" name="duration" id="duration" class="form-control" required>
                    </div>
                    <p>Are you sure you want to book this appointment?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Book</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection