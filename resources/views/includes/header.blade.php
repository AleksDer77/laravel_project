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
                    <form class="d-flex" onclick="showProduct()" data-bs-toggle="modal" data-bs-target="#modalCart">
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
                        <button type="button" class="btn btn-secondary" onclick="deleteCart()"
                                data-bs-dismiss="modal">{{ __('Очистить корзину') }}</button>
                        <button onclick="showCount()" type="button"
                                class="btn btn-primary">{{ __('Оформить заказ') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
@push('script')
    <script>
        const cart = document.querySelector('.t-body');


        let sumOrder = document.querySelector('.sum-order');
        sumOrder.innerHTML = 0;


        function deleteOneElement(elem, cost) {
            let sumElement = elem.parentElement.children[1].innerHTML;
            let count = parseInt(sumElement)
            if (count > 1) {
                count -= 1;
                elem.parentElement.children[1].innerHTML = count;
                elem.parentElement.nextElementSibling.innerHTML = (count * cost).toFixed(2);
            } else {
                return;
            }
            viewOrderSum();
        }

        function storeCountElement() {

        }

        function showCount() {
            let count = document.querySelector('#countCart').innerHTML;
            let newCount = parseInt(count);
            count = newCount - 1;
            document.querySelector('#countCart').innerHTML = count;
        }

        function deleteElement(elem, id) {
            let products = getProductsId();
            let index = products.indexOf(id)
            let prod = getProducts();
            delete prod[id];
            products.splice(index, 1);
            localStorage.setItem('countEl', JSON.stringify(prod));
            localStorage.setItem('id_products', JSON.stringify(products));
            elem.parentElement.parentElement.remove();
            showCount();
            viewOrderSum();
            updateButton(id);
        }
        function deleteCart() {
            // localStorage.clear();
            // location.reload();
            document.querySelector('.t-body').remove();
            viewOrderSum();
        }

        function getCountElement(idEl, countElement) {
            let objElem = JSON.parse(localStorage.getItem('countEl'))
            console.log(objElem);
            console.log(idEl);
            console.log(countElement);
        }

        function addElement(elem, idEl, cost) {
            let sumElement = elem.parentElement.children[1].innerHTML;
            console.log(`сумма начальная ${sumElement}`)
            let count = parseInt(sumElement) + 1
            elem.parentElement.children[1].innerHTML = count;
            elem.parentElement.nextElementSibling.innerHTML = (cost * count).toFixed(2);

            let objEl = JSON.parse(localStorage.getItem('countEl'))
            objEl[idEl] = count;
            localStorage.setItem('countEl', JSON.stringify(objEl))
            viewOrderSum();
        }

        function viewOrderSum() {
            let sum = document.querySelectorAll('.sum-one-element');
            let orderSum = 0;
            Array.from(sum).forEach((key) => {
                orderSum += Number(key["innerHTML"]);
            })
            sumOrder.innerHTML = orderSum.toFixed(2);

        }

        function showProduct() {
            let allProducts = JSON.parse(localStorage.getItem('products'));
            let idProducts = getProductsId();
            let products = [];

            let countsObj = JSON.parse(localStorage.getItem('countEl'))
            allProducts.forEach(({id, name, cost}) => {
                if (idProducts.includes(id)) {
                    products.push({id: id, name: name, cost: cost, countElement: countsObj[id] ?? countProduct,})
                }
            })
            let sum = 0;
            cart.innerHTML = '';
            products.forEach(({name, cost, id, countElement}) => {
                let sumOneElement = (cost * countElement).toFixed(2);
                sum += +sumOneElement;
                cart.innerHTML += `
                    <tr class="elem">
                        <td>${name}</td>
                        <td class="text-center">${cost}</td>
                        <div >
                            <td class="d-flex justify-content-between align-items-center">
                                <i class="bi bi-dash-circle" role="button" onclick="deleteOneElement(this, ${cost})"></i>
                                <span>${countElement}</span>
                                <i class="bi bi-plus-circle" role="button" onclick="addElement(this, ${id}, ${cost})"></i>
                            </td>
                        </div>
                        <td class="text-center sum-one-element">${sumOneElement}</td>
                        <td><i class="bi bi-trash" role="button" onclick="deleteElement(this, ${id})"></i></td>
                    </tr>
                `;
            })
            sumOrder.innerHTML = sum.toFixed(2);
        }

    </script>
@endpush
