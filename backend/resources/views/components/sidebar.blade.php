<div class="container">
    @foreach ($wedding_places as $wedding_place)
        <h5>{{ $wedding_place }}</h5>
        @auth
            @foreach ($wedding_albums as $wedding_album)
                @if ($wedding_album->place == $wedding_place)
                    <label class="sidebar-category">
                        <a href="{{ route('posts.index', ['wedding_album' => $wedding_album->id ]) }}">{{ $wedding_album->name }}</a>
                    </label>
                @endif
            @endforeach
        @endauth
    @endforeach
</div>
