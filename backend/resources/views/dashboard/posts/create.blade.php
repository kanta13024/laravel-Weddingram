@extends('layouts.dashboard')

@section('content')
<div class="w-50">
    <h1>管理人からの写真(Photo from CareTaker)</h1>

    <hr>

    <form method="POST" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-inline mt-4 mb-4 row">
            <label for="post-image" class="col-2 d-flex justify-content-start">Photo</label>
            <input type="file" name="image" id="post-image" class="form-control col-8 ml-2">
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
            <label for="post-user_id" class="col-2 d-flex justify-content-start">user_id</label>
            <input type="number" name="user_id" id="post-user_id" class="form-control col-8 ml-2">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="post-wedding_album_id" class="d-flex justify-content-start">Wedding_Album_Id</label>
            <select name="wedding_album_id" id="post-wedding_album_id" class="form-control col-8">
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
@endsection
