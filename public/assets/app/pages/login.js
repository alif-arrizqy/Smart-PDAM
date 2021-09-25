"use strict";
$(function () {
    $("#login-form").validate({
        rules: {
            email: {
                required: !0,
                email: !0
            },
            password: {
                required: !0,
                minlength: 6
            }
        },
        messages: {
            email: {
                required: "Please enter your email",
                email: "Your email is not valid"
            },
            password: {
                required: "Please provide your password",
                minlength: $.validator.format("Please enter at least {0} characters")
            }
        },
        submitHandler: function (e) {
            e.submit()
        }
    })
});