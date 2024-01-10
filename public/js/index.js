document.addEventListener('DOMContentLoaded', function () {
var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});
 const burgerMenu = document.querySelector('.checkbtn');
 const menu = document.querySelector('section_nav');
 burgerMenu.addEventListener('click',function(){
    menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
 })
});