var nameField = document.getElementById('name');
var currectInput = '';

nameField.setAttribute('title', 'The name can contain only english characters and numbers from zero to nine.');

nameField.addEventListener('input', function() {

    var value = nameField.value;

    nameField.setAttribute('maxlength', 25);

    if (value.match(/[\W]+/g)) {
        nameField.value = currectInput;
    }
    if (currectInput.length <= 25) {

        if (!(value.match(/[\W]+/g))) {
            currectInput = value;
        }
    }
});

