import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

const fadeOutElements = document.querySelectorAll('.fade-out');
const alert = document.querySelector('.fade-out');
const closeButton = document.querySelector('#close-alert');

fadeOutElements.forEach((element) => {
    setTimeout(() => {
        element.style.opacity = '0';
        element.style.display = 'none';
    }, 3000);
});

if (closeButton) {
    closeButton.addEventListener("click", () => {
        fadeOutClose();
    });
}

function fadeOutClose() {
    alert.style.opacity = '0';
    alert.style.display = 'none';
}