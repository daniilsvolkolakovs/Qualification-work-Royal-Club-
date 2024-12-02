import './bootstrap';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';


const swiper = new Swiper('.swiper-container', {
  slidesPerView: 1, 
  spaceBetween: 20, 
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {

    640: {
      slidesPerView: 1,
    },

    768: {
      slidesPerView: 2,
    },

    1024: {
      slidesPerView: 3,
    },

    1280: {
      slidesPerView: 4,
    },
    1930: {
      slidesPerView: 6,
    },
  },
});
