@extends('layouts.dashboard')

@section('content')
<div class="w-75">

    <h1>WeddingAlbumの一覧</h1>
    <hr>

    <form method="GET" action="{{ route('dashboard.wedding_albums.index') }}">
        <label for="wedding_album-name">Serach..Album_Name or ID or Place</label>
        <div class="d-flex flex-inline form-group">
            <textarea name="keyword" id="search-posts" class="form-control ml-2 "></textarea>
            <button type="submit" class="btn submit-button text-inline ml-1 mt-4"><i class="fas fa-search"></i></button>
        </div>
    </form>

    <form method="GET" action="{{ route('dashboard.wedding_albums.index') }}">
        <label for="weedding_album-name">Index..Album_EventDate or CreateDate</label>
        <select name="sort" onChange="this.form.submit();" class="form-control ml-2" id="">
            @foreach ($sort as $key => $value)
                @if ($sorted == $value)
                    <option value="{{ $value }}" selected>{{ $key }}</option>
                @else
                    <option value="{{ $value }}">{{ $key }}</option>
                @endif
            @endforeach
        </select>
    </form>

    <div class="d-flex justify-content-between w-75 mt-4">
        <h3>合計 {{ $total_count }}件</h3>
    </div>

    <hr>

    <form method="POST" action="/dashboard/wedding_albums">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="wedding_album-name">アルバム名（結婚式の名前）</label>
            <input type="text" name="name" id="wedding_album-name" class="form-control" placeholder="Kenji&Kenji wedding">
        </div>
        <div class="form-group">
            <label for="wedding_album-place">結婚式の場所</label>
            <select name="place_id" id="wedding_album-place_id" class="form-control">
                @foreach ($places as $place)
                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="wedding_album-event_date">挙式日</label>
            <input type="date" name="event_date" class="form-control">
        </div>
        <button type="submit" class="btn submit-button">＋新規作成</button>
    </form>

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
            @foreach ($wedding_albums as $wedding_album)
                <tr>
                    <th scope="row">{{ $wedding_album->id }}</th>
                    <td>{{ $wedding_album->place }}</td>
                    <td>{{ $wedding_album->name }}</td>
                    <td>
                        <a href="/dashboard/wedding_albums/{{ $wedding_album->id }}/edit">
                            <i class="far fa-edit"></i>編集
                        </a>
                    </td>
                    <td>
                        <a href="/dashboard/wedding_albums/{{ $wedding_album->id }}/invite">
                            <i class="fas fa-user-friends"></i>招待
                        </a>
                    </td>
                    <td>
                        <a href="/dashboard/wedding_albums/{{ $wedding_album->id }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dashboard-delete-link">
                            <i class="fas fa-trash"></i>削除
                        </a>
                        <form id="logout-form" action="/dashboard/wedding_albums/{{ $wedding_album->id }}" method="POST" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $wedding_albums->links() }}
</div>
@endsection
