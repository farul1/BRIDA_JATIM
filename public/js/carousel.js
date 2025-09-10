// var swiperheader = new Swiper(".swiper-container.header-carousel", {
//     loop: true,
//     lazy: true,
//     slidesPerView: "auto",
//     effect: "slide",
//     speed: 1000,
//     // 'slide' | 'fade' | 'cube' | 'coverflow' | 'flip'
//     centeredSlides: true,
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//     },
//     autoplay: {
//         delay: 2000,
//         // reverseDirection: true,
//     },
// });

var swiper = new Swiper(".header-carousel", {
    loop: true,
    lazy: true,
    centeredSlides: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    // navigation: {
    //     nextEl: ".swiper-button-next",
    //     prevEl: ".swiper-button-prev",
    // },
    // Default parameters
    slidesPerView: 1,
    spaceBetween: 0,
    // Responsive breakpoints
    // breakpoints: {
    //     // when window width is >= 320px
    //     320: {
    //         slidesPerView: 2,
    //         spaceBetween: 20,
    //     },
    //     // when window width is >= 480px
    //     480: {
    //         slidesPerView: 3,
    //         spaceBetween: 30,
    //     },
    //     // when window width is >= 640px
    //     640: {
    //         slidesPerView: 4,
    //         spaceBetween: 40,
    //     },
    // },
});

var swiperinformation = new Swiper(".swiper-container.information-carousel", {
    loop: true,
    lazy: true,
    effect: "slide",
    speed: 1000,
    // 'slide' | 'fade' | 'cube' | 'coverflow' | 'flip'
    slidesPerView: 1,
    spaceBetween: 19,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 2000,
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 30,
        },
    },
});

// var swipergaleri = new Swiper(".swiper-container.galeri-carousel", {
//     loop: true,
//     lazy: true,
//     effect: "slide",
//     speed: 1000,
//     // 'slide' | 'fade' | 'cube' | 'coverflow' | 'flip'
//     slidesPerView: 2,
//     spaceBetween: 8,
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//     },
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     autoplay: {
//         delay: 2000,
//         // reverseDirection: true,
//     },
//     breakpoints: {
//         640: {
//             slidesPerView: 1,
//         },
//         768: {
//             slidesPerView: 2,
//             spaceBetween: 20,
//         },
//         1024: {
//             slidesPerView: 4,
//             spaceBetween: 23,
//         },
//     },
// });

// var swipertestimoni = new Swiper(".swiper-container.testimoni-carousel", {
//     loop: true,
//     lazy: true,
//     slidesPerView: 1,
//     effect: "slide",
//     speed: 1000,
//     // 'slide' | 'fade' | 'cube' | 'coverflow' | 'flip'
//     centeredSlides: true,
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//     },
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     autoplay: {
//         delay: 2000,
//         // reverseDirection: true,
//     },
// });

// var swiperteam = new Swiper(".swiper-container.team-carousel", {
//     loop: true,
//     lazy: true,
//     // slidesPerColumn: 4,
//     effect: "slide",
//     speed: 1000,
//     // 'slide' | 'fade' | 'cube' | 'coverflow' | 'flip'
//     slidesPerView: 2,
//     spaceBetween: 19,
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     autoplay: {
//         delay: 2000,
//         // reverseDirection: true,
//     },
//     breakpoints: {
//         640: {
//             slidesPerView: 2,
//         },
//         768: {
//             slidesPerView: 2,
//             spaceBetween: 20,
//         },
//         1024: {
//             slidesPerView: 4,
//             spaceBetween: 30,
//         },
//     },
// });

// var swiperclient = new Swiper(".swiper-container.client-carousel", {
//     loop: true,
//     lazy: true,
//     allowSlideNext: true,
//     allowSlidePrev: true,
//     noSwiping: false,
//     effect: "slide",
//     speed: 1000,
//     // 'slide' | 'fade' | 'cube' | 'coverflow' | 'flip'
//     slidesPerView: 3,
//     spaceBetween: 19,
//     centeredSlides: true,
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     autoplay: {
//         delay: 2000,
//     },
//     breakpoints: {
//         640: {
//             slidesPerView: 3,
//         },
//         768: {
//             slidesPerView: 3,
//         },
//         1024: {
//             slidesPerView: 3,
//             spaceBetween: 137,
//         },
//     },
// });

// var swiperreview = new Swiper(".swiper-container.review-carousel", {
//     loop: true,
//     lazy: true,
//     effect: "slide",
//     speed: 1000,
//     // 'slide' | 'fade' | 'cube' | 'coverflow' | 'flip'
//     slidesPerView: 2,
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//     },
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     autoplay: {
//         delay: 2000,
//         // reverseDirection: true,
//     },
//     breakpoints: {
//         640: {
//             slidesPerView: 2,
//         },
//         768: {
//             slidesPerView: 2,
//             spaceBetween: 20,
//         },
//         1024: {
//             slidesPerView: 3,
//             spaceBetween: 30,
//         },
//     },
// });

// var swiperrelated = new Swiper(".swiper-container.related-carousel", {
//     loop: true,
//     lazy: true,
//     effect: "slide",
//     speed: 1000,
//     // 'slide' | 'fade' | 'cube' | 'coverflow' | 'flip'
//     slidesPerView: 2,
//     spaceBetween: 20,
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//     },
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     autoplay: {
//         delay: 2000,
//         // reverseDirection: true,
//     },
//     breakpoints: {
//         640: {
//             slidesPerView: 2,
//             spaceBetween: 20,
//         },
//         768: {
//             slidesPerView: 2,
//             spaceBetween: 20,
//         },
//         1024: {
//             slidesPerView: 3,
//             spaceBetween: 30,
//         },
//     },
// });

// var swiperberita = new Swiper(".swiper-container.berita-carousel", {
//     loop: true,
//     lazy: true,
//     // effect: "fade",
//     spaceBetween: 20,
//     slidesPerView: 3,
//     grabCursor: true,
//     freeMode: true,
//     centeredSlides: true,
//     // watchSlidesVisibility: true,
//     watchSlidesProgress: true,
// });

// var swiperberita2 = new Swiper(".swiper-container.berita-carousel2", {
//     loop: true,
//     lazy: true,
//     grabCursor: true,
//     // effect: "fade",
//     spaceBetween: 10,
//     thumbs: {
//         swiper: swiperberita,
//     },
//     autoplay: {
//         delay: 2000,
//         // reverseDirection: true,
//     },
//     // allowSlidePrev: false,
// });
