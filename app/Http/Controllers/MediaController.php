<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function upload(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|file|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $path = $request->file('file')->store('public/media');

        Media::create([
            'file_name' => $request->file('file')->getClientOriginalName(),
            'file_path' => $path,
        ]);

        return back()->with('success', 'File uploaded successfully.');
    }

    public function index()
    {
        $mediaFiles = Media::all();
        return view('media.index', compact('mediaFiles'));
    }
}
