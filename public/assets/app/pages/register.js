"use strict";
$(function () {
    $("#register-form").validate({
        rules: {
            firstName: {
                required: !0,
                minlength: 5
            },
            lastName: {
                required: !0,
                minlength: 5
            },
            email: {
                required: !0,
                email: !0
            },
            password: {
                required: !0,
                minlength: 6
            },
            passwordConfirm: {
                required: !0,
                minlength: 6,
                equalTo: "#password"
            },
            agreement: {
                required: !0
            }
        },
        messages: {
            firstName: {
                required: "Please enter your first name",
                minlength: $.validator.format("Please enter at least {0} characters")
            },
            lastName: {
                required: "Please enter your last name",
                minlength: $.validator.format("Please enter at least {0} characters")
            },
            email: {
                required: "Please enter your email",
                email: "Your email is not valid"
            },
            password: {
                required: "Please provide your password",
                minlength: $.validator.format("Please enter at least {0} characters")
            },
            passwordConfirm: {
                required: "Please repeat your password",
                minlength: $.validator.format("Please enter at least {0} characters"),
                equalTo: "Your password is not match"
            },
            agreement: {
                required: "Check to accept the agreement"
            }
        },
        submitHandler: function (e) {
            e.submit()
        }
    })
});