@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Comment</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="number" id="user_id" name="user_id" class="form-control" value="{{ $comment->user_id }}" required>
        </div>
        <div class="form-group">
            <label for="commentable_id">Commentable ID</label>
            <input type="number" id="commentable_id" name="commentable_id" class="form-control" value="{{ $comment->commentable_id }}" required>
        </div>
        <div class="form-group">
            <label for="commentable_type">Commentable Type</label>
            <input type="text" id="commentable_type" name="commentable_type" class="form-control" value="{{ $comment->commentable_type }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control" required>{{ $comment->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Comment</button>
    </form>
</div>
@endsection