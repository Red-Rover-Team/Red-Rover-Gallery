var username = document.getElementById('user');
var password = document.getElementById('pass');
var rePassword = document.getElementById('repass');

username.addEventListener('input', function() {
    var status = document.getElementById('user-status');
    var userVal = username.value;
    var length = userVal.length;

    if (length > 2 && length <= 20) {
        status.setAttribute('class', 'valid');
        status.innerHTML = '%';
    } else {
        status.setAttribute('class', 'invalid');
        status.innerHTML = 'X';
    }
}, true)

password.addEventListener('input', function() {
    var statusPass = document.getElementById('pass-status');
    var statusRePass = document.getElementById('repass-status');
    var passVal = password.value;
    var rePassVal = rePassword.value;
    var length = passVal.length;

    if (length > 2 && passVal === rePassVal) {
        statusPass.setAttribute('class', 'valid');
        statusPass.innerHTML = '%';
        statusRePass.setAttribute('class', 'valid');
        statusRePass.innerHTML = '%';
    } else {
        statusPass.setAttribute('class', 'invalid');
        statusPass.innerHTML = 'X';
        statusRePass.setAttribute('class', 'invalid');
        statusRePass.innerHTML = 'X';
    }
}, true);

rePassword.addEventListener('input', function() {
    var statusPass = document.getElementById('pass-status');
    var statusRePass = document.getElementById('repass-status');
    var passVal = password.value;
    var rePassVal = rePassword.value;
    var length = passVal.length;

    if (length > 2 && passVal === rePassVal) {
        statusPass.setAttribute('class', 'valid');
        statusPass.innerHTML = '%';
        statusRePass.setAttribute('class', 'valid');
        statusRePass.innerHTML = '%';
    } else {
        statusPass.setAttribute('class', 'invalid');
        statusPass.innerHTML = 'X';
        statusRePass.setAttribute('class', 'invalid');
        statusRePass.innerHTML = 'X';
    }
}, true);