@extends('layouts.dashboard');

@section('content')
<div class="w-75">

    <h1>Places_Editer</h1>

    <hr>

    <form method="POST" action="/dashboard/places/{{ $place->id }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="place-name">Name</label>
            <input type="text" name="name" id="place-name" class="form-control" value="{{ $place->name }}">
        </div>
        <div class="form-group">
            <label for="place-address">Address</label>
            <input type="text" name="address" id="place-address" class="form-control" value="{{ $place->address }}">
        </div>
        <div class="form-group">
            <label for="place-description">Description</label>
            <textarea name="description" id="place-description" class="form-control">{{ $place->description }}</textarea>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="w-25 btn submit-button"><i class="fas fa-edit"></i>Update</button>
        </div>
    </form>
</div>
@endsection
