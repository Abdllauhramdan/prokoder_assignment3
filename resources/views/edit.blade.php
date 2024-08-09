@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
        
        <label for="content">Content:</label>
        <textarea name="content" id="content">{{ old('content', $post->content) }}</textarea>
        
        <button type="submit">Save</button>
    </form>
@endsection
