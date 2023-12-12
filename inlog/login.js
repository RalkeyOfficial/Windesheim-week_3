
loginButton = document.getElementById('loginButton');
var originalTransform = window.getComputedStyle(loginButton).getPropertyValue('transform');

loginButton.addEventListener('mouseenter', function () {
    var emailValue = document.getElementById('email').value;
    var passwordValue = document.getElementById('password').value;

    if (emailValue.trim() === '' || passwordValue.trim() === '') {
        loginButton.style.transform = 'translate(' + Math.random() * 400 + 'px, ' + Math.random() * 300 + 'px)';
        loginButton.setAttribute('disabled', 'true');
    }
});

document.addEventListener('input', function () {
    var emailValue = document.getElementById('email').value;
    var passwordValue = document.getElementById('password').value;

    if (emailValue.trim() !== '' && passwordValue.trim() !== '') {
        loginButton.style.transform = originalTransform;
        loginButton.removeAttribute('disabled');
    }
});