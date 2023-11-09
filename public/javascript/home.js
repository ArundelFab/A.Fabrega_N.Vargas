const hamburgerIcon = document.getElementById('hamburger-icon');
const menu = document.getElementById('menu');

hamburgerIcon.addEventListener('click', () => {
    menu.classList.toggle('show-menu');
});

window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        menu.classList.remove('show-menu');
    }
});