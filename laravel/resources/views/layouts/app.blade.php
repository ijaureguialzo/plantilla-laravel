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

<main class="d-flex flex-grow-1">
    @include('layouts.sidebar')
    <div class="container-fluid p-4">
        @yield('content')
    </div>
</main>

@include('layouts.footer')

</body>
</html>
