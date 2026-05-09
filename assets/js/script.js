
       const navbar = document.getElementById('navbar');

if (navbar) {

    let lastScroll = 0;

    window.addEventListener('scroll', function () {

        let currentScroll = window.pageYOffset;

        if (currentScroll > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }

        if (currentScroll > lastScroll && currentScroll > 100) {
            navbar.classList.add('navbar-hidden');
        } else {
            navbar.classList.remove('navbar-hidden');
        }

        lastScroll = currentScroll;
    });
}
    