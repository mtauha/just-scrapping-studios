@extends('layouts.app')

@section('content')
    <h1>{{ $training->name }}</h1>
    <p>{{ $training->description }}</p>
    <p>Date: {{ $training->date }}</p>
    <p>Time: {{ $training->time }}</p>
    <p>Price: ${{ $training->price }}</p>
    <a href="{{ route('trainings.edit', $training->id) }}">Edit</a>
    <form action="{{ route('trainings.destroy', $training->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection