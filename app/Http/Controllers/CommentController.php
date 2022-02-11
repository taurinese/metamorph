<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function like(Request $request, Comment $comment)
    {
        if ($comment->hasLiked()) {
            return redirect()->back()->withError('Tu as déjà liké mon fréro');
        }

        $comment->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return redirect()->back();
    }
}
