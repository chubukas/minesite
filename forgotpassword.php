<?php include 'inc/head.php'; ?>
    <style>
        .form_row .form_col {
            margin-left: 5%;
        }
        @media  only screen and (min-width: 575px) {
            .form_row .form_col {
                margin-left: 20%;
            }
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
                    <span>Forgot your password?</span>
                </div>
            </li>
        </ul>
        <div class="modal__body">

            <div class="tabs_item active" id="tab_auth">
                <form class="form" method="POST" action="">
                
                    <input type="hidden" name="_token" value="O5ULJliUXs3a8BLR4tgh1KOaUejw6M98WmS2wYjY">

                    <div class="form_group">
                        <label class="form_label">E-mail:</label>
                        <div class="form_item">
                            <input type="email" class="form_control" id="email" name="email" placeholder="Email" value="" required/>
                            <span class="form_message"></span>
                        </div>
                    </div>

                    <div class="form_group">

                        <div class="form_captcha"  id="recaptcha_auth">
    <script src="../../www.google.com/recaptcha/apid41d.js?" async defer></script>

    <div size="compact" data-sitekey="6Lc_D60UAAAAALgRhnXsq3MyY-iHPB3wtBeGRc48" class="g-recaptcha"></div>
</div>
                    </div>

                    <div class="form_row">
                        <div class="form_col">
                            <button type="submit" name="btn-forgotpw" class="btn btn_blue">Send Password Reset Link</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>

<?php include 'inc/foot.php'; ?>