@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error')}}
            </div>
            @endif

            <h2>Posts</h2>

            @foreach ($posts as $post)
            <div class="card">
                <div class="card-body">
                    <div class="h4"><strong>{{ $post->user->name }}</strong> : {{ $post->body }}<br></div>

                    <form action="{{ route('posts.like', ['post' => $post->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-sm {{$post->hasLiked() ? 'btn-primary':'btn-outline-primary'}}">Like ({{ $post->likes()->count() }})</button>
                    </form>
                    @foreach ($post->comments as $comment)
                        <div class="d-flex justify-content-between align-items-center p-2 my-2 border rounded">
                            <div><strong>{{$comment->user->name}}</strong> <br> {{$comment->content}}</div>
                            <form action="{{ route('comments.like', ['comment' => $comment->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm {{$comment->hasLiked() ? 'btn-primary':'btn-outline-primary'}}">Like ({{ $comment->likes()->count() }})</button>
                            </form>
                        </div>
                    @endforeach
                    <form action="{{ route('posts.comment', ['post' => $post->id])}}" method="post">
                        @csrf
                        <input class="form-control mb-2" type="text" name="comment" id="comment">
                        <button type="submit" class="btn btn-sm btn-primary">Commenter</button>
                    </form>
                </div>
            </div>
            @endforeach

            <h2 class="mt-5">Photos</h2>

            @foreach ($photos as $photo)
            <div class="card">
                <div class="card-body">
                    <div class="h4"><strong>{{ $photo->user->name }}</strong>:<br></div>

                    <img src="{{ $photo->url }}" alt="" class="img-fluid mb-2">

                    <form action="{{ route('photos.like', ['photo' => $photo->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-sm {{$photo->hasLiked() ? 'btn-primary':'btn-outline-primary'}}">Like ({{ $photo->likes()->count() }})</button>
                    </form>
                    @foreach ($photo->comments as $comment)
                        <div class="d-flex justify-content-between align-items-center p-2 my-2 border rounded">
                            <div><strong>{{$comment->user->name}}</strong> <br> {{$comment->content}}</div>
                            <form action="{{ route('comments.like', ['comment' => $comment->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm {{$comment->hasLiked() ? 'btn-primary':'btn-outline-primary'}}">Like ({{ $comment->likes()->count() }})</button>
                            </form>
                        </div>
                    @endforeach
                    <form action="{{ route('photos.comment', ['photo' => $photo->id])}}" method="post">
                        @csrf
                        <input class="form-control mb-2" type="text" name="comment" id="comment">
                        <button type="submit" class="btn btn-sm btn-primary">Commenter</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
