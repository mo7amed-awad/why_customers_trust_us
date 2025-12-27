

@once('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.16/build/css/intlTelInput.css" />
    <style>
        .iti--separate-dial-code .iti__selected-flag {
            background-color: transparent !important;
        }
        
        .iti--allow-dropdown .iti__flag-container,
        .iti--separate-dial-code .iti__flag-container {
            left: auto !important;
        }
        
        .iti__country-list {
            overflow-y: auto !important;
        }
        
        .iti {
            width: 100% !important;
            direction: ltr;
        }
        
        .iti--inline-dropdown .iti__dropdown-content{
            right: inherit;
        }
            
        ul.iti__country-list {
            background: white;
            width: 100%;
        }
    </style>
@endonce


@once('js')
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.16/build/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.16/build/js/utils.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const telInput = document.querySelector("input[name='phone']");

        const iti = window.intlTelInput(telInput, {
            allowExtensions: true,
            autoHideDialCode: true,
            formatOnDisplay: false,
            strictMode: true,
            onlyCountries: ['SA', 'AE', 'QA', 'OM', 'BH', 'KW'],
            initialCountry: 'SA',
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.16/build/js/utils.js"
        });

        const reset = () => telInput.classList.remove("error");

        telInput.addEventListener('blur', function () {
            reset();
            if (telInput.value.trim() && !iti.isValidNumber()) {
                telInput.classList.add("error");
            }
        });

        telInput.addEventListener('change', reset);
        telInput.addEventListener('keyup', reset);

        telInput.addEventListener('countrychange', function () {
            const countryData = iti.getSelectedCountryData();
            document.querySelector('input[name="country_code"]').value = countryData.iso2.toUpperCase();
            document.querySelector('input[name="phone_code"]').value = countryData.dialCode;
        });

        iti.setCountry(document.querySelector('input[name="country_code"]').value);
    });
    </script>
@endonce
