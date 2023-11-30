const cartButton = $("#addToCartButton").first();

cartButton.on("click", () => {
    const id = cartButton.attr("data-id");

    $.ajax({
        method: "POST",
        url: "/api/add-to-cart.php",
        data: { add: true, product_id: id },
        success: function (data) {
            console.log(data);
        },
        error: function (xhr, status, error) {
            console.error(xhr);
        },
    });
});
