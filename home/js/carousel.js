const buttons = document.querySelectorAll(".carousel-nav > *");

buttons.forEach((button, index) => {
    button.addEventListener("click", () => {
        // get old active button and remove active attribute
        const activeButton = document.querySelector(".carousel-nav > *[data-active]");
        activeButton.removeAttribute("data-active");

        // set active attribute
        button.setAttribute("data-active", "on"); // a value needs to be given for this function to work

        // set active attribute
        const slideId = index; // set slide id to button index
        const slides = document.querySelectorAll(".image-carousel > ul > *");
        const slide = [...slides][slideId]; // get the slide corresponded to the button index

        // scroll to selected slide
        const scrollContainer = document.querySelector(".image-carousel > ul");
        scrollContainer.scrollTo({
            left: slide.offsetLeft,
            behavior: "smooth",
        });
    });
});
