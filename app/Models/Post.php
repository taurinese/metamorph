<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function likes()
    {
        return $this->morphMany(\App\Models\Like::class, 'likeable');
    }

    public function hasLiked()
    {
        return $this->likes->where('user_id', Auth::user()->id)->count();
    }

    public function comments()
    {
        return $this->morphMany(\App\Models\Comment::class, 'commentable');
    }
}
