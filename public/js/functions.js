const classNameActive = 'products-element__btn_active'
const labelAdd = 'Добавить в корзину'
const labelRemove = 'Удалить из корзины'
let countProduct = 1;

function getProductsId() {
    const items = localStorage.getItem('id_products')
    if (items !== null) {
        return JSON.parse(items)
    }
    return [];
}

function getProducts() {
    const items = localStorage.getItem('countEl')
    if (items !== null) {
        return JSON.parse(items)
    }
    return {};
}
function handleSetLocationStorage(element, id, ) {
    const { pushProduct, products } = putProducts(id);
    if (pushProduct) {
        element.classList.add(classNameActive);
        element.innerHTML = labelRemove;
    } else {
        element.classList.remove(classNameActive);
        element.innerHTML = labelAdd;
    }

    renderCount(products.length);
}

function putProducts(id) {
    let products = getProductsId();
    let pushProduct = false;
    const index = products.indexOf(id);
    let countEl = getProducts();

    if (index === -1) {
        products.push(id);
        pushProduct = true;
        countEl[id] = 1;
    } else {
        products.splice(index, 1);
        delete countEl[id];
    }

    localStorage.setItem('id_products', JSON.stringify(products));
    localStorage.setItem('countEl', JSON.stringify(countEl));
    return { pushProduct, products };
}

function renderCount(count) {
    document.querySelector('#countCart').innerText = count
}

function updateButton(elem) {
    document.querySelector(`[data-id = "${elem}"]`).classList.remove(classNameActive);
    document.querySelector(`[data-id = "${elem}"]`).innerText = labelAdd;
}

