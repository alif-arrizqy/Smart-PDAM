"use strict";
$(function () {
    $.validator.addMethod("notEqual", function (e, a, r) {
        return r !== e
    }, "Value must not equal arg."), $("#validate-1").validate({
        rules: {
            username: {
                required: !0,
                minlength: 5
            },
            firstName: {
                required: !0,
                minlength: 5
            },
            lastName: {
                required: !0,
                minlength: 5
            },
            age: {
                required: !0,
                number: !0,
                min: 17
            },
            gender: {
                notEqual: "default"
            },
            email: {
                required: !0,
                email: !0
            },
            homepage: {
                required: !0,
                url: !0
            },
            password1: {
                required: !0,
                minlength: 6
            },
            password2: {
                required: !0,
                minlength: 6,
                equalTo: '[name="password1"]'
            },
            agreement: {
                required: !0
            }
        },
        messages: {
            username: {
                required: "Please enter your username",
                minlength: $.validator.format("Please enter at least {0} characters")
            },
            firstName: {
                required: "Please enter your firstname",
                minlength: $.validator.format("Please enter at least {0} characters")
            },
            lastName: {
                required: "Please enter your lastname",
                minlength: $.validator.format("Please enter at least {0} characters")
            },
            age: {
                required: "Please enter your age",
                number: "Please enter a valid number",
                min: $.validator.format("You must {0} years old")
            },
            gender: {
                notEqual: "Please enter your gender"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter your valid email"
            },
            homepage: {
                required: "Please enter your homepage link",
                url: "Your link is not valid"
            },
            password1: {
                required: "Please provide your password",
                minlength: $.validator.format("Please enter at least {0} characters")
            },
            password2: {
                required: "Please repeat your password",
                minlength: $.validator.format("Please enter at least {0} characters"),
                equalTo: "Your password not match"
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