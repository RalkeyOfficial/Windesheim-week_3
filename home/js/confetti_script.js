const word = "awesome".split('');
let correctLetterIndex = 0;

$(document.body).on("keydown", (event) => {
    const currentKey = event?.originalEvent?.key;

    if (word[correctLetterIndex] === currentKey) {
        correctLetterIndex++;
    } else {
        correctLetterIndex = 0;
    }

    if (correctLetterIndex === word.length) {
        setTimeout(() => activateConfetti(0.5, 0.9), 0);
        setTimeout(() => activateConfetti(0.2, 0.3), 400);
        setTimeout(() => activateConfetti(0.6, 0.6), 750);
        setTimeout(() => activateConfetti(0.8, 0.2), 1100);
        correctLetterIndex = 0;
    }
});

function activateConfetti(x, y) {
    confetti({
        particleCount: 600,
        spread: 400,
        origin: {
            x: x,
            y: y,
        },
    });
}