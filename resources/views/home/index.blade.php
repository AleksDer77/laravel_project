@extends('layouts.app')
@section('content')
    <div class="text-center">
        <a href="{{ route('admin') }}">{{ __('admin') }}</a>
        <h1 class="d-inline">Главная</h1>
        <section class="main-container">
            <div class="container">
                <div class="row products-items">
                </div>
            </div>
        </section>

    </div>
@endsection
@if(Auth::user())
    @push('script')
        <script>
            localStorage.clear();
            renderMainPage();
        </script>
    @endpush
@else(Auth::quest())
    @push('script')
        <script>
            renderMainPage();
        </script>
    @endpush
@endif
