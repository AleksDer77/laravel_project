@php use Illuminate\Support\Facades\Auth; @endphp
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand {{ active_link('/') }}" href="{{ url('/') }}">
            {{ __('Пиццерия - шмиццерия') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link {{ active_link('login') }}"
                               href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ active_link('register') }}"
                               href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
                <li class="nav-item p-1">
                    <form class="d-flex basket" data-bs-toggle="modal" data-bs-target="#modalCart">
                        @csrf
                        <button class="cart btn btn-outline-secondary btn-sm" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span id="countCart" class="badge bg-secondary text-white ms-1 ">
                                0
                            </span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="modal fade" id="modalCart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Ваш заказ') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-cart">
                        <table class="table table-borderless table-cart">
                            <thead>
                            <tr>
                                <td class=" col-md-3">{{ __('Название') }}</td>
                                <td class="text-center col-md-3">{{ __('Цена') }}</td>
                                <td class="text-center col-md-1">{{ __('Кол-во') }}</td>
                                <td class="text-center">{{ __('Стоимость') }}</td>
                            </tr>
                            </thead>
                            <tbody class="t-body"></tbody>
                            <tr>
                                <td>{{ __('Сумма заказа') }}</td>
                                <td class="sum-order"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="button"
                                class="btn btn-primary">{{ __('Оформить заказ') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</nav>
@if(Auth::user())
    @push('script')
        <script>
            basket.addEventListener('click', showCartUser)

        </script>
    @endpush
@else(Auth::quest())
    @push('script')
        <script>
            renderCount(productsStore.length ?? 0);
            basket.addEventListener('click', showCartQuest)
        </script>
    @endpush
@endif

