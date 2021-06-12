@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2 mr-5">
        @component('components.sidebar',  ['invited_wedding_albums' => $invited_wedding_albums ])
        @endcomponent
    </div>
    <div class="col-9">
        <div class="w-75">

            <h1>WeddingAlbumへの招待</h1>

            <hr>

            <form method="GET" action="/wedding_albums/{{ $wedding_album->id }}/invite">
                <label for="wedding_album-name">Serach..User_Name or ID or Email</label>
                <div class="d-flex flex-inline form-group">
                    <textarea name="keyword" id="search-posts" class="form-control ml-2 "></textarea>
                    <button type="submit" class="btn submit-button text-inline ml-1 mt-4"><i class="fas fa-search"></i></button>
                </div>
            </form>

            <hr>

            @if ($users !== [])
                <div class="text-center bg-success text-white rounded-pill shadow p-3 mb-5">
                    <h3>検索結果</h3>
                </div>
            @endif

            @foreach ($users as $user)
                @if ($user->wedding_albums()->where('wedding_album_id', $wedding_album->id)->exists())
                    <div class="d-flex flex-row">
                        <div class="col-4">
                            <img src="{{ asset('storage/icons/'.$user->icon) }}" alt="" class="img-thumbnail">
                        </div>
                        <div class="col d-flex-column">
                            <h3>{{ $user->name }}</h3>
                            <p>{{ $user->email }}</p>
                            <p>{{ $user->id }}</p>
                            <div class="d-flex justify-content-end">
                                <form action="{{ route('uninvite', $wedding_album) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button class="btn btn-secondary">
                                        <i class="fas fa-user-friends"></i>招待
                                    </button>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-user-slash"></i>取り消し
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @else
                    <div class="d-flex flex-row">
                        <div class="col-4">
                            <img src="{{ asset('storage/icons/'.$user->icon) }}" alt="" class="img-thumbnail">
                        </div>
                        <div class="col d-flex-column">
                            <h3>{{ $user->name }}</h3>
                            <p>{{ $user->email }}</p>
                            <p>{{ $user->id }}</p>
                            <div class="d-flex justify-content-end">
                                <form action="{{ route('invite', $wedding_album) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button class="btn submit-button">
                                        <i class="fas fa-user-friends"></i>招待
                                    </button>
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fas fa-user-slash"></i>取り消し
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endif
            @endforeach

            <h2>{{ $wedding_album->name }}の招待者一覧</h2>

            <hr>

            @foreach ($invited_users as $user)
                <div class="d-flex flex-row">
                    <div class="col-4">
                        <img src="{{ asset('storage/icons/'.$user->icon) }}" alt="" class="img-thumbnail">
                    </div>
                    <div class="col d-flex-column">
                        <h3>{{ $user->name }}</h3>
                        <p>{{ $user->email }}</p>
                        <p>{{ $user->id }}</p>
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('uninvite', $wedding_album) }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button class="btn btn-secondary">
                                    <i class="fas fa-user-friends"></i>招待
                                </button>
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-user-slash"></i>取り消し
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach

        </div>
    </div>
</div>

@endsection
