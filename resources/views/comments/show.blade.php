@extends('layouts.app')

@section('content')
    <h1>Comment #{{ $comment->id }}</h1>
    <p>User ID: {{ $comment->user_id }}</p>
    <p>Commentable ID: {{ $comment->commentable_id }}</p>
    <p>Commentable Type: {{ $comment->commentable_type }}</p>
    <p>Content: {{ $comment->content }}</p>
    <a href="{{ route('comments.edit', $comment->id) }}">Edit</a>
    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection