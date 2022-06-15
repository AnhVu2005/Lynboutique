<footer class="footer-two">
    <!-- brand logo area start -->
    <div class="brand-logo">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="barnd-bg">
                        <a href="#"><img src="/DoAnTotNghiep/accets/img/brand/ncc1.png" alt="Brand Logo" /></a>
                        <a href="#"><img src="/DoAnTotNghiep/accets/img/brand/ncc2.png" alt="Brand Logo" /></a>
                        <a href="#"><img src="/DoAnTotNghiep/accets/img/brand/ncc3.png" alt="Brand Logo" /></a>
                        <a href="#"><img src="/DoAnTotNghiep/accets/img/brand/ncc4.png" alt="Brand Logo" /></a>
                        <a href="#"><img src="/DoAnTotNghiep/accets/img/brand/ncc5.png" alt="Brand Logo" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand logo section end -->

    <!-- footer-top area start -->
    <div class="footer-top section-padding">
        <div class="footer-dsc">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="single-text">
                            <div class="footer-title">
                                <h4>Contact</h4>
                            </div>
                            <div class="footer-text">
                                <ul>
                                    <li>
                                        <i class="mdi mdi-map-marker"></i>
                                        <p>Số 90 Đại La</p>
                                        <p>Hai Bà Trưng, Hà Nội</p>
                                    </li>
                                    <li>
                                        <i class="mdi mdi-phone"></i>
                                        <p>(+84) 037 463 3555</p>
                                        <p>(+84) 096 526 6666</p>
                                    </li>
                                    <li>
                                        <i class="mdi mdi-email"></i>
                                        <p>lynbotique@gmail.com</p>
                                         <p>lynbotique12@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-4 wide-mobile">
                        <div class="single-text">
                            <div class="footer-title">
                                <h4>Social Media</h4>
                            </div>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="https://www.facebook.com/Lyns-Boutique-109930084047756"><i class="mdi mdi-menu-right"></i>FACE BOOK</a></li>
                                    <li><a href="https://www.instagram.com"><i class="mdi mdi-menu-right"></i>INSTAGRAM</a></li>
                                    <li><a href="https://www.tiktok.com"><i class="mdi mdi-menu-right"></i>TIKTOK</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-4 wide-mobile">
                        <div class="single-text">
                            <div class="footer-title">
                                <h4>shipping</h4>
                            </div>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="https://www.ghn.vn"><i class="mdi mdi-menu-right"></i>Giao hàng nhanh</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-top area end -->
</footer>
<!-- footer section end -->

<!-- all js here -->
<!-- jquery latest version -->
<script src="/DoAnTotNghiep/accets/js/vendor/jquery-1.12.3.min.js"></script>
<!-- bootstrap js -->
<script src="/DoAnTotNghiep/accets/js/bootstrap.min.js"></script>
<!-- owl.carousel js -->
<script src="/DoAnTotNghiep/accets/js/owl.carousel.min.js"></script>
<!-- meanmenu js -->
<script src="/DoAnTotNghiep/accets/js/jquery.meanmenu.js"></script>
<!-- countdown JS -->
<!-- <script src="/DoAnTotNghiep/accets/js/countdown.js"></script> -->
<!-- nivo.slider JS -->
<script src="/DoAnTotNghiep/accets/js/jquery.nivo.slider.pack.js"></script>
<!-- simpleLens JS -->
<script src="/DoAnTotNghiep/accets/js/jquery.simpleLens.min.js"></script>
<!-- jquery-ui js -->
<script src="/DoAnTotNghiep/accets/js/jquery-ui.min.js"></script>
<!-- load-more js -->
<!-- <script src="/DoAnTotNghiep/accets/js/load-more.js"></script> -->
<!-- plugins js -->
<script src="/DoAnTotNghiep/accets/js/plugins.js"></script>
<!-- main js -->
<script src="/DoAnTotNghiep/accets/js/main.js"></script>

<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "110535711664572");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v14.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<?php
    mysqli_close($ket_noi);
?>