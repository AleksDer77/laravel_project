<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')
<body>
    @yield('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js"></script>
<script src="{{ asset('js/functions.js') }}"></script>
@stack('script')
</body>
</html>
