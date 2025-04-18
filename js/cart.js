// Get the tbody element
const tbody = document.querySelector('#cart-container tbody');

// Remove all the rows
while (tbody.firstChild) {
  tbody.removeChild(tbody.firstChild);
}
// Get the tbody element
//const tbody = document.querySelector('#cart-container tbody');

// Fetch cart items from the server
fetch('/get-cart-items')
  .then(response => response.json())
  .then(cartItems => {
    // Loop through cart items and add rows to the table
    cartItems.forEach(item => {
      const row = tbody.insertRow();
      row.innerHTML = `
        <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
        <td><img src="${item.image}" alt=""></td>
        <td><h5>${item.name}</h5></td>
        <td><h5>${item.price} Rs</h5></td>
        <td><input class="w-25 pl-1" value="${item.quantity}" type="number"></td>
        <td><h5>${item.total} Rs</h5></td>
      `;
    });
  })
  .catch(error => {
    console.error('Error fetching cart items:', error);
  });
