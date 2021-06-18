@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
            <div class="panel-heading">
                <h1>タスクを追加する</h1>
                <hr>
            </div>
            <div class="panel-body">
                <form action="/dashboard/folders/{{ $folder_id }}/tasks/create" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="due_date">期限</label>
                        <input type="date" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') }}">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary shadow-sm"><i class="far fa-edit"></i>Send</button>
                    </div>
                </form>
            </div>
        </nav>
    </div>
</div>
@endsection

@section('customJS')
@endsection
