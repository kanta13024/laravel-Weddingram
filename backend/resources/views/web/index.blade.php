@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2">
        @component('components.sidebar',  ['invited_wedding_albums' => $invited_wedding_albums ])
        @endcomponent
    </div>
    <div class="col-9">
        <h1>Recommend</h1>
        <div class="row">
            @foreach ($random_release_posts as $random_release_post)
                <div class="col-4">
                    <a href="/posts/{{ $random_release_post->id }}">
                        <img src="{{ asset('storage/posts/'.$random_release_post->image) }}" class="img-thumbnail">
                    </a>
                </div>
            @endforeach
        </div>

        <h1>New</h1>
        <div class="row">
            @foreach ($latest_release_posts as $latest_release_post)
                <div class="col-3">
                    <a href="/posts/{{ $latest_release_post->id }}">
                        <img src="{{ asset('storage/posts/'.$latest_release_post->image) }}" alt="" class="img-thumbnail">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
