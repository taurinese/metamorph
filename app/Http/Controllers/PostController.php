<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function like(Request $request, Post $post)
    {
        if ($post->hasLiked()) {
            return redirect()->back()->withError('Tu as déjà liké mon fréro');
        }

        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return redirect()->back();
    }

    public function comment(Request $request, Post $post)
    {
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'content' => $request->comment
        ]);

        return redirect()->back();
    }
}
