var Succecss = false;
var full_number = '';
var PhoneCode = '';
var CountryCode = '';


var phone_number = window.intlTelInput(document.querySelector("#phone_number"), {separateDialCode: true, hiddenInput: "full", utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"}).setCountry('{{ strtoupper(old("country_code")) ?? "BH" }}');

$(document).on('submit', "form", function(e) {
    full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
    PhoneCode = phone_number.getSelectedCountryData().dialCode;
    CountryCode = phone_number.getSelectedCountryData().iso2;
    $("input[name='phone_number[full]'").val(CountryCode);
    $('#country_code').val(CountryCode);
    $('#phone_code').val(PhoneCode);
});


$(document).ready(function () {
    const firebaseConfig = {
        apiKey: "AIzaSyBXTc9DdsXuFXHG0ZH4egW6SiAoz4yJyfk",
        authDomain: "matjr-4ed68.firebaseapp.com",
        projectId: "matjr-4ed68",
        storageBucket: "matjr-4ed68.appspot.com",
        messagingSenderId: "401437795899",
        appId: "1:401437795899:web:08eb98f4df59d46bd35e1e",
        measurementId: "G-QMGH683BLD",
    };

    firebase.initializeApp(firebaseConfig);
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
        "recaptcha-container",
        {
            size: "invisible",
            callback: function (response) {
                // console.log("recaptcha resolved");
            },
        }
    );
    onSignInSubmit();

    $("form").submit(function (e) {
        if (Succecss == false) {
            e.preventDefault();
            swal({
                title: "Verify Phone No",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            });
        } else {
            $("form").submit();
        }
    });


    function onSignInSubmit() {
        $("#verifPhNum").on("click", function () {
            let phoneNo = "";
            var code = $("#codeToVerify").val();
            $(this).attr("disabled", "disabled");
            $(this).text("Processing...");
            confirmationResult.confirm(code).then(
                    function (result) {
                        swal({
                            title: "😀❤️ Succecss",
                            icon: "success",
                            buttons: true,
                            dangerMode: true,
                        });
                        Succecss = true;
                        $("#Verify_phone_number").addClass("d-none");
                        $("#getcode").addClass("d-none");
                        $("#phone_number").prop("readonly", true);
                        $("#phone_number").addClass("border border-success");
                        $(".iti").addClass("disabled");
                    }.bind($(this))
                ).catch(
                    function (error) {
                        $(this).removeAttr("disabled");
                        swal({
                            title: "Invalid Code",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        });
                        setTimeout(() => {
                            $(this).text("Verify Phone No");
                        }, 2000);
                    }.bind($(this))
                );
        });

        $("#getcode").on("click", function () {
            var phoneNo = "+" +phone_number.getSelectedCountryData().dialCode + $("#phone_number").val();
            var appVerifier = window.recaptchaVerifier;
            firebase.auth().signInWithPhoneNumber(phoneNo, appVerifier).then(function (confirmationResult) {
                    window.confirmationResult = confirmationResult;
                    coderesult = confirmationResult;
                    $("#Verify_phone_number").removeClass("d-none");
                }).catch(function (error) {
                    swal({
                        title: error.message,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    });
                });
        });

        $(".disabled").on("click", function (event) {
            event.preventDefault();
            return false;
        });
    }
});

