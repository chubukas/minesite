<?php include 'inc/head.php'; ?>
    
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.form.js"></script>

    <link href="css/select2.min.css" rel="stylesheet" >

    <script src="js/regvalidation.js"></script>
    <link rel="stylesheet" href="css/intlTelInput.css">

    <style>
        @media  only screen and (min-width: 575px) {
            .hide-lg-only {
                display: none !important;
            }
        }
        .form_hint {
            background: #fc0;
            -moz-border-radius: 3px 3px 3px 3px;
            -webkit-border-radius: 3px 3px 3px 3px;
            border-radius: 3px 3px 3px 3px;
            color: #1c2555;
            margin-left: 8px;
            padding: 1px 6px;
            z-index: 999;
            position: absolute;
            display: none;
            font-weight: normal;
            font-size: 12px;
        }
        ::-webkit-validation-bubble-message {
            padding: 0;
        }
        input:focus:invalid, select:focus:invalid, textarea:focus:invalid, .invalid { /* when a field is considered invalid by the browser */
                border-color: #b03535
            }
        input:required:valid, select:required:valid, textarea:required:valid { /* when a field is considered valid by the browser */
            border-color: #28921f;
        }
        .form_hint::before {
            content: "\25B2"; /* left point triangle in escaped unicode */
            color:#fc0;
            position: absolute;
            bottom:73%;
            left: 5%;
        }
        .validate input:focus + .form_hint {display: block;}
        .validate input:required:valid + .form_hint {background: #fc0;} /* change form hint color when valid */
        .validate input:required:valid + .form_hint::before {color:#fc0;} /* change form hint arrow color when valid */

        .form_checkbox {
            font-size: 0;
            line-height: 0;
            font-weight: 400;
            cursor: pointer;
            display: inline-block;
        }
        .tab_auth.active {
            border-bottom: 1px solid var(--theme-color);
            margin: auto;
        }

        .tab_auth.active span {
            color: #707985;
            font-size: 1.8rem;
            line-height: 2rem;
            text-transform: uppercase;
        }

        .tab_auth.active span {
            color: #27323f;
            font-weight: 600;
        }

        .tab_auth.active .tophead {
            color: #707985;
            font-size: 1.8rem;
            line-height: 2rem;
            padding-bottom: 20px;
            display: inline-block;
            text-decoration: none;
            text-transform: uppercase;
            /*border-bottom: 2px solid transparent;*/
        }
    </style>

    <div class="modal tabs" id="auth-things" style="display: block; margin: 50px auto;">
        <ul class="modal__nav">
            <li class="tab_auth active">
                <div class="tophead">
                    <span>Create an Account</span>
                </div>
            </li>
        </ul>
        <div class="modal__body">

            <div class="tabs_item active" id="tab_auth">
                <form class="form" onsubmit="reg_user()">
                                                                        
                    <input type="hidden" name="_token" value="O5ULJliUXs3a8BLR4tgh1KOaUejw6M98WmS2wYjY">

                    <!-- <div class="form_group" style="display: block">
                        <label class="form_label">Referral Email (Optional):</label>
                        <div class="form_item">
                                                        <input type="email" placeholder="Referral Email"
                                   name="refemail"
                                   style="width:100%" class="form_control">
                            <span class="form_message"></span>   
                                                    </div>         
                     </div> -->
                    <div class="form_group">
                        <label class="form_label">E-mail:</label>
                        <div class="form_item">
                            <input required type="email" class="form_control" id="useremail" name="email" placeholder="Email"
                                    />
                        </div>
                    </div>
                    <div class="form_group">
                        <label class="form_label">Full Name:</label>
                        <div class="form_item">
                            <input required type="text" placeholder="Full Name"  name="fullname"
                                   value="" style="width:100%"id="username" class="form_control">
                            <span class="form_message"></span>
                        </div>
                    </div>
                    <div class="form_group">
                        <label class="form_label">Gender:</label>
                        <div class="form_item">
                            <select name="gender" id="gender" style="width:100%" class="form_control form_select" >
                                <option value="">Select your gender</option>
                                <option value="male" >Male</option>
                                <option value="female" >Female</option>
                            </select>
                            <span class="form_message"></span>
                        </div>
                    </div>

                    <div class="form_group">
                        <label class="form_label">Phone Number:</label>
                        <input required type="number" id="userphone"  name="phone" value="" class="form_control" style="width:100%;">
                    </div>

                    <div class="form_group">
                        <label class="form_label">Counntry:</label>
                        <select id="country" class="form_control">
<?php

$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

foreach ($countries as $country) {
   echo "<option value='".$country."'>".$country."</option>";
}

?>
                        </select>
                    </div>

                    <div class="form_group">
                        <label class="form_label">BTC Address:</label>
                        <input required type="text" id="btcaddress"  name="phone" value=""
                               class="form_control" style="width:100%;">
                        
                    </div>
                    

                    <div class="form_group">
                        <label class="form_label">Password:</label>
                        <div class="form_item">
                            <input required type="password" placeholder="Password" name="password" style="width:100%" id="onepassword" class="form_control">
                           <div id="resone"></div>
                        </div>
                    </div>

                    <div class="form_group">
                        <label class="form_label">Confirm password:</label>
                        <div class="form_item">
                            <input required type="password" placeholder="Password" name="password" style="width:100%"
                                   id="twopassword" class="form_control">
                                   <div id="restwo"></div>
                        </div>
                    </div>
 <!-- oninput="passworda(this)"  pattern="(?=.*\d)(?=.*[A-Za-z]).{6,}" -->
                    <div class="form_group">
                        <!-- <label class="form_checkbox"> -->
                            <input required type="checkbox"  id="age" name="age" >
                            <span>I am 18 years of age or older</span>
                        <!-- </label> -->
                        <div id="ageErr" class="form_hint">This field is !</div>
                    </div>
                    <!-- <div class="form_group">
                     
                            <input required type="checkbox"  id="agree" name="agree" >
                            <span>
                                I agree to <b>Matrixcapitals</b> <a href="terms-and-conditions" target="_blank">Terms and conditions</a>
                            </span>
                       
                        <div id="agreeErr" class="form_hint">This field is !</div>
                    </div>
                    <div class="form_group">
                     
                            <input type="checkbox" id="mail" name="mail" >
                            <span>
                                I agree to receive <b>Matrixcapitals</b> and third party emails
                            </span>
                       
                        <div id="mailErr" class="form_hint">This field is !</div>
                    </div> -->


                    <div class="form_group">

                        <div class="form_captcha"  id="recaptcha_auth">
    <script src="www.google.com/recaptcha/apid41d.js?" async defer></script>

    <div size="compact" data-sitekey="6Lc_D60UAAAAALgRhnXsq3MyY-iHPB3wtBeGRc48" class="g-recaptcha"></div>
</div>
                    </div>
                    <div class="form_row">
                        <div class="form_col center_box hide-xs-only">
                            <a href="login" class="right">Already have an account?</a>
                        </div>
                        <div class="form_col right">
                            <button type="submit" name="btn-reg" class="btn btn_blue">Register</button>
                        </div>
                        <div class="form_col center_box hide-lg-only">
                            <a href="login" class="right">Already have an account?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


   <!--  <script src="js/intlTelInput.js"></script>
    <style>
        .intl-tel-input .country-list {
            background-color: #fff !important;
            border: 1px solid #dbd7d7 !important;
        }

        .intl-tel-input .country-list .divider {
            border-bottom: 1px solid #2D2D2D !important;
        }

        .intl-tel-input .selected-flag .iti-arrow {
            border-top: 4px solid #F1F1F1 !important;
        }
    </style> -->
    <!-- <script>
        var countryData = $.fn.intlTelInput.getCountryData(),
            telInput = $("#mobile-number"),
            addressDropdown = $("#address-country");

        telInput.intlTelInput({
            initialCountry: "auto",
            customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
                return "e.g. " + selectedCountryPlaceholder;
            },
            preferredCountries: ["us", "gb"],
            geoIpLookup: function (callback) {
                $.get("https://json.geoiplookup.io/", function () {
                }, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country_code) ? resp.country_code : "";
                    callback(countryCode);
                });
            },
            utilsScript: "js/utils.js" // just for formatting/placeholders etc
        });

        // populate the country dropdown
        $.each(countryData, function (i, country) {
            addressDropdown.append($("<option></option>").attr("value", country.name).text(country.name));
        });
        // set it\'s initial value
        var initialCountry = telInput.intlTelInput("getSelectedCountryData").name;
        addressDropdown.val(initialCountry);

        // listen to the telephone input for changes
        telInput.on("countrychange", function (e, countryData) {
            addressDropdown.val(countryData.name);
        });

        // listen to the address dropdown for changes
        addressDropdown.change(function () {
            telInput.intlTelInput("setCountry", $(this).val());
        });

        // $("#register").submit(function (e) {
        //     telInput.val(telInput.intlTelInput("getNumber"));
        // });

        function setAlert(el) {
            el.parentElement.nextElementSibling.style.display = "block";
        }

        function removeAlert(el) {
            el.parentElement.nextElementSibling.style.display = "none";
        }

        $(document).ready(function () {
            $('.page').css('background', '#eee');

            $('.form_checkbox input').change(function(){
                if(this.checked) removeAlert(this);
                else setAlert(this);

                return false;
            });

            $('form').submit(function () {

                telInput.val(telInput.intlTelInput("getNumber"));

                $age = document.getElementById('age');
                $agree = document.getElementById('agree');
                $mail = document.getElementById('mail');

                if (!$age.checked) {
                    setAlert($age);
                    return false;
                }
                else if (!$agree.checked) {
                    setAlert($agree);
                    return false;
                }
                else if (!$mail.checked) {
                    setAlert($mail);
                    return false;
                }

                return true;
            });
        });

    </script> -->

<?php include 'inc/foot.php'; ?>