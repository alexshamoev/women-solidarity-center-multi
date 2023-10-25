"use strict";

$(function ($) {
    $(".event_images_carousel").owlCarousel({
        navigation: true,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2000,
        responsive: {
            0: {
                items: 1,
                nav: false,
                dots: true,
            },
            600: {
                items: 2,
                nav: true,
                dots: true,
            },
            1000: {
                items: 3,
                nav: true,
                dots: true,
            },
        },
    });
});
