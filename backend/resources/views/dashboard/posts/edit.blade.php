@extends('layouts.dashboard')

@section('content')
<div class="w-50">
    <h1>Photo Editer</h1>

    <hr>

    <div class="d-flex justify-content-center">
        <img src="{{ asset('storage/posts/dummy.png') }}" id="post-image-preview" class="img-fluid w-25">
    </div>

    <form method="POST" action="/dashboard/posts/{{ $post->id }}" class="md-5" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-inline mt-4 mb-4 row">
            <label for="post-image" class="btn submit-button"><i class="far fa-images"></i>Photo_update</label>
            <input type="file" name="image" id="post-image" onChange="handleImage(this.files)" style="display: none;">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="post-content" class="col-2 d-flex justify-content-start">Content</label>
            <input type="text" name="content" id="post-content" class="form-control col-8" value="{{ $post->content }}">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="post-shooting-time" class="col-2 d-flex justify-content-start">撮影時期</label>
            <input type="date" name="shooting_time" id="post-shooting_time" class="form-control col-8" value="{{ $post->shooting_time }}" >
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="post-user_id" class="col-2 d-flex justify-content-start"></label>
            <input type="hidden" name="user_id" id="post-user_id" value="{{ $post->user_id }}">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="post-wedding_album_id">album_name</label>
            <select name="wedding_album_id" id="post-wedding_albumu_id" class="form-control">
                @foreach ($wedding_albums as $wedding_album)
                    @if ($wedding_album->id == $post->wedding_album_id)
                        <option value="{{ $wedding_album->id }}" selected>{{ $wedding_album->name }}</option>
                    @else
                        <option value="{{ $wedding_album->id }}">{{ $wedding_album->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="w-25 btn submit-button">Update</button>
        </div>
    </form>
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
