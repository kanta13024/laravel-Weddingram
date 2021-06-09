@extends('layouts.app')

@section('content')
<div class="container">
    <h1>新しい投稿</h1>

    <hr>

    <div class="d-flex justify-content-center">
        <img src="{{ asset('storage/posts/dummy.png') }}" id="post-image-preview" class="img-fluid w-25">
    </div>

    <hr>

    <form method="POST" action="/posts" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <small class="mb-3">思い出をシェア</small>
            <label for="post-image" class="btn submit-button">画像を選択</label>
            <input type="file" name="image" id="post-image" onChange="handleImage(this.files)" style="display: none;">
        </div>
        <div class="form-group">
            <label for="post-content">テキスト</label>
            <textarea name="content" id="post-content" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="post-shooting_time">撮影の時期</label>
            <input type="date" name="shooting_time" class="form-control">
        </div>
        <div class="form-group">
            <label for="post-wedding_album_id">Select Wedding</label>
            <select name="wedding_album_id" class="form-control">
                @foreach ($wedding_albums as $wedding_album)
                    <option value="{{ $wedding_album->id }}">{{ $wedding_album->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="form-control btn submit-button">Putin</button>
    </form>
    <a href="/posts">マイページへ</a>
</div>

<script type="text/javascript">
    function handleImage(image) {
        let reader = new FileReader();
        reader.onload = function() {
            let imagePreview = document.getElementById('post-image-preview');
            imagePreview.src = reader.result;
        }
        console.log(image);
        reader.readAsDataURL(image[0]);
    }
</script>
@endsection

