"use strict";
var KTSigninGeneral = function () {
    var t, e, i;
    return {
        init: function () {
            t = document.querySelector("#kt_sign_in_form"), e = document.querySelector("#kt_sign_in_submit"), i = FormValidation.formValidation(t, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Email address is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    username: {
                        validators: {
                            notEmpty: {
                                message: "Username tidak boleh kosong"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "Password tidak boleh kosong"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row"
                    })
                }
            }), e.addEventListener("click", (function (n) {
                n.preventDefault(), i.validate().then((function (i) {
                    "Valid" == i ? (e.setAttribute("data-kt-indicator", "on"), e.disabled = !0, setTimeout((function () {
                        e.removeAttribute("data-kt-indicator"), e.disabled = !1, Swal.fire({
                            text: "Kamu berhasil masuk!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, siap!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function (e) {
                            e.isConfirmed && (
                                t.querySelector('[name="email"]').value = "",
                                t.querySelector('[name="username"]').value = "",
                                t.querySelector('[name="password"]').value = "")
                        }))
                    }), 2e3)) : Swal.fire({
                        text: "Maaf, sepertinya terjadi kesalahan, silahkan coba lagi.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, siap!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }))
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTSigninGeneral.init()
}));