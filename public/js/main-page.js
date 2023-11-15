let html = document.querySelector('.products-items');



function renderMainPage() {
    axios('http://localhost:8080/products')
        .then(res => {
            let products = res.data;
            console.log(products);
            console.log(res);
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
