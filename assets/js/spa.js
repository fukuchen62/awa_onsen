"use strict";

$(function () {
    $(".slider").slick({
        // autoplay: true,
        arrows: false,
        asNavFor: ".thumbnail",
    });
    $(".thumbnail").slick({
        arrows: false,
        slidesToShow: 4,
        asNavFor: ".slider",
        focusOnSelect: true,
    });
});
