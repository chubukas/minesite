<?php include 'inc/head.php'; ?>
	
    <style>
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
                    <span>Login <span class="hide-xs-only hide-sm-only">Authentication</span></span>
                </div>
            </li>
        </ul>
        <div class="modal__body">

            <div class="tabs_item active" id="tab_auth">
                <form class="form" method="POST" onsubmit="alllogin()" >
                                                                                                                                
                    <input type="hidden" name="_token" value="O5ULJliUXs3a8BLR4tgh1KOaUejw6M98WmS2wYjY">

                    <div class="form_group">
                        <label class="form_label">E-mail:</label>
                        <div class="form_item">
                            <input type="email" class="form_control" id="loginemail" name="email" placeholder="Email" value="" required/>
                            <span class="form_message"></span>
                        </div>
                    </div>
                    <div class="form_group">
                        <label class="form_label">Password:</label>
                        <div class="form_item">
                            <input type="password" class="form_control" id="loginpassword" name="password" placeholder="********" required/>
                            <span class="form_message"></span>
                        </div>
                    </div>
                    <div class="form_group">

                        <div class="form_captcha"  id="recaptcha_auth">
    <script src="../www.google.com/recaptcha/apid41d.js?" async defer></script>

    <div size="compact" data-sitekey="6Lc_D60UAAAAALgRhnXsq3MyY-iHPB3wtBeGRc48" class="g-recaptcha"></div>
</div>
                    </div>
                    <div class="form_row">
                        <div class="form_col center_box">
                            <a href="forgotpassword" class="right">Forgot password?</a>
                        </div>
                        <div class="form_col">
                            <button type="submit" id="loginbtn" name ="btn-login" class="btn btn_blue">Login</button>
                        </div>
                    </div>
                                    </form>
            </div>

        </div>

    </div>

<?php include 'inc/foot.php'; ?>