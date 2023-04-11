//for swiper slide show
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    grabcursor: true,

    autoplay: {
        delay: 2500,
        disableOnInteraction: true,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// for quatity increase and descrease btn
let qty = document.querySelector('#qty');

function plus() {
    qty.value = parseInt(qty.value) + 1;

}

function minus() {
    if (qty.value <= 0) {
        qty.value == 0
    } else {
        qty.value = parseInt(qty.value) - 1;
    }
}

//to show sub img when sub img clicked
let mainImg = document.querySelector('#main-img');
let subImages = document.querySelectorAll('.sub-img');

subImages.forEach(subImage => {
    subImage.addEventListener('click', () => {
        mainImg.src = subImage.src;
    });
});
