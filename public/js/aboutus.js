document.querySelector('a[href="#aboutContent"]').addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('aboutContent').scrollIntoView({
        behavior: 'smooth'
    });
});