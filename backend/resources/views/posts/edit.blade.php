@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-2 mr-5">
        @component('components.sidebar', ['invited_wedding_albums' => $invited_wedding_albums])
        @endcomponent
    </div>

    <div class="col-9">
        <div class="w-75">
            <h1>Edit Photo!! <i class="far fa-images"></i></h1>

            <hr>

            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/posts/'.$post->image) }}" id="post-image-preview" alt="post-image-preview" class="img-fluid w-25">
            </div>

            <hr>
            <form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <small class="mb-3">思い出をシェア</small>
                    <label for="post-image" class="btn submit-button"><i class="fas fa-feather-alt"></i>画像を選択</label>
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
                        @foreach ($invited_wedding_albums as $invited_wedding_album)
                            @if ($invited_wedding_album->id == $post->wedding_album_id)
                                <option value="{{ $invited_wedding_album->id }}" selected>{{ $invited_wedding_album->name }}</option>
                            @else
                                <option value="{{ $invited_wedding_album->id }}">{{ $invited_wedding_album->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="w-25 form-control btn submit-button"><i class="far fa-images"></i>Putin</button>
                </div>
            </form>
            <form action="/posts/{{ $post->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                    <div class="d-flex justify-content-end mt-3">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="w-25 form-control btn btn-secondary"><i class="fas fa-trash"></i>Delete</button>
                    </div>
            </form>
            <a href="/posts"><i class="fas fa-backspace"></i>戻る</a>
        </div>
    </div>
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
