@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="row w-75">
        <div class="col-5 offset-1">
            <img src="{{ asset('storage/posts/' . $post->image) }}" alt=" " class="w-100 img-fuild">
        </div>
        <div class="col">
            <div class="d-flex flex-column">
                <h1 class="">
                    {{ $user->name }}
                </h1>
                <hr>
                <p class="">
                    {{ $post->content }}
                </p>
                <hr>
                <p>
                    {{ $post->shooting_time }}
                </p>
                <hr>
            </div>
            @auth
                <form method="POST" class="m-3 align-items-end" action="#">
                    {{ csrf_field() }}
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="form-group row">
                        <div class="col-7">
                            <div class="btn submit-button w-100">
                                <i class="fas fa-backspace"></i>
                                <a href="/posts/" class="text-white">
                                    戻る
                                </a>
                            </div>
                        </div>
                        <div class="col-5">
                            @if ($post->isFavoritedBy(Auth::user()))
                                <a href="/posts/{{ $post->id }}/favorite" class="btn favorite-button text-favorite w-100">
                                    <i class="fa fa-heart"></i>
                                    お気に入り解除
                                </a>
                            @else
                                <a href="/posts/{{ $post->id }}/favorite" class="btn favorite-button text-favorite w-100">
                                    <i class="fa fa-heart"></i>
                                    お気に入り
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            @endauth
        </div>

        <div class="offset-1 col-11">
            <hr class="w-100">
            <h3 class="float-left">レスポンス</h3>
        </div>

        <div class="offset-1 col-10">
            <div class="row">

                @foreach ($comments as $comment)
                    <div class="row mb-4">
                        <div class="col-5 offset-1">
                            <img src="{{ asset('storage/icons/' . $comment->user->icon) }}" alt=" " class="w-50 img-fuild">
                        </div>
                        <div class="col">
                            <p class="h3">{{ $comment->user->name }}</p>
                            <p class="h3">{{ $comment->content }}</p>
                            <label for="comment_created_time">{{ $comment->created_at }}</label>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>

            <hr>

            @auth
                <div class="row">
                    <div class="col-5 offset-1">
                        <img src="{{ asset('storage/icons/' . $user->icon) }}" alt=" " class="w-50 img-fuild img-rounded">
                    </div>
                    <div class="col">
                        <form method="POST" action="/posts/{{ $post->id }}/comments">
                            {{ csrf_field() }}
                            <textarea name="content" class="form-control m-2" ></textarea>
                            <button type="submit" class="btn submit-button ml-2">レスポンスする</button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection


{{-- <img src="{{ asset('storage/posts/' . $post->image) }}" alt="" class="img-thumbnail">
{{ $post->content }}
{{ $post->shooting_time }}
{{ $user->name }} --}}
