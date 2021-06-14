@extends('layouts.dashboard')

@section('content')
<div class="w-75">

    <h1>Place_Lists</h1>

    <hr>

    <form method="POST" action="/dashboard/places">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="place-name">Place_Name</label>
            <input type="text" name="name" id="place-name" class="form-control" required="required">
        </div>
        <div class="form-group">
            <label for="place-address">Address</label>
            <input type="text" name="address" id="place-address" class="form-control" required="required">
        </div>
        <div class="form-group">
            <label for="place-description">Description</label>
            <textarea name="description" id="place-description" class="form-control" required="required"></textarea>
        </div>
         <button type="submit" class="btn submit-button"><i class="fas fa-church"></i>新規作成</button>
    </form>

    <hr>

    <table class="table table-responsive table-hover mt-5">
        <thead>
            <tr>
                <th scope="col" class="w-10">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col" class="w-25">Description</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($places as $place)
                <tr>
                    <th scope="row">{{ $place->id }}</th>
                    <td>{{ $place->name }}</td>
                    <td>{{ $place->address }}</td>
                    <td>{{ $place->description }}</td>
                    <td>
                        <a href="/dashboard/places/{{ $place->id }}/edit">
                            <i class="far fa-edit"></i>編集
                        </a>
                    </td>
                    <td>
                        <form action="/dashboard/places/{{ $place->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn dashboard-delete-link">
                                <i class="fas fa-trash"></i>削除
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $places->links() }}
</div>
@endsection
