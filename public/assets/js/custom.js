// custom.js

function updateQuantity(productId, change) {
    var quantityField = document.getElementById('quantity-' + productId);
    var currentQuantity = parseInt(quantityField.value);
    var newQuantity = currentQuantity + change;

    // Ensure quantity does not go below zero (or adjust as needed)
    if (newQuantity < 0) {
        newQuantity = 0;
    }

    // Update the input field with the new quantity
    quantityField.value = newQuantity;

    // Example AJAX request (optional)
    /*
    axios.post('/update-quantity', {
        productId: productId,
        quantity: newQuantity
    })
    .then(function (response) {
        console.log(response);
        // Handle successful response if needed
    })
    .catch(function (error) {
        console.log(error);
        // Handle error if needed
    });
    */
}
