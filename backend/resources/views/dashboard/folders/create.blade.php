@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="panel panel-default">
                <div class="panel-heading">
                    <h1>フォルダを追加する</h1>
                </div>
                <hr>
                <div class="panel-body">

                    <form action="/dashboard/folders/create" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">フォルダ名</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i>Send</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
