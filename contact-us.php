<?php include 'inc/head.php'; ?>
	
    <div class="main_heading">
        <div class="main_heading__row">
            <div class="container">
                <div class="main_heading__wrap">
                    <div class="main_heading__col">
                        <ul class="breadcrumb">
                            <li><a href="index">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact">
        <div class="container">
            <div class="contact__row">
                <div class="contact__info">
                    <h4>Contacts</h4>
                    <ul>
                        <li><strong>E-mail: </strong> <a href="mailto:info@matrixcapitals.com">info@matrixcapitals.com</a></li>
                        <li><strong>Support E-mail: </strong> <a href="mailto:support@matrixcapitals.com">support@matrixcapitals.com</a></li>
                        
                        <!-- <li><strong>Phone: </strong> <a href="tel: </a></li> -->
                        <li><strong>Company name: </strong> Matrixccapitals.</li>
                        <!--<li><strong>Company Phone: </strong> +1 (475) 212-6676</li>-->
                        <li><strong>Company Address: </strong> Saint Augustine, Florida.</li>
                        
                    </ul>
                </div>
                <div class="contact__form zoomIn wow" style="visibility: visible; animation-name: zoomIn;">
                    <div class="contact__form_heading">
                        <h4>Feedback</h4>
                    </div>
                    <form class="form" method="POST" action="">
                    
                        <input type="hidden" name="_token" value="O5ULJliUXs3a8BLR4tgh1KOaUejw6M98WmS2wYjY">

                        <div class="form_row">
                            <div class="form_col_elem">
                                <div class="form_group">
                                    <label class="form_label">Category:</label>
                                    <select class="form_control form_select" name="subject" required id="subject">
                                        <option value="">Select a category</option>
                                        <option value="Financial support" >Financial support</option>
                                        <option value="Marketing support" >Marketing support</option>
                                        <option value="Technical support" >Technical support</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_col_elem">
                                <div class="form_group">
                                    <label class="form_label">Your E-mail:</label>
                                    <div class="form_item">
                                        <input class="form_control" required name="email" type="email" id="email" value=""/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form_group">
                            <label class="form_label">Your Full Name:</label>
                            <div class="form_item">
                                <input class="form_control" required type="text" id="firstname" name="firstname" value=""/>
                            </div>
                        </div>
                        <div class="form_group">
                            <label class="form_label">Message:</label>
                            <div class="form_item">
                                <textarea class="form_control" required name="message" id="message" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form_row">
                            <div class="form_col center_box">


                                <div class="form_captcha"  id="recaptcha_auth">
    <script src="../www.google.com/recaptcha/apid41d.js?" async defer></script>

    <div size="compact" data-sitekey="6Lc_D60UAAAAALgRhnXsq3MyY-iHPB3wtBeGRc48" class="g-recaptcha"></div>
</div>

                            </div>
                            <div class="form_col center_box">
                                <button type="submit" class="btn btn_blue" name="btn-send">Send</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>

<?php include 'inc/foot.php'; ?>