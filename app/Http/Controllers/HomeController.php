<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Photo;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $posts = Post::with('comments.user')->with('comments')->get();
        $photos = Photo::get();
        return view('home', compact('posts', 'photos'));
    }
}