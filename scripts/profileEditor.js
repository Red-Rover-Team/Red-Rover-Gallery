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
    firstNameDiv.setAttribute('class', 'row');
    var firstNameColDiv = document.createElement('div');
    firstNameColDiv.setAttribute('class', '9u');
    // Create label    
    var labelFirstNameCol = document.createElement('div');
    labelFirstNameCol.setAttribute('class', '3u');
    var labelFirstName = document.createElement('label');
    labelFirstName.setAttribute('for', 'first-name');
    var labelText = document.createTextNode("Change First Name");
    // Create input
    var inputFirstName = document.createElement('input');
    inputFirstName.setAttribute('type', 'text');
    inputFirstName.setAttribute('placeholder', 'First name');
    inputFirstName.setAttribute('id', 'first-name');
    inputFirstName.setAttribute('name', 'first-name');
    inputFirstName.setAttribute('value',firstName);
    inputFirstName.setAttribute('maxlength',20);
    // Append new elements
    labelFirstName.appendChild(labelText);
    labelFirstNameCol.appendChild(labelFirstName);
    firstNameDiv.appendChild(labelFirstNameCol);
    firstNameColDiv.appendChild(inputFirstName);
    firstNameDiv.appendChild(firstNameColDiv);
    form.appendChild(firstNameDiv);


    var lastNameDiv = document.createElement('div');
    lastNameDiv.setAttribute('class', 'row');
    var lastNameColDiv = document.createElement('div');
    lastNameColDiv.setAttribute('class', '9u');
    // Create Label
    var labelLastNameCol = document.createElement('div');
    labelLastNameCol.setAttribute('class', '3u');
    var labelLastName = document.createElement('label');
    labelLastName.setAttribute('for', 'last-name');
    var labelText = document.createTextNode("Change Last Name");
    // Create input
    var inputLastName = document.createElement('input');
    inputLastName.setAttribute('type', 'text');
    inputLastName.setAttribute('placeholder', 'Last name');
    inputLastName.setAttribute('name', 'last-name');
    inputLastName.setAttribute('value',lastName);
    inputLastName.setAttribute('maxlength',20);
    // Append new elements
    labelLastName.appendChild(labelText);
    labelLastNameCol.appendChild(labelLastName);
    lastNameDiv.appendChild(labelLastNameCol);
    lastNameColDiv.appendChild(inputLastName);
    lastNameDiv.appendChild(lastNameColDiv);
    form.appendChild(lastNameDiv);


    var oldPassDiv = document.createElement('div');
    oldPassDiv.setAttribute('class', 'row');
    var oldPassCol = document.createElement('div');
    oldPassCol.setAttribute('class', '9u');
    // Create Label
    var labelOldPassCol = document.createElement('div');
    labelOldPassCol.setAttribute('class', '3u');
    var labelOldPass = document.createElement('label');
    labelOldPass.setAttribute('for', 'last-name');
    var labelText = document.createTextNode("Type Old Pass");
    // Create Input
    var inputOldPass = document.createElement('input');
    inputOldPass.setAttribute('type', 'password');
    inputOldPass.setAttribute('placeholder', 'Old password');
    inputOldPass.setAttribute('name', 'old-pass');
    inputOldPass.setAttribute('maxlength',20);
    // Append new elements
    labelOldPass.appendChild(labelText);
    labelOldPassCol.appendChild(labelOldPass);
    oldPassDiv.appendChild(labelOldPassCol);
    oldPassCol.appendChild(inputOldPass);
    oldPassDiv.appendChild(oldPassCol);
    form.appendChild(oldPassDiv);


    var newPassDiv = document.createElement('div');
    newPassDiv.setAttribute('class', 'row');
    var newPassCol = document.createElement('div');
    newPassCol.setAttribute('class', '9u');
    // Create Label
    var labelNewPassCol = document.createElement('div');
    labelNewPassCol.setAttribute('class', '3u');
    var labelNewPass = document.createElement('label');
    labelNewPass.setAttribute('for', 'last-name');
    var labelText = document.createTextNode("Type New Pass");
    // Create Input
    var inputNewPass = document.createElement('input');
    inputNewPass.setAttribute('type', 'password');
    inputNewPass.setAttribute('placeholder', 'New password');
    inputNewPass.setAttribute('name', 'new-pass');
    inputNewPass.setAttribute('maxlength',20);
    // Append new elements
    labelNewPass.appendChild(labelText);
    labelNewPassCol.appendChild(labelNewPass);
    newPassDiv.appendChild(labelNewPassCol);
    newPassCol.appendChild(inputNewPass);
    newPassDiv.appendChild(newPassCol);
    form.appendChild(newPassDiv);


    var newRePassDiv = document.createElement('div');
    newRePassDiv.setAttribute('class', 'row');
    var newRePassCol = document.createElement('div');
    newRePassCol.setAttribute('class', '9u');
    // Create Label
    var labelNewRePassCol = document.createElement('div');
    labelNewRePassCol.setAttribute('class', '3u');
    var labelNewRePass = document.createElement('label');
    labelNewRePass.setAttribute('for', 'last-name');
    var labelText = document.createTextNode("Retype New Pass");
    // Create Input
    var inputNewRePass = document.createElement('input');
    inputNewRePass.setAttribute('type', 'password');
    inputNewRePass.setAttribute('placeholder', 'Re-type');
    inputNewRePass.setAttribute('name', 'new-repass');
    inputNewRePass.setAttribute('maxlength',20);
    // Append new elements
    labelNewRePass.appendChild(labelText);
    labelNewRePassCol.appendChild(labelNewRePass);
    newRePassDiv.appendChild(labelNewRePassCol);
    newRePassCol.appendChild(inputNewRePass);
    newRePassDiv.appendChild(newRePassCol);
    form.appendChild(newRePassDiv);

    var submitDiv = document.createElement('div');
    submitDiv.setAttribute('class', 'row');
    var submitCol = document.createElement('div');
    submitCol.setAttribute('class', '12u');
    var submit = document.createElement('input');
    submit.setAttribute('type', 'submit');
    submit.setAttribute('value', 'Save');
    submitCol.appendChild(submit);
    submitDiv.appendChild(submitCol);
    form.appendChild(submitDiv);

    formFrame.appendChild(form);
    personalInfo.appendChild(formFrame);
}
function setNames(fname, lname) {
    firstName = fname;
    lastName = lname;
}