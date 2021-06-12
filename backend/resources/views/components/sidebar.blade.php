<div class="container">
    @auth
        <a href="{{ route('posts.index') }}"><h4><i class="far fa-images"></i>Photo一覧</h5></a>
    @endauth



    @foreach ($invited_wedding_albums as $invited_wedding_album)
        @auth
            <h5><i class="fas fa-church"></i>{{ $invited_wedding_album->place }}</h5>
            <label for="sidebar-local">
                <a href="{{ route('posts.index', ['wedding_album' => $invited_wedding_album->id]) }}">
                    {{ $invited_wedding_album->name }}
                </a>
            </label>
        @endauth
    @endforeach
</div>
