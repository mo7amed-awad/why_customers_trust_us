document.addEventListener("DOMContentLoaded", function () {
    const telInput = document.querySelector(".phone");
    const form = telInput.closest("form");

    const iti = window.intlTelInput(telInput, {
        initialCountry: "auto",
        preferredCountries: ["sa", "ae", "qa", "om", "bh", "kw", "ma", "us"],
        onlyCountries: [
            "dz", "bh", "eg", "iq", "jo", "kw", "lb", "ly", "ma", "mr",
            "om", "ps", "qa", "sa", "sd", "sy", "tn", "ae", "ye", "so",
            "dj", "km"
        ],
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.10/build/js/utils.js",
    });

    iti.setCountry("bh");

    form.addEventListener("submit", function(e) {
        document.getElementById("country_code").value = iti.getSelectedCountryData().dialCode;
        document.getElementById("phone_full").value = iti.getNumber();
    });
});