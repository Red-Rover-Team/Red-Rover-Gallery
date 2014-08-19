var nameField = document.getElementById('name');
var currentInput = '';

nameField.addEventListener('input', function() {

    var value = nameField.value;

    if (value.match(/[\W]+/g)) {
        nameField.value = currentInput;
    }
    if (currentInput.length <= 25) {
        if (!(value.match(/[\W]+/g))) {
            currentInput = value;
        }
    }
});