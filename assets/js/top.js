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

    // nav
    $(".hamburger").click(function(){
        $(this).toggleClass("active");
        $(".sp_nav .navlist").toggleClass("isactive");
        $(this).toggleClass("isactive");
    });
    $(".navlist_item").click(function(){
        $(".hamburger").removeClass("active");
        $(".sp_nav .navlist").removeClass("isactive");
        $(".hamburger").removeClass("isactive");
    });

});