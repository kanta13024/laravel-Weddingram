@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2 mr-5">
        @component('components.sidebar',  ['invited_wedding_albums' => $invited_wedding_albums ])
        @endcomponent
    </div>
    <div class="col-9">
        <div class="w-75">
            <h1><i class="far fa-heart"></i>お気に入り</h1>

            <hr>

            @foreach ($favorites as $fav)
                @if ($fav->favoriteable_type == "App\Post")
                    <div class="d-flex flex-row">
                        <div class="col-3 ">
                            <img src="{{ asset('/storage/icons/'.App\Post::find($fav->favoriteable_id)->user->icon) }}" class="img-thumbnail rounded-circle">
                        </div>
                        <div class="col-flex-column">
                            <h3 class="ml-4"><i class="far fa-user"></i> {{ App\Post::find($fav->favoriteable_id)->user->name }}</h3>
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('/storage/posts/'.App\Post::find($fav->favoriteable_id)->image) }}" class="img-thumbnail">
                                </div>
                                <div class="col">
                                    <p class="ml-4"><i class="far fa-comment"></i> {{ App\Post::find($fav->favoriteable_id)->content}}</p>
                                    <div class="d-flex justify-content-end">
                                        <a href="/posts/{{ App\Post::find($fav->favoriteable_id)->id}}" class="btn btn-secondary">
                                            <i class="fas fa-search-plus"></i> Show
                                        </a>
                                        {{-- <a href="/posts/{{ $post->id }}/favorite" class="btn favorite-button text-favorite w-100">
                                            <i class="fa fa-heart"></i>
                                            Unfavorite..
                                        </a> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr>
                @else

                    <div class="d-flex flex-row">
                        <div class="col-3">
                            <img src="{{ asset('/storage/icons/'.App\Comment::find($fav->favoriteable_id)->user->icon) }}" class="img-thumbnail rounded-circle">
                        </div>
                        <div class="col-flex-column col-9">
                            <h3 class="ml-4"><i class="far fa-user"></i> {{ App\Comment::find($fav->favoriteable_id)->user->name }}</h3>
                            <p class="ml-4"><i class="far fa-comment"></i> {{ App\Comment::find($fav->favoriteable_id)->content}}</p>
                            <div class="d-flex justify-content-end">
                                <a href="/posts/{{ App\Comment::find($fav->favoriteable_id)->post_id}}" class="btn btn-secondary">
                                    <i class="fas fa-search-plus"></i> Show
                                </a>
                            </div>

                        </div>
                    </div>

                <hr>
                @endif

            @endforeach
        </div>
    </div>
</div>
{{-- <div class="container d-flex justify-content-center mt-3">
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
</div> --}}

@endsection
