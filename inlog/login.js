loginButton = document.getElementById("loginButton");
var originalTransform = window.getComputedStyle(loginButton).getPropertyValue("transform");

const emailRegex = /^([a-zA-Z0-9_\-.]+)@([a-zA-Z0-9_\-]+)(\.[a-zA-Z]{2,5}){1,2}$/;

loginButton.addEventListener("mouseenter", function () {
    var emailValue = document.getElementById("email").value;
    var passwordValue = document.getElementById("password").value;

    if (emailValue.trim() === "") {
        loginButton.style.transform =
            "translate(" + Math.random() * 400 + "px, " + Math.random() * 300 + "px)";
        loginButton.setAttribute("disabled", "true");
        return;
    }

    if (!emailRegex.test(emailValue)) {
        loginButton.style.transform =
            "translate(" + Math.random() * 400 + "px, " + Math.random() * 300 + "px)";
        loginButton.setAttribute("disabled", "true");
        return;
    }

    if (passwordValue.trim() === "") {
        loginButton.style.transform =
            "translate(" + Math.random() * 400 + "px, " + Math.random() * 300 + "px)";
        loginButton.setAttribute("disabled", "true");
        return;
    }

    if (passwordValue.length < 8) {
        loginButton.style.transform =
            "translate(" + Math.random() * 400 + "px, " + Math.random() * 300 + "px)";
        loginButton.setAttribute("disabled", "true");
        return;
    }
});

document.addEventListener("input", function () {
    var emailValue = document.getElementById("email").value;
    var passwordValue = document.getElementById("password").value;

    if (
        emailValue.trim() !== "" &&
        passwordValue.trim() !== "" &&
        passwordValue.length >= 8 &&
        emailRegex.test(emailValue)
    ) {
        loginButton.style.transform = originalTransform;
        loginButton.removeAttribute("disabled");
    }
});
