var isOpen = false;
var firstName = '';
var lastName = '';
var editButton = document.getElementById('edit');
editButton.addEventListener('click', function() {
    formSwitch();
}, false);

function formSwitch() {
    if (!isOpen) {

        openForm();
        isOpen = true;

    } else {

        closeForm();
        isOpen = false;
    }
}
function closeForm() {
    var formFrame = document.getElementById('form-frame');
    formFrame.parentNode.removeChild(formFrame);
    editButton.innerHTML = 'Edit';
}
function openForm() {

    editButton.innerHTML = 'Close';

    var personalInfo = document.getElementById('personal-info');

    var form = document.createElement('form');
    form.setAttribute('method', 'post');

    var formFrame = document.createElement('div');
    formFrame.setAttribute('id', 'form-frame');

    var firstNameDiv = document.createElement('div');
    var inputFirstName = document.createElement('input');
    inputFirstName.setAttribute('type', 'text');
    inputFirstName.setAttribute('placeholder', 'First name');
    inputFirstName.setAttribute('name', 'first-name');
    inputFirstName.setAttribute('value',firstName);
    inputFirstName.setAttribute('maxlength',20);
    firstNameDiv.appendChild(inputFirstName);
    form.appendChild(firstNameDiv);

    var lastNameDiv = document.createElement('div');
    var inputLastName = document.createElement('input');
    inputLastName.setAttribute('type', 'text');
    inputLastName.setAttribute('placeholder', 'Last name');
    inputLastName.setAttribute('name', 'last-name');
    inputLastName.setAttribute('value',lastName);
    inputLastName.setAttribute('maxlength',20);
    lastNameDiv.appendChild(inputLastName);
    form.appendChild(lastNameDiv);

    var oldPassDiv = document.createElement('div');
    var inputOldPass = document.createElement('input');
    inputOldPass.setAttribute('type', 'password');
    inputOldPass.setAttribute('placeholder', 'Old password');
    inputOldPass.setAttribute('name', 'old-pass');
    inputOldPass.setAttribute('maxlength',20);
    oldPassDiv.appendChild(inputOldPass);
    form.appendChild(oldPassDiv);

    var newPassDiv = document.createElement('div');
    var inputNewPass = document.createElement('input');
    inputNewPass.setAttribute('type', 'password');
    inputNewPass.setAttribute('placeholder', 'New password');
    inputNewPass.setAttribute('name', 'new-pass');
    inputNewPass.setAttribute('maxlength',20);
    newPassDiv.appendChild(inputNewPass);
    form.appendChild(newPassDiv);

    var newRePassDiv = document.createElement('div');
    var inputNewRePass = document.createElement('input');
    inputNewRePass.setAttribute('type', 'password');
    inputNewRePass.setAttribute('placeholder', 'Re-type');
    inputNewRePass.setAttribute('name', 'new-repass');
    inputNewRePass.setAttribute('maxlength',20);
    newRePassDiv.appendChild(inputNewRePass);
    form.appendChild(newRePassDiv);

    var submit = document.createElement('input');
    submit.setAttribute('type', 'submit');
    submit.setAttribute('value', 'Save');
    form.appendChild(submit);

    formFrame.appendChild(form);
    personalInfo.appendChild(formFrame);
}
function setNames(fname, lname) {
    firstName = fname;
    lastName = lname;
}