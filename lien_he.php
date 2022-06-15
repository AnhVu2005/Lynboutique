<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Liên hệ</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/logo.jpg">
    <link rel="stylesheet" type="text/css" href="accets/css/custom.css">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>
    
    <!-- contact content section start -->
    <div class="pages contact-page section-padding">
        <div class="content-for-layout">
        <section id="content" class="container-body body-content--contact body-height-calc">
            <div class="page-wrap contact-wrap">
                <div class="page-title-head">
                    <strong class="font-playfair text-center" style="color: #333;">LIÊN HỆ</strong>
                </div>
                <div class="contact-center-wrap">
                    <div class="row">
                        <div class="col-xs-12 contact-content text-center">
                            <strong>Trân trọng cảm ơn Quý khách đã liên hệ với Lyn.</strong>
                            <strong>Mọi thông tin khác</strong>
                            <p>xin được tiếp nhận qua số Hotline: 037 463 3555.</p>
                        </div>
                    </div>
                    <form action="./lien_he_thuc_hien.php" enctype="multipart/form-data" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="__session_id" value="b09774f4-f010-458b-810f-c02063c9bbb1">
                        <input type="hidden" name="_csrf_token" value="ZQMcAD8GDxMaZhAhUBkfAiQ5fScNPws6T5LsxuYvc_tNivMQVu8EysDx">
                        <input type="hidden" name="utf8" value="✓">
          
            
                        <div class="row contact-form">
                            <div class="is-vertical-flex form-group">
                                <label for="exampleInputEmail1">Họ và tên<span class="field-required"> *</span></label>
                                <input type="text" class="form-control" name="first_name" id="customerName" autocomplete="off" required>
                            </div>
                            <div class="is-vertical-flex form-group">
                                <label for="exampleInputEmail1">Email<span class="field-required"> *</span></label>
                                <input type="email" class="form-control" name="email" id="customerEmail" autocomplete="off" required>
                            </div>
                            <div class="is-vertical-flex form-group">
                                <label for="exampleInputEmail1">Số điện thoại<span class="field-required"> *</span></label>
                                <input type="tel" class="form-control" name="phone_number" id="customerPhone" autocomplete="off" required>
                            </div>
                            <div class="is-vertical-flex form-group">
                                <label for="exampleInputEmail1">Nội dung<span class="field-required"> *</span></label>
                                <textarea class="form-control" name="description" id="customerFeedbackContent" rows="6" required></textarea>
                            </div>
                        </div>
                        <div class="row contact-button text-center">
                            <div class="form-group" style="margin-top: 10px">
                                <input type="submit" class="btn default-btn btn-send" value="GỬI" id="btn-submit">
                                <button type="button" class="btn default-btn" onclick="window.location.href = window.location.href">LÀM LẠI</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
        <div class="container text-center">
            <div class="row mt-5">
                <div class="col-12 col-text-center">
                    <div class="contact-details">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="single-contact">
                                    <i class="mdi mdi-map-marker"></i>
                                    <p>Số 90 Đại La</p>
                                    <p>Hai Bà Trưng, Hà Nội</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-contact">
                                    <i class="mdi mdi-phone"></i>
                                    <p>(+84) 037 463 3555</p>
                                    <p>(+84) 096 526 6666</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-contact">
                                    <i class="mdi mdi-email"></i>
                                    <p>lynbotique@gmail.com</p>
                                    <p>lynbotique12@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact content section end -->

    <?php include 'includes/footer.php'; ?>
    
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
        
            var mapOptions = {
            zoom: 17,
            hue: '#E9E5DC',
            scrollwheel: false,
            mapTypeId:google.maps.MapTypeId.TERRAIN,
            center: new google.maps.LatLng(18.6797191,105.674984)
            };

            var map = new google.maps.Map(document.getElementById('googleMap'),
                mapOptions);


            var marker = new google.maps.Marker({
            position: map.getCenter(),
            icon: 'accets/img/map-marker.png',
            map: map
            });

        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script> 
</body>
</html>