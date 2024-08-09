@extends('layouts.app')

@section('content')
    <h1>Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        
        <label for="content">Content:</label>
        <textarea name="content" id="content">{{ old('content') }}</textarea>
        
        <button type="submit">Save</button>
    </form>
@endsection
