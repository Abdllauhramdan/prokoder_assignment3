@extends('layouts.app')

@section('content')
    <h1>Media Library</h1>
    <form action="{{ route('media.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Upload</button>
    </form>

    <ul>
        @foreach ($mediaFiles as $file)
            <li>{{ $file->file_name }}</li>
        @endforeach
    </ul>
@endsection
