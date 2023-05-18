$(function () {
    $(".application__slide").on("click", function () {
        $(this).next().slideToggle();
    });

    $(".application__number").on("click", function () {
        $(".application__number").removeClass("application__number_active");
        $(this).addClass("application__number_active");
    });

    $(".application__page").eq(0).addClass("application__page_active");

    $(".application__number").on("click", function () {
        $(".application__page").removeClass("application__page_active");
        $(".application__page")
            .eq($(this).data("number") - 1)
            .addClass("application__page_active");
    });

    $(".application__button").on("click", function () {
        var activePage = $(".application__page.application__page_active");

        if (activePage.next(".application__page").length > 0) {
            activePage.removeClass("application__page_active");
            activePage
                .next(".application__page")
                .addClass("application__page_active");
        }

        $(".application__number").removeClass("application__number_active");
        $(".application__number")
            .eq($(this).data("id"))
            .addClass("application__number_active");
    });

    $(document).on("click", function (event) {
        if (!$(event.target).closest(".application__slide").length) {
            $(".application__slide_box").slideUp();
        }
    });

    $(".application__slide_box").on("click", function (event) {
        event.stopPropagation();
    });
});
