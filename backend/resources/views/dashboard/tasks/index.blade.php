@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-md-4">
            <nav class="panel panel-default">
                <div class="panel-heading rounded">フォルダ</div>
                <div class="panel-body">
                    <a href="/dashboard/folders/create" class="btn submit-button btn-block mb-1">
                        フォルダを追加
                    </a>
                </div>
                <div class="list-group d-flex justify-content-between">
                    @foreach ($folders as $folder)
                        <a href="/dashboard/folders/{{ $folder->id }}/tasks" class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}">
                            {{ $folder -> title }}
                        </a>
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="column col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">タスク</div>
                <div class="panel-body">
                    <div class="text-right">
                        <a href="tasks/create" class="btn btn-info btn-block mb-1 text-white">
                            タスクを追加する
                        </a>
                    </div>
                </div>
                <table class="table table-info table-striped">
                    <thead>
                        <tr>
                            <th scope="col">タイトル</th>
                            <th scope="col">状態</th>
                            <th scope="col">期限</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>
                                    <span class="label p-2 {{ $task->status_class }} text-white">{{ $task->status_label }}</span>
                                </td>
                                <td>{{ $task->formatted_due_date }}</td>
                                <td><a href="tasks/{{ $task->id }}/edit"><i class="fas fa-business-time"></i>編集</a></td>
                                <td>
                                    <form action="/dashboard/folders/{{ $current_folder_id }}/tasks/{{ $task->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <div class="d-flex justify-content-end mt-3">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" value="{{ $task->id }}">
                                            <button type="submit" class="w-25 form-control btn"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
