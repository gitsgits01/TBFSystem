


// function setFullImageSize(){
//     const img=document.getElementsByClassName('.swiper-slide');
//     img.style.width=window.innerWidth+'px';
//     img.style.height=window.innerHeight+'px';

// }
// setFullImageSize();
// window.addEventListener('resize',setFullImageSize);


document.addEventListener('DOMContentLoaded', function () {
//     var currentImageIndex=0;
// var images=document.querySelectorAll('.swiper-slider image');

// function nextImage(){
//     images[currentImageIndex].classList.remove('active');
//     currentImagesIndex=(currentImageIndex+1)%images.length;
//     images[currentImageIndex].claassList.add('active');
// }
// setInterval(nextImage, 3000);
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




//for responsive navigation
// let navbar=document.wuerySelector('.navbar .section_nav');
// document.querySelector('#menu-btn').onclick=()=>{
//     navbar.classList.add('active');
// }
// document.querySelector('nav-close').onclick=()=>{
//     navbar.classList.remove('active');
// }
// window.onscroll=()=>{
//     navbar.classList.remove('active');
//     if(window.scrollY>0){
//         document.querySelector('.navbar').classList.add('active');
//     }
//     else{
//         document.querySelector('.navbar').classList.remove('active');

//     }
// }
// window.onload=()=>{
//     if(window.scrollY>0){
//         document.querySelector('.navbar').classList.add('active');
//     }
//     else{
//         document.querySelector('.navbar').classList.remove('active');

//     }
// }

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