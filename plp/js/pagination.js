const decrementButton = document.querySelector(".pagina-btn > *[data-decrement]");
decrementButton.addEventListener("click", () => {
    const urlParams = new URLSearchParams(window.location.search);

    const curPage = urlParams.get("page");

    if (curPage <= 1 || !curPage) return;

    urlParams.set("page", curPage - 1);

    window.location.search = urlParams;
});

const incrementButton = document.querySelector(".pagina-btn > *[data-increment]");
incrementButton.addEventListener("click", () => {
    const maxPage = incrementButton.getAttribute("data-maxPage");

    const urlParams = new URLSearchParams(window.location.search);

    const curPage = urlParams.get("page");

    if (curPage >= maxPage || !curPage) return;

    urlParams.set("page", parseInt(curPage) + 1);

    window.location.search = urlParams;
});

const pageButtons = document.querySelectorAll(".pagina-btn > button");
pageButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const urlParams = new URLSearchParams(window.location.search);

        const newPage = button.getAttribute("data-page");

        if (!newPage) return;

        urlParams.set("page", parseInt(newPage));

        window.location.search = urlParams;
    });
});
