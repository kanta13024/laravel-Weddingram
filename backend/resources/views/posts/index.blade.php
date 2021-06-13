@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-2">
        @component('components.sidebar',  ['invited_wedding_albums' => $invited_wedding_albums ])
        @endcomponent
    </div>

    <div class="col-9">
        <div class="container">
            @if ($wedding_album !== null)
                <a href="/">トップ</a> > <a href="#">{{ $wedding_album->place }}</a> > {{ $wedding_album->name }}
                <h1>{{ $wedding_album->name }}のアルバム{{ $posts->count() }}枚</h1>

                <form method="GET" action="{{ route('posts.index') }}" class="form-inline">
                    <input type="hidden" name="wedding_album" value="{{ $wedding_album->id }}">
                    並び替え
                    <select name="sort" onChange="this.form.submit();" class="form-inline ml-2">
                        @foreach ($sort as $key => $value)
                            @if ($sorted == $value)
                                <option value="{{ $value }}" selected>{{ $key }}</option>
                            @else
                                <option value="{{ $value }}">{{ $key }}</option>
                            @endif
                        @endforeach
                    </select>
                </form>
            @endif
        </div>
        <div class="row w-100">
            @foreach ($invited_wedding_albums as $invited_wedding_album)
                @foreach ($invited_wedding_album->posts as $post)
                    <div class="col-3">
                        <a href="{{ route('posts.show', $post->id) }}">
                            <img src="{{ asset('storage/posts/' . $post->image ) }}" class="img-thumbnail">
                        </a>
                        <div class="row">
                            <div class="col-12">
                                <p class="post-label mt-2">{{ $post->user->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            @endforeach
        </div>
        <div class="d-flex justify-content-between">
            <div class="">
                {{ $posts->links() }}
            </div>

            <a href="{{ route('posts.create') }}" class="btn submit-button"><i class="far fa-images"></i>New</a>
        </div>


    </div>

</div>

@endsection

{{-- @foreach ($posts as $post)
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

<a href="{{ route('posts.create') }}">New</a> --}}
