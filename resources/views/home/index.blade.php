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
@push('script')
    <script>
        let html = document.querySelector('.products-items');
        let productsStore = getProductsId();
        renderCount(productsStore.length ?? 0);

       function renderMainPage() {
           axios('http://localhost:8080/products')
               .then(res => {
                   let products = res.data;
                   localStorage.setItem('products', JSON.stringify(products));
                   products.forEach(({name, cost, id, image}) => {
                       let activeClass = '';
                       let activeText = '';

                       if (productsStore.indexOf(id) === -1) {
                           activeText = labelAdd;
                       } else {
                           activeClass = classNameActive;
                           activeText = labelRemove;
                       }

                       html.innerHTML += `
                         <div class="col-lg-3 col-sm-6 my-3 d-flex justify-content-center">
                             <div class="card mb-3" style="width: 16rem; ">
                                 <h5 class="card-title py-3">${name}</h5>
                                 <img src="${image}" class="card-img-top" alt="...">
                                 <div class="card-body">
                                 <p class="card-text">⚡️${cost} &#8381</p>
                                 <button class="products-element__btn ${activeClass}" data-id = ${id} onclick="handleSetLocationStorage(this, ${id})" type="button">${activeText}</button>
                             </div>
                         </div>
                    `;
                   })
               });
       }
       renderMainPage();

    </script>
@endpush
