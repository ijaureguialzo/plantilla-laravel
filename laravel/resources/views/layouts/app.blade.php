<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column h-100">

@include('layouts.navbar')

<main class="row flex-grow-1 m-0">
    @include('layouts.sidebar')
    <div class="p-4 col-12 col-sm-10">
        @yield('content')
    </div>
</main>

@include('layouts.footer')

</body>
</html>
