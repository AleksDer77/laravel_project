const basket = document.querySelector('.basket');
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

function showCartQuest() {
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


