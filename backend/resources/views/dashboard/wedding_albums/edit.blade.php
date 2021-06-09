@extends('layouts.dashboard')

@section('content')
<div class="w-75">
    <h1>Wedding_Album update...</h1>

    <form method="POST" action="/dashboard/wedding_albums/{{ $wedding_album->id }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="wedding_album-name"><i class="fas fa-book"></i> Album_Name</label>
            <input type="text" name="name" id="wedding_album-name" class="form-control" value="{{ $wedding_album->name }}">
        </div>
        <div class="form-group">
            <label for="wedding_album-event_date">挙式日</label>
            <input type="date" name="event_date" id="wedding_album-event_date" class="form-control" value="{{ $wedding_album->event_date }}">
        </div>
        <div class="form-group">
            <label for="wedding_album-place">結婚式の場所</label>
            <input type="text" name="place" id="wedding_album-place" class="form-control" value="{{ $wedding_album->place }}">
        </div>
        <button type="submit" class="btn submit-button">Update</button>
    </form>
</div>
@endsection
