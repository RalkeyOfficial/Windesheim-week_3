const buttons = document.querySelectorAll(".carousel-nav > *");
let intervalId;

buttons.forEach((button, index) => {
    button.addEventListener("click", () => {
        // reset the timer on the automatic scrolling
        clearInterval(intervalId);
        intervalId = setInterval(nextSlide, 6000);

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

intervalId = setInterval(nextSlide, 8000);

function nextSlide() {
    const activeButton = document.querySelector(".carousel-nav > *[data-active]");
    const buttonsLength = [...buttons].length - 1; // -1 to deal with the difference in length (1-10) and indexing (0-9)
    const activeButtonIndex = [...buttons].indexOf(activeButton);
    const newButtonIndex = activeButtonIndex + 1 > buttonsLength ? 0 : activeButtonIndex + 1;

    // get old active button and remove active attribute
    activeButton.removeAttribute("data-active");

    // set active attribute
    [...buttons][newButtonIndex].setAttribute("data-active", "on");

    // set active attribute
    const slides = document.querySelectorAll(".image-carousel > ul > *");
    const slide = [...slides][newButtonIndex];

    // scroll to selected slide
    const scrollContainer = document.querySelector(".image-carousel > ul");
    scrollContainer.scrollTo({
        left: slide.offsetLeft,
        behavior: "smooth",
    });
}
