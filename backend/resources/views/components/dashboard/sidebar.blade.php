<div class="container ml-3">
    <h2>Album管理</h2>
    <div class="d-flex flex-column">
        <label class="sidebar-album-label">
            <a href="/dashboard/places"><i class="fas fa-church"></i> Place一覧</a>
        </label>
        <label class="sidebar-album-label">
            <a href="/dashboard/wedding_albums"><i class="fas fa-book"></i> WeddingAlbum一覧</a>
        </label>
    </div>

    <h2>Photo管理</h2>
    <div class="d-flex flex-column">
        <label class="sidebar-album-label">
            <a href="/dashboard/posts"><i class="fas fa-images"></i> Photo一覧</a>
        </label>
        <label class="sidebar-album-label">
            <a href="/dashboard/posts/create"><i class="fas fa-images"></i> Photo作成</a>
        </label>
    </div>

    <h2>会員管理</h2>
    <div class="d-flex flex-column">
        <label class="sidebar-album-label">
            <a href="/dashboard/users"><i class="fas fa-users"></i> User一覧</a>
        </label>
    </div>

    <h2>その他</h2>
    <div class="d-flex flex-column">
        <label class="sidebar-album-label">
            <a href="/dashboard/folders/1/tasks"><i class="fas fa-business-time"></i>タスク管理</a>
        </label>
        <label class="sidebar-album-label">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </label>

    </div>
</div>
