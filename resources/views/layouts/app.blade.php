<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page.title', config('app.name'))</title>
{{--    <title>какая-то херня</title>--}}
    <link rel="icon" href="{{ asset('img/favicon.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="d-flex flex-column min-vh-100">
    @include('includes.header')
    <main class="py-4 flex-grow-1">
        @yield('content')
    </main>
    @include('includes.footer')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js"></script>
<script src="{{ asset('js/functions.js') }}"></script>
<script src="{{ asset('js/cart.js') }}"></script>
<script src="{{ asset('js/main-page.js') }}"></script>
<script src="{{ asset('js/user/cart.js') }}"></script>
@stack('script')
</body>
</html>
