<!-- Footer -->
<footer class="footer fadeInUp wow">
    <!-- <div class="container">
        <div class="footer__row">
            <div class="footer__left">
                <a href="index" class="footer__logo">
                    <img src="img/header__logo.png" class="img-fluid" alt=""/>
                </a>
                <div>
                    © 2021 MatrixCapitals.<br/>
                    All rights reserved.
                </div>
            </div>
            <div class="footer__center">
                <ul class="footer__nav">
                    <li>
                        <a href="index">
                            <i class="fas fa-angle-right"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="contact-us">
                            <i class="fas fa-angle-right"></i>
                            <span>Contact Us</span>
                        </a>
                    </li>
                    <li>
                        <a href="faqs">
                            <i class="fas fa-angle-right"></i>
                            <span>FAQs</span>
                        </a>
                    </li>
                    <li>
                        <a href="terms-and-conditions">
                            <i class="fas fa-angle-right"></i>
                            <span>Terms and Conditions</span>
                        </a>
                    </li>
                    <li>
                        <a href="cookies-policy">
                            <i class="fas fa-angle-right"></i>
                            <span>Cookies Policy</span>
                        </a>
                    </li>
                    <li>
                        <a href="about-us">
                            <i class="fas fa-angle-right"></i>
                            <span>About Us</span>
                        </a>
                    </li>
                    <li>
                        <a href="affiliate-program">
                            <i class="fas fa-angle-right"></i>
                            <span>Affiliate Program</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer__right">
                <div class="footer__social">
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div> -->
</footer>
</div>







<script src="js/modernizr-3.5.0.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/wow.min.js"></script>

<script src="js/main.js"></script>
<script src="js/plugins.js"></script>

<script src="js/toastr.js"></script>
<link rel="stylesheet" href="css/toastr.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
 <script src="js/function.js"></script>
 
 <link rel="stylesheet" href="css/ion.rangeSlider.css">
 <link rel="stylesheet" href="css/ion.rangeSlider.skinHTML5.css">
 <script src="js/rangeSlider.min.js"></script>
 <script src="js/index.js"></script> 
 <script src="js/sweet.js"></script>
 <script src="js/sweetalert2.js"></script>
 

    <script>
        var formatDollar = function(num, places) {
            num *= 1;
            var p = num.toFixed(places).split(".");

            var output = "$ " + p[0].split("").reverse().reduce(function(acc, num, i, orig) {
                return  num=="-" ? acc : num + (i && !(i % 3) ? "," : "") + acc;
            }, "");

            output = p[1] ? output + "." + p[1] : output;

            return output;
        };

        var $range = $(".range_47");
        $range.ionRangeSlider();

        $range.on("change", function () {
            var $this = $(this),
                value = $this.prop("value");
            var output = $this.prop("value") * ($this.data("cent")/100);
            $("#"+$this.data("id")).val( formatDollar($this.prop("value")) );
            $("#"+$this.data("per")).html( formatDollar(output, 2) );
            $("#"+$this.data("total")).html( formatDollar((output + value * 1), 2) );
            console.log("Value: " + value);
        });
    </script>
</body>

<!-- Mirrored from MatrixCapitals.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jun 2020 11:35:24 GMT -->
</html>