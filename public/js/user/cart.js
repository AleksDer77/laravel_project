
function showCartUser() {
    axios('http://localhost:8080/cart')
        .then(res => {
            let products = res.data;
            console.log(products);
            cart.innerHTML = '';
            products.forEach(({name, cost}) => {
                // let sumOneElement = (cost * countElement).toFixed(2);
                // sum += +sumOneElement;
                cart.innerHTML += `
                     <tr class="elem">
                         <td>${name}</td>
                         <td class="text-center">${cost}</td>
                         <div >
                             <td class="d-flex justify-content-between align-items-center">
                                 <i class="bi bi-dash-circle" ></i>
                                 <span>hello</span>
                                 <i class="bi bi-plus-circle" ></i>
                             </td>
                         </div>
                         <td class="text-center sum-one-element">hello</td>
                         <td><i class="bi bi-trash" ></i></td>
                     </tr>
                 `;

            })
        })
}
