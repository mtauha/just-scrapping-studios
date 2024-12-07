@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Trainings</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Online Trainings -->
    <h2 class="my-4">Online Trainings</h2>
    <div class="row">
        @foreach($trainings->where('type', 'online') as $training)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $training->image_url }}" class="card-img-top" alt="{{ $training->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $training->name }}</h5>
                        <p class="card-text">${{ $training->price }}</p>
                        <p class="card-text">Date: {{ $training->date }}</p>
                        <p class="card-text">Time: {{ $training->time }}</p>
                        <a href="{{ route('trainings.edit', $training->id) }}"
                            class="btn btn-primary btn-block mt-2">Edit</a>
                        <form action="{{ route('trainings.destroy', $training->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block"
                                onclick="return confirm('Are you sure you want to delete this training?');">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- 1 on 1 Trainings -->
    <h2 class="my-4">1 on 1 Trainings</h2>
    <div class="row">
        @foreach($trainings->where('type', '1on1') as $training)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $training->image_url }}" class="card-img-top" alt="{{ $training->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $training->name }}</h5>
                        <p class="card-text">${{ $training->price }}</p>
                        <p class="card-text">Date: {{ $training->date }}</p>
                        <p class="card-text">Time: {{ $training->time }}</p>
                        <a href="{{ route('trainings.edit', $training->id) }}"
                            class="btn btn-primary btn-block mt-2">Edit</a>
                        <form action="{{ route('trainings.destroy', $training->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block"
                                onclick="return confirm('Are you sure you want to delete this training?');">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection