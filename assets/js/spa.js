"use strict";
$(function () {
$(".slider").slick({
    // autoplay: true,
    arrows: false,
    asNavFor: ".thumbnail",
});
    $(".thumbnail").slick({
    arrows: false,
    slidesToShow: 3,
    asNavFor: ".slider",
    focusOnSelect: true,
});
});
