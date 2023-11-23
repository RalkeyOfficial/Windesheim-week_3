const cartButtons = $(".product .buttons > button");

cartButtons.each((_, obj) => {
    $(obj).on("click", () => {
        const id = $(obj).attr("data-id");

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
});
