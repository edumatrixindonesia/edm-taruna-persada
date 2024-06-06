let nav = document.querySelector("nav");
window.onscroll = function () {
    if (document.documentElement.scrollTop > 20) {
        nav.classList.add("sticky");
    } else {
        nav.classList.remove("sticky");
    }
};

// TESTIMONI
const carousel = document.querySelector(".carousel-container");
const slide = document.querySelector(".carousel-slide");

function handleCarouselMove(positive = true) {
    const slideWidth = slide.clientWidth;
    carousel.scrollLeft = positive
        ? carousel.scrollLeft + slideWidth
        : carousel.scrollLeft - slideWidth;
}

// next.addEventListener('click', handleScrollNext)
// prev.addEventListener('click', handleScrollPrev)

// FAQ
document.querySelectorAll(".accordion-item").forEach((item) => {
    item.querySelector(".accordion-item-header").addEventListener(
        "click",
        () => {
            item.classList.toggle("open");
        }
    );
});

// MASTER TEACHER
var swiper = new Swiper(".slide-content", {
    slidesPerView: 4,
    spaceBetween: 25,
    loop: true,
    centerSlide: "true",
    fade: "true",
    grabCursor: "true",
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 2,
        },
        950: {
            slidesPerView: 3,
        },
    },
});
