// assets/js/main.js
import initMobileMenu from '/site-acoperisuri/assets/js/modules/mobile-menu.js';

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.hamburger')) initMobileMenu();
});
