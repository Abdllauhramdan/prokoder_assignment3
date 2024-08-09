@extends('layouts.app')

@section('content')
    <h1>Manage Comments</h1>
    <ul>
        @foreach ($comments as $comment)
            <li>{{ $comment->content }} - <strong>{{ $comment->post->title }}</strong>
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
