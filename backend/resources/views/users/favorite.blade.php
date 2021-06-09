@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="w-75">
        <h1>お気に入り</h1>

        <hr>

        <div class="row">
            @foreach ($favorites as $fav)
                <div class="col-md-8 mt-3">
                    <div class="d-inline-flex">
                        @if ($fav->favoriteable_type == 'App\Comment')
                            <a href="{{ route('posts.show', $fav) }}" class="w-25">
                                <img src="{{ asset('storage/posts/dummy.png') }}" alt="" class="img-fuild w-100">
                            </a>
                            <div class="container mt-3">
                                <h5 class="w-100 favorite-item-text">{{ App\Comment::find($fav->favoriteable_id)->user->name }}</h5>
                            </div>
                            <div class="container mt-3">
                                <h5 class="w-100 favorite-item-text">{{ App\Comment::find($fav->favoriteable_id)->content}}</h5>
                            </div>
                        @else
                            <a href="{{ route('posts.show', $fav) }}" class="w-25">
                                <img src="{{ asset('storage/posts/dummy.png') }}" alt="" class="img-fuild w-100">
                            </a>
                            <div class="container mt-3">
                                <h5 class="w-100 favorite-item-text">{{ App\Post::find($fav->favoriteable_id)->user->name }}</h5>
                            </div>
                            <div class="container mt-3">
                                <h5 class="w-100 favorite-item-text">{{ App\Post::find($fav->favoriteable_id)->content}}</h5>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="/posts/{{ $fav->id }}" class="favorite-item-delete">
                        削除
                    </a>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="/posts/{{ $fav->id }}" class="favorite-item-show">
                        見る
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
