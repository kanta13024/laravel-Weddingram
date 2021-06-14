@extends('layouts.dashboard')

@section('content')
<div class="w-75">

    <h1>User Lists</h1>

    <div class="w-75">
        <form method="GET" action="{{ route('dashboard.users.index') }}">
            <div class="d-flex flex-inline form-group">
                <div class="d-flex align-items-center">
                    ID・Name・Email
                </div>
                <textarea name="keyword" id="search-users" class="form-control ml-2 w-50">{{ $keyword }}</textarea>
                <button type="submit" class="btn submit-button text-inline ml-1 mt-4"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>

    <table class="table table-responsive table-hover mt-5">
        <thead>
            <tr>
                <th scope="col" class="w-10">ID</th>
                <th scope="col" class="w-25">Icon</th>
                <th scope="col">Name</th>
                <th scope="col">mail</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="table-hover">
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td><img src="{{ asset('storage/icons/'.$user->icon) }}" class="img-thumbnail"></td>
                    <th>{{ $user->name }}</th>
                    <th>
                        {{ $user->email }}<br>
                        {{ $user->created_at }}
                    </th>
                    <th>
                        @if ($user->deleted_flag)
                            <form action="/dashboard/users/{{ $user->id }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn dashboard-delete-link">
                                    <i class="fas fa-trash-restore-alt"></i>復帰
                                </button>
                            </form>
                        @else
                            <form action="/dashboard/users/{{ $user->id }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn dashboard-delete-link">
                                    <i class="fas fa-trash"></i>削除
                                </button>
                            </form>
                        @endif
                    </th>
                    <th>
                        <a href="/dashboard/users/{{ $user->id }}" class="btn">
                            <i class="fas fa-book-open"></i> Show!!
                        </a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>
@endsection
