<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);

        Comment::create([
            'content' => $validated['content'],
            'post_id' => $postId,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.show', $postId);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back();
    }
}
