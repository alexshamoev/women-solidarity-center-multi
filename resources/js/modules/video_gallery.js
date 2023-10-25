$(function () {
    let box = $(".element_video");

    let boxCloneFirst = $(".element_video_js")
        .eq(0)
        .clone()
        .addClass("cloned_div");

    boxCloneFirst
        .find(".video_gallery__text")
        .removeClass("video_gallery__text");

    $(".video_gallery__table_of_contents").append(box);

    $(".video_gallery__main_screen").append(box.eq(0));

    $(".video_gallery__table_of_contents .video_gallery__text").addClass(
        "line_4"
    );

    $(".element_video").on("click", function () {
        $(".cloned_div").remove();

        let boxClone = $(this).clone().addClass("cloned_div");

        $(".video_gallery__table_of_contents").append(box);

        $(".video_gallery__main_screen").append($(this));

        $(".video_gallery__table_of_contents .video_gallery__text").addClass(
            "line_4"
        );

        $(this).find(".video_gallery__text").removeClass("line_4");

        // $(".video_gallery__table_of_contents")
        //     .find(".video_gallery__text")
        //     .addClass("line_3");
    });

    $(".video_gallery__btn_read_more button").on("click", function () {
        $(".video_gallery__main_screen")
            .find(".video_gallery__text")
            .addClass("video_gallery__text_js");
        // $(".video_gallery__text_js").removeClass("line_3");
    });

    var originalText = $(".see_more_js").data("text1");

    $(".see_more_js").on("click", function () {
        let newText = $(this).data("text2");

        if ($(this).text() == originalText) {
            $(this).text(newText);
        } else {
            $(this).text(originalText);
        }
        $(this)
            .parent()
            .parent()
            .find(".video__gallery_text_limit")
            .toggleClass("line_1");
    });

    $(".element_video")
        .eq($(".element_video").length - 1)
        .css("margin-bottom", "0px");
});
