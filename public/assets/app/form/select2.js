"use strict";
$(function () {
    var e = "rtl" === $("html").attr("dir") ? "rtl" : "ltr";
    $("#select2-1, #select2-2, #select2-3, #select2-4").select2({
        dir: e,
        dropdownAutoWidth: !0
    })
});