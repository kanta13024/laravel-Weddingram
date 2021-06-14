@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-2 mr-5">
        @component('components.sidebar',  ['invited_wedding_albums' => $invited_wedding_albums ])
        @endcomponent
    </div>

    <div class="col-9">
        <div class="w-75">
            <h1>"<i class="far fa-images"></i>New Post!!"</h1>

            <hr>

            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/posts/dummy.png') }}" id="post-image-preview" class="img-fluid w-25">
            </div>

            <hr>

            <form method="POST" action="/posts" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <small class="mb-3">思い出をシェア</small>
                    <label for="post-image" class="btn submit-button"><i class="fas fa-feather-alt"></i>画像を選択</label>
                    <input type="file" name="image" id="post-image" required="required" onChange="handleImage(this.files)" style="display: none;">
                </div>
                <div class="form-group">
                    <label for="post-content">テキスト</label>
                    <textarea name="content" id="post-content" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="post-shooting_time">撮影の時期</label>
                    <input type="date" name="shooting_time" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="post-wedding_album_id">Select Wedding</label>
                    <select name="wedding_album_id" class="form-control" required="required">
                        @foreach ($invited_wedding_albums as $invited_wedding_album)
                            <option value="{{ $invited_wedding_album->id }}">{{ $invited_wedding_album->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="release_flag" id="post-release" class="form-check-input">
                    <label for="post-release"><i class="fas fa-home"></i>Release..??</label>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="w-25 form-control btn submit-button"><i class="far fa-images"></i>Putin</button>
                </div>
            </form>
            <a href="/posts">マイページへ</a>
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

