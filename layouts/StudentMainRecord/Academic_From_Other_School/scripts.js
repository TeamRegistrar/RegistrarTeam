document.getElementById('documentSelect').addEventListener('change', function() {
    var selectedValue = this.value;
    var imageElement = document.getElementById('documentImage');
    

    imageElement.style.display = 'none';
    imageElement.src = '';

    if (selectedValue === 'form137') {
        imageElement.src = '/rescmreg/images/form137.png';
    } else if (selectedValue === 'form138') {
        imageElement.src = '/rescmreg/images/form138.png';
    } else if (selectedValue === 'goodmoral') {
        imageElement.src = '/rescmreg/images/goodmoral.png';
    } else if (selectedValue === 'birthcert') {
        imageElement.src = '/rescmreg/images/birthcert.png';
    }


    if (imageElement.src) {
        imageElement.style.display = 'block';
    }
});