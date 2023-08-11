const inputElements = document.querySelectorAll('.Field-container input');

inputElements.forEach(function (inputElement) {
    const iconElement = inputElement.previousElementSibling;
    inputElement.addEventListener('focus', function () {
        iconElement.classList.remove('text-gray-400');
        iconElement.classList.add('text-primary-100');
    });

    inputElement.addEventListener('blur', function () {
        iconElement.classList.remove('text-primary-100');
        iconElement.classList.add('text-gray-400');
    });
});