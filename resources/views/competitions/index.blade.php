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
                        <p class="card-text">Start Date: {{ $competition->start_date }}</p>
                        <p class="card-text">End Date: {{ $competition->end_date }}</p>
                        <a href="{{ route('competitions.edit', $competition->id) }}" class="btn btn-primary btn-block mt-2">Edit</a>
                        <form action="{{ route('competitions.destroy', $competition->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you want to delete this competition?');">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection