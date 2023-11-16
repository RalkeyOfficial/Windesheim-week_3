$(document).ready(function () {
    $('.button-increment').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product-data').find('.input-qty').val();
        
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 99) {
            value++;
            $(this).closest('.product-data').find('.input-qty').val(value);
        }
    });
});

$(document).ready(function () {
    $('.button-decrement').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product-data').find('.input-qty').val();
        
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product-data').find('.input-qty').val(value);
        }
    });
});

function redirectToPayment() {
    window.location.href = 'payment-page.php?total=' + '<?php echo $total; ?>';
}

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

// 

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