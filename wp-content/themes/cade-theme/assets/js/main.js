window.addEventListener('load', function() {
    const mainNav = document.querySelector('.main-navigation');
    const menuToggle = document.querySelector('.menu-toggle');
    if (mainNav && menuToggle) {
        menuToggle.addEventListener('click', function() {
            mainNav.classList.toggle('is-open');
            menuToggle.classList.toggle('is-open');
        });
    }
});
