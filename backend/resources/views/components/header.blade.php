<nav class="navbar navbar-expand-md navbar-light header-container bg-white shadow-sm">
    <a href="{{ url('/') }}" class="navbar-brand ml-4">
        {{ config('app.name', 'Laravel') }}
    </a>
    {{-- <form class="form-inline" action="#">
        <div class="form-group">
            <input type="text" class="header-serach" >
        </div>
        <div class="input-group">
            <button type="submit" class="btn header-search-button"><i class="fas fa-search header-search-icon"></i></button>
        </div>
    </form> --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto mr-5">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item mr-5">
                    <a href="{{ route('register') }}" class="nav-link">新規登録</a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                </li>
                <hr>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}"><i class="far fa-heart"></i></a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-camera"></i></a>
                </li>
            @else
                <li class="nav-item dropdown mr-5">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a class="dropdown-item" href="{{ route('mypage') }}">
                            <i class="fas fa-user mr-1"></i><label>マイページ</label>
                        </a>
                    </div>
                </li>
                <li class="nav-item mr-5">
                    <a href="{{ route('mypage.favorite') }}" class="nav-link">
                        <i class="far fa-heart"></i>
                    </a>
                </li>
                <li class="nav-item mr-5">
                    <a href="{{ route('posts.create') }}" class="nav-link">
                        <i class="fas fa-camera"></i>
                    </a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
