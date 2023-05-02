$(function () {
    $(".carousel-item").eq(0).addClass("active");

    $(".animated_header__bg_color:odd").addClass("bg-danger");

    $(".animated_header__activities").css("display", "none");

    $(".animated_header__activities").eq(0).css("display", "block");

    // $(".carousel-control-next-icon").css(
    //     "background-image",
    //     "url(" + "{{" + asset(/storage/images/right_arrowr.svg) +"}}"+ ")"
    // );
    // prepend('<img src="{{ asset(/storage/images/right_arrowr.svg) }}"/>');
});

setInterval(() => {
    $(".line_l").removeClass("line_active");
    $(".animated_header__line_left").removeClass("z_index");
    $(".line_l").eq($(".active").index()).addClass("line_active");
    $(".animated_header__line_left")
        .eq($(".active").index())
        .addClass("z_index");

    $(".line_r").removeClass("line_active");
    $(".animated_header__line_right").removeClass("z_index");
    $(".line_r").eq($(".active").index()).addClass("line_active");
    $(".animated_header__line_right")
        .eq($(".active").index())
        .addClass("z_index");
}, 1000);
