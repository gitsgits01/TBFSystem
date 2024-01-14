document.querySelector('a[href="#aboutContent"]').addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('aboutContent').scrollIntoView({
        behavior: 'smooth'
    });
});

// userprofile
function toggleAdditionalInfo() {
    var additionalInfo = document.getElementById('additionalInfo');
    additionalInfo.style.display = (additionalInfo.style.display === 'none') ? 'block' : 'none';
}