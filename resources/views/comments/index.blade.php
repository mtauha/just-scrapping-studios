@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Comments</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="list-group">
        @foreach($comments as $comment)
            <div class="list-group-item">
                <h5 class="mb-1">{{ $comment->user->name }}</h5>
                <p class="mb-1">{{ $comment->content }}</p>
                <small>Posted on {{ $comment->created_at->format('d M Y') }}</small>
                <div class="mt-2">
                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this comment?');">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection