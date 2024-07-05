jQuery(function($) {
    "use strict";

    let SwiperMovies = function() {
        this.init();
    }
    SwiperMovies.prototype.init = function() {
        const Movies1Swiper = new Swiper(".swiper_movies1", {
            slidesPerView: 2,
            spaceBetween: 20,
            breakpoints: {
                768: {
                    slidesPerView: 6,
                    spaceBetween: 30,
                }
            }
        });
        const Movies2Swiper = new Swiper(".swiper_movies2", {
            slidesPerView: 2,
            spaceBetween: 20,
            breakpoints: {
                768: {
                    slidesPerView: 6,
                    spaceBetween: 30,
                }
            }
        });
        const Movies3Swiper = new Swiper(".swiper_movies3", {
            slidesPerView: 2,
            spaceBetween: 20,
            breakpoints: {
                768: {
                    slidesPerView: 6,
                    spaceBetween: 30,
                }
            }
        });
    }

    $(document).ready(function() {
        const a = $('.swiper_movies1');
        if (a.length > 0) {
            new SwiperMovies();
        }
    });
});