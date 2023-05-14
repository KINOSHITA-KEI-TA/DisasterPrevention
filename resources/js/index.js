document.getElementById('agree').addEventListener('change', function() {
    if (this.checked) {
        document.getElementById('registerButton').disabled = false;
    } else {
        document.getElementById('registerButton').disabled = true;
    }
});