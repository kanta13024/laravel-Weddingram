@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2">
        @component('components.sidebar',  ['invited_wedding_albums' => $invited_wedding_albums ])
        @endcomponent
    </div>
    <div class="col-9">
        <h1>Recommend</h1>
        <div class="row">
            <div class="col-4">
                <a href="#">
                    <img src="{{ asset('storage/posts/sample.jpg') }}" alt="" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="post-label mt-2">
                            場所場所場所<br>
                            <label>時期直々</label>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <a href="#">
                    <img src="{{ asset('storage/posts/sample.jpg') }}" alt="" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="post-label mt-2">
                            場所場所ばしょ<br>
                            <label>直々直々</label>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <a href="#">
                    <img src="{{ asset('storage/posts/sample.jpg') }}" alt="" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="post-label mt-2">
                            場所場所場所<br>
                            <label>じきじき</label>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <h1>New</h1>
        <div class="row">
            <div class="col-3">
                <a href="#">
                    <img src="{{ asset('storage/posts/sample.jpg') }}" alt="" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="product-label mt-2">
                            placeplaceplace
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <a href="#">
                    <img src="{{ asset('storage/posts/sample.jpg') }}" alt="" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="product-label mt-2">
                            placeplaceplace
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <a href="#">
                    <img src="{{ asset('storage/posts/sample.jpg') }}" alt="" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="product-label mt-2">
                            placeplaceplace
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <a href="#">
                    <img src="{{ asset('storage/posts/sample.jpg') }}" alt="" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="product-label mt-2">
                            placeplaceplace
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
