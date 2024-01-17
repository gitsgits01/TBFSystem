
document.addEventListener('DOMContentLoaded', function () {
var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    touch:{
        enabled:true,
    },
    
});
});

// document.addEventListener('DOMContentLoaded', function () {
//     const backgroundContainer = document.getElementById('backgroundContainer');

//     setInterval(function () {
//         backgroundContainer.style.transform = 'translateX(-100%)';
//         setTimeout(function () {
//             backgroundContainer.style.transition = 'none';
//             backgroundContainer.style.transform = 'translateX(0)';
//             setTimeout(function () {
//                 backgroundContainer.style.transition = 'transform 1s ease-in-out';
//             }, 50);
//         }, 1000);
//     }, 5000);
// });



//for photo slider
const initSlider=()=>{
    const imageList=document.querySelector(".slider-wrapper .image-list");
    const slideButtons=document.querySelectorAll(".slider-wrapper .slider-button");
   

    const maxScrollLeft=imageList.scrollWidth - imageList.clientWidth;
    slideButtons.forEach(button=>{
        button.addEventListener("click",() => {
            const directions=button.id === "prev-slide" ? -1 : 1;
            const scrollAmount = imageList.clientWidth * directions;
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth"});
        });
    });
    const handleSliderButtons=()=>{
    slideButtons[0].style.display=imageList.scrollLeft <= 0 ? "none":"block";
    slideButtons[1].style.display=imageList.scrollLeft >= maxScrollLeft ? "none":"block";

    }
 
imageList.addEventListener("scroll",()=>{
    handleSliderButtons();
});
}
window.addEventListener("load",initSlider);