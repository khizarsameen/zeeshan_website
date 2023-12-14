var numberOfItems = Number(numberOfItems);
var swiperOptions = {
    // slidesPerView: 1,
    spaceBetween: 25,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    // breakpoints:{
    //     0: {
    //         slidesPerView: 1,
    //     },
    //     520: {
    //         slidesPerView: 2,
    //     },
    //     950: {
    //         slidesPerView: 4,
    //     },
    // },
  };

if (numberOfItems <= 1) {
    swiperOptions.slidesPerView = 1;
} else if (numberOfItems === 2) {
    swiperOptions.slidesPerView = 2;
} else {
    swiperOptions.slidesPerView = 3; // Default for 3 or more items
}

var swiper = new Swiper(".slide-content", swiperOptions);