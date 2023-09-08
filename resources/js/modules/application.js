$(function () {
    $(".application__page").eq(0).addClass("application__page_active");

    $(".application__number_first").on("click", function () {
        $(".application__page").removeClass("application__page_active");
        $(".application__page")
            .eq($(this).data("number") - 1)
            .addClass("application__page_active");
        $(".application__number").removeClass("application__number_active");
        $(this).addClass("application__number_active");
        $(".file_field_first").css("display", "none");
    });

    $(".application__number_second").on("click", function () {
        var activePage = $(".application__page.application__page_active");
        var inputs = $(
            '.application__input_initials input[type="text"], .application__input_initials input[type="number"]'
        );

        var hasEmptyInput = false;

        inputs.each(function () {
            if ($(this).val().trim() === "") {
                hasEmptyInput = true;
                return false; // Exit the loop if an empty input is found
            }
        });

        if (hasEmptyInput) {
            $(".file_field_first").css("display", "block");
        } else {
            if (activePage.next(".application__page").length > 0) {
                activePage.removeClass("application__page_active");
                activePage
                    .next(".application__page")
                    .addClass("application__page_active");
            }

            $(".application__page").removeClass("application__page_active");
            $(".application__page")
                .eq($(this).data("number") - 1)
                .addClass("application__page_active");
            $(".application__number").removeClass("application__number_active");
            $(this).addClass("application__number_active");
            $(".file_field_first").css("display", "none");
        }
    });

    $(".application__number_third").on("click", function () {
        var checkboxes = $(".filed_checkbox");
        var activePage = $(".application__page.application__page_active");

        if (checkboxes.is(":checked")) {
            if (activePage.next(".application__page").length > 0) {
                activePage.removeClass("application__page_active");
                activePage
                    .next(".application__page")
                    .addClass("application__page_active");
            }

            $(".application__page").removeClass("application__page_active");
            $(".application__page")
                .eq($(this).data("number") - 1)
                .addClass("application__page_active");
            $(".application__number").removeClass("application__number_active");
            $(this).addClass("application__number_active");
            $(".file_field_second").css("display", "none");
        } else {
            $(".file_field_second").css("display", "block");
        }
    });

    $(".application__number_forth").on("click", function () {
        var activePage = $(".application__page.application__page_active");
        var inputs = $(".step_third_input");

        var hasEmptyInput = false;

        inputs.each(function () {
            if ($(this).val().trim() === "") {
                hasEmptyInput = true;
                return false; // Exit the loop if an empty input is found
            }
        });

        if (hasEmptyInput) {
            $(".file_field_third").css("display", "block");
        } else {
            if (activePage.next(".application__page").length > 0) {
                activePage.removeClass("application__page_active");
                activePage
                    .next(".application__page")
                    .addClass("application__page_active");
            }

            $(".application__page").removeClass("application__page_active");
            $(".application__page")
                .eq($(this).data("number") - 1)
                .addClass("application__page_active");
            $(".application__number").removeClass("application__number_active");
            $(this).addClass("application__number_active");
            $(".file_field_third").css("display", "none");
        }
    });

    $(".application__number_fifth").on("click", function () {
        // Function to validate email format
        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Function to validate mobile number format
        function isValidMobile(mobile) {
            // Assuming a basic format of 10 digits (you can adjust this as needed)
            var mobileRegex = /^\d{9,15}$/;
            return mobileRegex.test(mobile);
        }

        var activePage = $(".application__page.application__page_active");
        var mobile = false;
        var email = false;

        var email = $(".mail_e").val();
        var emailError = $("#emailError");

        // Check if the email field is empty or not a valid email format
        if (email === "") {
            emailError.text($("#emailError").data("required"));
        } else if (!isValidEmail(email)) {
            emailError.text($("#emailError").data("unvalid"));
        } else {
            emailError.text(""); // Clear the error message
            email = true;
        }

        var mobile = $(".mobile_number").val();
        var mobileError = $("#mobileError");

        // Check if the mobile number field is empty or not in a valid format
        if (mobile === "") {
            mobileError.text($("#mobileError").data("number"));
        } else if (!isValidMobile(mobile)) {
            mobileError.text($("#mobileError").data("number-correctly"));
        } else {
            mobileError.text(""); // Clear the error message
            mobile = true;
        }

        if ((email === true) & (mobile === true)) {
            console.log(388888888888888);
            if (activePage.next(".application__page").length > 0) {
                activePage.removeClass("application__page_active");
                activePage
                    .next(".application__page")
                    .addClass("application__page_active");
            }

            $(".application__page").removeClass("application__page_active");
            $(".application__page")
                .eq($(this).data("number") - 1)
                .addClass("application__page_active");
            $(".application__number").removeClass("application__number_active");
            $(this).addClass("application__number_active");
            $(".file_field_forth").css("display", "none");
        } else {
            console.log(2232323);
        }
    });

    $(".application__button").on("click", function () {
        var activePage = $(".application__page.application__page_active");
        var inputs = $(
            '.application__input_initials input[type="text"], .application__input_initials input[type="number"]'
        );

        var hasEmptyInput = false;

        inputs.each(function () {
            if ($(this).val().trim() === "") {
                hasEmptyInput = true;
                return false; // Exit the loop if an empty input is found
            }
        });

        if (hasEmptyInput) {
            $(".file_field_first").css("display", "block");
        } else {
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

            $(".file_field").css("display", "none");
        }
    });

    $(".application__button_second").on("click", function () {
        var checkboxes = $(".filed_checkbox");
        var activePage = $(".application__page.application__page_active");

        if (checkboxes.is(":checked")) {
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

            $(".file_field_second").css("display", "none");
        } else {
            $(".file_field_second").css("display", "block");
        }
    });

    $(".application__button_third").on("click", function () {
        var activePage = $(".application__page.application__page_active");
        var inputs = $(".step_third_input");

        var hasEmptyInput = false;

        inputs.each(function () {
            if ($(this).val().trim() === "") {
                hasEmptyInput = true;
                return false; // Exit the loop if an empty input is found
            }
        });

        if (hasEmptyInput) {
            $(".file_field_third").css("display", "block");
        } else {
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

            $(".file_field_third").css("display", "none");
        }
    });

    $(".application__submit").on("mousemove", function () {
        var checkboxes = $(".filed_checkbox_sec");

        if (checkboxes.is(":checked")) {
            $(".application__submit_submit").css("display", "none");
            $(".file_field_second").css("display", "none");
        } else {
            $(".file_field_second").css("display", "block");
            $(".application__submit_submit").css("display", "block");
        }
    });

    $(".application__submit_submit ").on("click", function () {
        $(".file_field_fifth").css("display", "block");
    });

    $(document).on("click", function (event) {
        if (!$(event.target).closest(".application__slide").length) {
            $(".application__slide_box").slideUp();
            var container = $(".main_section_padding");
            container.animate({ minHeight: "0" });
        }
    });

    $(".application__slide_box").on("click", function (event) {
        event.stopPropagation();
    });

    $(".application__slide").on("click", function () {
        var slideContent = $(this).next();
        var container = $(".main_section_padding");

        if (!slideContent.is(":visible")) {
            container.animate({ minHeight: "730px" });
            $(".application__slide").next().slideUp();
        } else {
            container.animate({ minHeight: "0" });
        }

        slideContent.slideToggle();
        $(".application__slide_box").css("position", "relative");
    });
});

// Other Input
$(document).ready(function () {
    $(".otherCheckbox").on("change", function () {
        var isChecked = $(this).is(":checked");
        var inputContainer = $(this).parent().next(".otherInputContainer");

        if (isChecked) {
            inputContainer.fadeIn();
            inputContainer.find("input").prop("disabled", false);
        } else {
            inputContainer.fadeOut();
            inputContainer.find("input").prop("disabled", true);
        }
    });

    $("#application_form").on("submit", function (e) {
        var isChecked = $(".otherCheckbox").is(":checked");
        if (isChecked) {
            this.submit();
        }
    });
});

$(document).ready(function () {
    // Function to validate email format
    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Function to validate mobile number format
    function isValidMobile(mobile) {
        // Assuming a basic format of 10 digits (you can adjust this as needed)
        var mobileRegex = /^\d{9,15}$/;
        return mobileRegex.test(mobile);
    }

    // Attach a blur event listener to the email input field
    $(".application__button_forth").on("click", function () {
        var activePage = $(".application__page.application__page_active");
        var mobile = false;
        var email = false;

        var email = $(".mail_e").val();
        var emailError = $("#emailError");

        // Check if the email field is empty or not a valid email format
        if (email === "") {
            emailError.text($("#emailError").data("required"));
        } else if (!isValidEmail(email)) {
            emailError.text($("#emailError").data("unvalid"));
        } else {
            emailError.text(""); // Clear the error message
            email = true;
        }

        var mobile = $(".mobile_number").val();
        var mobileError = $("#mobileError");

        // Check if the mobile number field is empty or not in a valid format
        if (mobile === "") {
            mobileError.text($("#mobileError").data("number"));
        } else if (!isValidMobile(mobile)) {
            mobileError.text($("#mobileError").data("number-correctly"));
        } else {
            mobileError.text(""); // Clear the error message
            mobile = true;
        }

        if ((email === true) & (mobile === true)) {
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
        }
    });
});
