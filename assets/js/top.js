"use strict";

$(function () {
    // slick
    $(".slider").slick({
        autoplay: true,
        dots: true,
        adaptiveHeight: true,
        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>'
    });
});