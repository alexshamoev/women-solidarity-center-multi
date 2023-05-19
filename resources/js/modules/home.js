$(function () {
    window.addEventListener("scroll", function () {
        var div = document.querySelector(".about_us__big_image");
        var text = document.querySelector(".about_us__text");
        var rect = div.getBoundingClientRect();
        var windowHeight = window.innerHeight;

        if (rect.top < windowHeight && rect.bottom > 0) {
            div.classList.add("about_us__big_image_active");
            text.classList.add("about_us__text_active");
        }
    });

    window.addEventListener("load", function () {
        var div = document.querySelector(".about_us__big_image");
        var text = document.querySelector(".about_us__text");
        var rect = div.getBoundingClientRect();
        var windowHeight = window.innerHeight;

        if (rect.top < windowHeight && rect.bottom > 0) {
            div.classList.add("about_us__big_image_active");
            text.classList.add("about_us__text_active");
        }
    });

    // jquery accorion for questions

    $(".question__accordion_item").on("click", function () {
        $(this).next(".question__accordion_item_wrapper").slideToggle(500);
        $(this).find(".arrow_accordion").toggleClass("rotate");
    });

    $(".news__block").on("mouseenter", function () {
        $(".news__info").removeClass("news__info_active");
        var targetId = $(this).data("id");

        // Find the div with corresponding data-id and add the "display:block" class
        $('[data-id="' + targetId + '"]').addClass("news__info_active");
    });
});

window.onload = function () {
    var iframe = document.querySelector("iframe");
    iframe.contentWindow.postMessage(
        '{"event":"command","func":"playVideo","args":""}',
        "*"
    );
};
