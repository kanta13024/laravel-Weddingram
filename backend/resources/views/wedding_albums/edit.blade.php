@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2 mr-5">
        @component('components.sidebar',  ['invited_wedding_albums' => $invited_wedding_albums ])
        @endcomponent
    </div>
    <div class="col-9">
        <div class="w-75">

            <h1><i class="fas fa-book-reader"></i>Wedding_Album Update!</h1>

            <hr>

            <form method="POST" action="/wedding_albums/{{ $wedding_album->id }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="wedding_album-name">アルバム名（結婚式の名前）</label>
                    <input type="text" name="name" id="wedding_album-name" class="form-control" value="{{ $wedding_album->name }}">
                </div>
                <div class="form-group">
                    <label for="wedding_album-place">結婚式の場所</label>
                    <select name="place_id" id="wedding_album-place_id" class="form-control">
                        @foreach ($places as $place)
                            @if ($place->id == $wedding_album->place_id)
                                <option value="{{ $place->id }}" selected>{{ $place->name }}</option>
                            @else
                                <option value="{{ $place->id }}">{{ $place->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="wedding_album-event_date">挙式日</label>
                    <input type="date" name="event_date" class="form-control" value="{{ $wedding_album->event_date }}">
                </div>
                <button type="submit" class="btn submit-button"><i class="far fa-edit"></i>Update!</button>
            </form>

            <hr>



            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col" class="w-10">ID</th>
                        <th scope="col">場所</th>
                        <th scope="col">アルバム名</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invited_wedding_albums as $wedding_album)
                        <tr>
                            <th scope="row">{{ $wedding_album->id }}</th>
                            <td>{{ $wedding_album->place }}</td>
                            <td>{{ $wedding_album->name }}</td>
                            <td>
                                <a href="/wedding_albums/{{ $wedding_album->id }}/edit">
                                    <i class="far fa-edit"></i>編集
                                </a>
                            </td>
                            <td>
                                <a href="/wedding_albums/{{ $wedding_album->id }}/invite">
                                    <i class="fas fa-user-friends"></i>招待
                                </a>
                            </td>
                            <td>
                                <a href="/wedding_albums/{{ $wedding_album->id }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dashboard-delete-link">
                                    <i class="fas fa-trash"></i>削除
                                </a>
                                <form id="logout-form" action="/wedding_albums/{{ $wedding_album->id }}" method="POST" style="display: none;">
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
