@extends('layouts.app')

@section('content')
<div class="container">
    <h1>投稿編集</h1>

    <hr>

    <div class="d-flex justify-content-center">
        <img src="{{ asset('storage/posts/dummy.png') }}" alt="" class="img-fluid w-25">
    </div>

    <hr>

    <form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <small class="mb-3">思い出をシェア</small>
            <label for="post-image" class="btn submit-button">画像を選択</label>
            <input type="file" for="post-image" name="image" id="post-image" onChange="handleImage(this.files)" style="display: none;">
        </div>
        <div class="form-group">
            <label for="post-content">コメント</label>
            <textarea name="content" id="post-content" class="form-control">{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="post-wedding_album">アルバム</label>
            <select name="wedding_album_id" class="form-control">
                @foreach ($wedding_albums as $wedding_album)
                    @if ($wedding_album->id == $post->wedding_album_id)
                        <option value="{{ $wedding_album->id }}" selected>{{ $wedding_album->name }}</option>
                    @else
                        <option value="{{ $wedding_album->id }}">{{ $wedding_album->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="post-shooting_time">撮影の時期</label>
            <input type="date" name="shooting_time" class="form-control">
        </div>
        <button type="submit" class="btn submit-button">Update!</button>
    </form>
    <a href="/posts" class="">マイページへ</a>
</div>
@endsection
