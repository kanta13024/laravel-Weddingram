@extends('layouts.dashboard')

@section('content')
<h1>Photo List</h1>
<form method="GET" action="{{ route('dashboard.posts.index') }}" class="form-inline">
    並び替え
    <select name="sort" onchange="this.form.submit();" class="form-inline ml-2 form-control">
        @foreach ($sort as $key => $value)
            @if ($sorted == $value)
                <option value="{{ $value }}" selected>{{ $key }}</option>
            @else
                <option value="{{ $value }}">{{ $key }}</option>
            @endif
        @endforeach
    </select>
</form>

<div class="w-75 mt-2">
    <div class="w-75">
        <form method="GET" action="{{ route('dashboard.posts.index') }}">
            <div class="d-flex flex-inline form-group">
                <div class="d-flex align-items-center">
                    Photoの検索
                </div>
                <textarea name="keyword" id="search-posts" class="form-control ml-2 w-50"></textarea>
                <button type="submit" class="btn submit-button text-inline ml-1 mt-4"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>

    <div class="d-flex justify-content-between w-75 mt-4">
        <h3>合計{{ $total_count }}件</h3>
        <a href="{{ route('dashboard.posts.create') }}" class="btn submit-button"><i class="far fa-images"></i> 新規作成</a>
    </div>

    <hr>

    <table class="table table-responsive table-hover mt-5">
        <thead>
            <tr>
                <th scope="col" class="w-10">ID</th>
                <th scope="col" class="w-50">Photo</th>
                <th scope="col" class="w-50">投稿ユーザー</th>
                <th scope="col" class="w-50">Content</th>
                <th scope="col">撮影日</th>
                <th scope="col">Album_Name</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td><img src="{{ asset('storage/posts/'.$post->image) }}" alt="" class="img-fliud w-50"></td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->shooting_time }}</td>
                    <td>{{ $post->wedding_album->name }}</td>
                    <td>
                        <a href="/dashboard/posts/{{ $post->id }}/edit" class="dashboard-edit-link">
                            <i class="far fa-edit"></i>編集
                        </a>
                    </td>
                    <td>
                        {{-- <a href="/dashboard/posts/{{ $post->id }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dashboard-delete-link">
                            <i class="fas fa-trash"></i>削除
                        </a>
                        <form id="logout-form" action="/dashboard/posts/{{ $post->id }}" method="POST" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                        </form> --}}
                        <form action="/posts/{{ $post->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                            <div class="d-flex justify-content-end mt-3">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="w-25 form-control btn"><i class="fas fa-trash"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</div>

@endsection
