@extends('layouts.app')

@section('content')
    <h1>{{ $competition->name }}</h1>
    <p>{{ $competition->description }}</p>
    <p>Start Date: {{ $competition->start_date }}</p>
    <p>End Date: {{ $competition->end_date }}</p>
    <a href="{{ route('competitions.edit', $competition->id) }}">Edit</a>
    <form action="{{ route('competitions.destroy', $competition->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection