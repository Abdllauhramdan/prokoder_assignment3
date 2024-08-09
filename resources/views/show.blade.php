@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <h2>Comments</h2>
    <form action="{{ route('comments.store', $post->id) }}" method="POST">
        @csrf
        <textarea name="content"></textarea>
        <button type="submit">Add Comment</button>
    </form>

    <ul>
        @foreach ($comments as $comment)
            <li>{{ $comment->content }} 
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
