function redirectToOverview() {
    window.location.href = '../Productoverzicht/index.php';
}

document.addEventListener('DOMContentLoaded', function () {
    const paymentMethod = document.querySelectorAll('input[name="payment_method"]');
    const banksDropdown = document.getElementById('banks');

    paymentMethod.forEach(method => {
        method.addEventListener('change', function () {
            if (this.value === 'ideal') {
                banksDropdown.style.display = 'block';
            } else {
                banksDropdown.style.display = 'none';
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const paymentMethod = document.querySelectorAll('input[name="payment_method"]');
    const banksDropdown = document.getElementById('banks');

    paymentMethod.forEach(method => {
        method.addEventListener('change', function () {
            if (this.value === 'ideal') {
                banksDropdown.style.display = 'block';
            } else {
                banksDropdown.style.display = 'none';
            }

            // Add a call to clearCart function when a payment method is selected
            clearCart();
        });
    });

    function clearCart() {
        // Make an AJAX request to clear-cart.php
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        console.log(response.message); // Log the success message
                    } else {
                        console.error('Failed to clear cart'); // Log an error message
                    }
                } else {
                    console.error('Failed to clear cart'); // Log an error message
                }
            }
        };

        xhr.open('GET', 'clear-cart.php', true);
        xhr.send();
    }
});

// cart logic

$(document).ready(function () {
    $('.button-increment').click(function (e) {
        e.preventDefault();
        updateQuantity($(this), 1);
    });

    $('.button-decrement').click(function (e) {
        e.preventDefault();
        updateQuantity($(this), -1);
    });

    $('.input-qty').on('input', function () {
        updateTotalCost();
    });
});

function updateQuantity(element, change) {
    var quantityInput = element.closest('.product-data').find('.input-qty');
    var currentQuantity = parseInt(quantityInput.val());
    var newQuantity = currentQuantity + change;

    // Ensure the quantity is not less than 1 and not more than 99
    newQuantity = Math.min(99, Math.max(1, newQuantity));

    quantityInput.val(newQuantity);
    updateTotalCost();
}

function updateTotalCost() {
    let totalPrice = 0;

    $('.product-data').each((_, obj) => {
        const price = $(obj).find('.productPrice').text().replace('€', '');
        const quantity = $(obj).find('.input-qty').val()

        totalPrice += price * quantity;
    })

    $('.totalCost').each((_, obj) => {
        $(obj).text(totalPrice.toFixed(2).replace(/.00$/, '.-'));
    })
    $('#hiddenTotal').val(totalPrice.toFixed(2).replace(/.00$/, '.-'));
}