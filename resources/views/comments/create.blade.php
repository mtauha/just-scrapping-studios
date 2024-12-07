@extends('layouts.app')

@section('content')
    <h1>Create Comment</h1>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div>
            <label for="user_id">User ID:</label>
            <input type="number" id="user_id" name="user_id" required>
        </div>
        <div>
            <label for="commentable_id">Commentable ID:</label>
            <input type="number" id="commentable_id" name="commentable_id" required>
        </div>
        <div>
            <label for="commentable_type">Commentable Type:</label>
            <input type="text" id="commentable_type" name="commentable_type" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection