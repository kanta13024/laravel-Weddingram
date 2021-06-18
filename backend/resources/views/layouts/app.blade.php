<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{mix('js/app.js')}}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" integrity="sha384-haqrlim99xjfMxRP6EWtafs0sB1WKcMdynwZleuUSwJR0mDeRYbhtY+KPMr+JL6f" crossorigin="anonymous"></script>
    <!-- flatpickrスクリプト -->
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <!-- 日本語化のための追加スクリプト -->
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- デフォルトのスタイルシート -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- ブルーテーマの追加スタイルシート -->
    <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/wedinstgram.css') }}">
</head>
<body>
    <div id="app">
        @component('components.header')
        @endcomponent

        <main class="py-4 mb-5">
            @yield('content')
        </main>

        @component('components.footer')
        @endcomponent
    </div>
</body>
</html>
