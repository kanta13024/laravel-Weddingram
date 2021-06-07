@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-9">
        <div class="row w-100">
            @foreach ($posts as $post)
                <div class="col-3">
                    <a href="{{ route('posts.show', $post) }}">
                        <img src="{{ asset('storage/posts/' . $post->image ) }}" class="img-thumbnail">
                    </a>
                    <div class="row">
                        <div class="col-12">
                            <p class="post-label mt-2">{{ $post->user->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

@foreach ($posts as $post)
    {{ $post->image }}
    {{ $post->content }}
    {{ $post->shotting_time }}
    <a href="{{ route('posts.show', $post) }}">show</a>
    <a href="{{ route('posts.edit', $post) }}">edit</a>
    <form action="/posts/{{ $post->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">Delete</button>
    </form>
@endforeach

<a href="{{ route('posts.create') }}">New</a>
