@extends('layouts.dashboard')

@section('content')
<div class="w-75">

    <h1>User Infomation</h1>

    <div class="d-flex flex-row">
        <div class="col-3">
            <img src="{{ asset('/storage/icons/'.$user->icon) }}" alt="" class="img-thumbnail rounded-circle">
        </div>
        <div class="col-flex-column">
            <h3><i class="far fa-user"></i> {{ $user->name }}</h3>
            <div class="row ml-3">
                <ul class="list-group">
                    <li class="list-group-item"><i class="far fa-envelope"></i> {{ $user->email }}</li>
                    <li class="list-group-item"><i class="fas fa-user-clock"></i> {{ $user->created_at }}</li>
                </ul>
            </div>
        </div>
    </div>

    <hr>

    <h2>User's Post..<i class="fas fa-camera"></i></h2>

    @foreach ($posts as $post)
        <div class="d-flex flex-row mb-4">
            <div class="col-3">
                <img src="{{ asset('storage/posts/'.$post->image) }}" alt="" class="img-thumbnail">
            </div>
            <div class="col-flex-column">
                <ul class="list-group">
                    <li class="list-group-item">{{ $post->content }}</li>
                </ul>
                <p class="mb-0"><i class="fas fa-book"></i> {{ $post->wedding_album->name }}</p>
                <p class="mb-0"><i class="fas fa-camera"></i> {{ $post->shooting_time }}</p>
                <p class="mb-0"><i class="fas fa-clock"></i>{{ $post->created_at }}</p>
            </div>
        </div>
    @endforeach
    {{ $posts->links() }}

    <hr>

    <h2>User's comment...<i class="far fa-comments"></i></h2>

    @foreach ($comments as $comment)
        <div class="d-flex flex-row-reverse mb-4">
            <div class="col-3 d-flex flex">
                <img src="{{ asset('storage/icons/'.$user->icon) }}" alt="" class="img-thumbnail rounded-circle">
            </div>
            <div class="col-flex-column">
                <ul class="list-group">
                    <li class="list-group-item">{{ $comment->content }}</li>
                </ul>
                <p class="mb-0"><i class="fas fa-book"></i> {{ App\WeddingAlbum::find($comment->post->wedding_album_id)->name }}</p>
                <p class="mb-0"><i class="fas fa-user"></i><i class="fas fa-comment"></i>
                    {{ App\User::find($comment->post->user_id)->name }}
                </p>
                <p class="mb-0"><i class="fas fa-clock"></i>{{ $comment->created_at }}</p>
            </div>
        </div>
    @endforeach
    {{ $comments->links() }}

    <hr>

    <h2>User's favorites__<i class="fas fa-heart"></i></h2>

    @foreach ($favorites as $fav)
        @if ($fav->favoriteable_type == "App\Post")
            <div class="d-flex flex-row mb-4">
                <div class="col-3">
                    <img src="{{ asset('/storage/icons/'.App\Post::find($fav->favoriteable_id)->user->icon) }}" class="img-thumbnail rounded-circle">
                </div>
                <div class="col-3">
                    <img src="{{ asset('storage/posts/'.App\Post::find($fav->favoriteable_id)->image) }}" class="img-thumbnail">
                </div>
                <div class="col-flex-column">
                    <ul class="list-group">
                        <li class="list-group-item">{{ App\Post::find($fav->favoriteable_id)->content }}</li>
                    </ul>
                    <p class="mb-0">
                        <i class="fas fa-book"></i>
                        {{ App\WeddingAlbum::find(App\Post::find($fav->favoriteable_id)->wedding_album_id)->name }}
                    </p>
                    <p class="mb-0"><i class="fas fa-camera"></i> {{ App\Post::find($fav->favoriteable_id)->shooting_time }}</p>
                    <p class="mb-0"><i class="fas fa-clock"></i>{{ $fav->created_at }}</p>
                </div>
            </div>
        @else
            <div class="d-flex flex-row mb-4">
                <div class="col-3">
                    <img src="{{ asset('/storage/icons/'.App\Comment::find($fav->favoriteable_id)->user->icon) }}" class="img-thumbnail rounded-circle">
                </div>
                <div class="col-flex-column">
                    <ul class="list-group">
                        <li class="list-group-item">{{ App\Comment::find($fav->favoriteable_id)->content }}</li>
                    </ul>
                    <p class="mb-0">
                        <i class="fas fa-comment"></i>
                        {{ App\Post::find(App\Comment::find($fav->favoriteable_id)->post_id)->content }}
                    </p>
                    <p class="mb-0"><i class="fas fa-clock"></i>{{ $fav->created_at }}</p>
                </div>
            </div>
        @endif
    @endforeach

</div>
@endsection
