@extends('layouts.dashboard')

@section('content')
<div class="w-50">
    <h1>管理人からの写真(Photo from CareTaker)</h1>

    <hr>

    <div class="d-flex justify-content-center">
        <img src="{{ asset('storage/posts/dummy.png') }}" id="post-image-preview" class="img-fluid w-25">
    </div>

    <form method="POST" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-inline mt-4 mb-4 row">
            <label for="post-image" class="btn submit-button"><i class="far fa-images"></i>Photo</label>
            <input type="file" name="image" id="post-image" onChange="handleImage(this.files)" style="display: none;" required>
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="post-content" class="col-2 d-flex justify-content-start">Content</label>
            <input type="text" name="content" id="post-content" class="form-control col-8 ml-2" row='10'>
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="post-shooting_time" class="d-flex justify-content-start">Shooting_time</label>
            <input type="date" name="shooting_time" id="post-shooting_time" class="form-control col-8 ml-2">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="post-user_id" class="d-flex justify-content-start"><i class="far fa-user"></i>User_Name</label>
            <select name="user_id" id="post-user_id" class="form-control col-8">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="post-wedding_album_id" class="d-flex justify-content-start">Wedding_Album_Id</label>
            <select name="wedding_album_id" id="post-wedding_album_id" class="form-control">
                @foreach ($wedding_albums as $wedding_album)
                    <option value="{{ $wedding_album->id }}">{{ $wedding_album->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="w-25 btn submit-button">+新規作成</button>
        </div>
    </form>

    <div class="d-flex justify-content-end">
        <a href="/dashboard/posts">Photo Lists</a>
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
