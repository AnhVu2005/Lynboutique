<?php

use function PHPSTORM_META\type;

 session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Mua Hàng Onl</title>
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
                    <strong class="font-playfair text-center" style="color: #333;">Thông tin đặt hàng online</strong>
                </div>
                <div class="contact-center-wrap">
                    <div class="row">
                        <div class="col-xs-12 contact-content text-center">
                            <strong>Mọi thông tin khác</strong>
                            <p>xin được tiếp nhận qua số Hotline: 037 463 3555.</p>
                        </div>
                    </div>
                    <form action="/DoAnTotNghiep/vnpay_php/vnpay_create_payment.php" enctype="multipart/form-data" id="create_form" method="post" accept-charset="UTF-8">
                      
                        <div class="row contact-form">
                            <div class="is-vertical-flex form-group">
                                <label for="exampleInputEmail1">Tên thanh toán<span class="field-required"> *</span></label>
                                <input class="form-control" id="payment_name" name="payment_name" type="text" value="<?php echo $_SESSION['thong_tin_khach_tt']['ten_kh'] ?>" disabled placeholder="Payment Name" required>
                            </div>
                            <div class="is-vertical-flex form-group">
                                <label for="exampleInputEmail1">Mã hóa đơn<span class="field-required"> *</span></label>
                                <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo date("YmdHis") ?>" required>
                            </div>
                            <div class="is-vertical-flex form-group">
                                <label for="exampleInputEmail1">Số tiền<span class="field-required"> *</span></label>
                                <input class="form-control" id="amounted" name="amount" type="number" value="<?php echo $_SESSION['tong_tien_gio_hang'] ?>" disable required>
                            </div>
                            <div class="is-vertical-flex form-group">
                                <label for="exampleInputEmail1">Nội dung thanh toán<span class="field-required"> *</span></label>
                                <textarea class="form-control" id="order_desc" name="order_desc" rows="6" required></textarea>
                            </div>
                            <div class="is-vertical-flex form-group">
                                <label class="control-label col-sm-4">Ngân hàng</label>
                                <select name="bank_code" id="bank_code" class="form-control" style="padding: 5px;">
                                    <option value="">Không chọn</option>
                                    <option value="NCB"> Ngan hang NCB</option>
                                    <option value="AGRIBANK"> Ngan hang Agribank</option>
                                    <option value="SCB"> Ngan hang SCB</option>
                                    <option value="SACOMBANK">Ngan hang SacomBank</option>
                                    <option value="EXIMBANK"> Ngan hang EximBank</option>
                                    <option value="MSBANK"> Ngan hang MSBANK</option>
                                    <option value="NAMABANK"> Ngan hang NamABank</option>
                                    <option value="VNMART"> Vi dien tu VnMart</option>
                                    <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                    <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                    <option value="HDBANK">Ngan hang HDBank</option>
                                    <option value="DONGABANK"> Ngan hang Dong A</option>
                                    <option value="TPBANK"> Ngân hàng TPBank</option>
                                    <option value="OJB"> Ngân hàng OceanBank</option>
                                    <option value="BIDV"> Ngân hàng BIDV</option>
                                    <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                    <option value="VPBANK"> Ngan hang VPBank</option>
                                    <option value="MBBANK"> Ngan hang MBBank</option>
                                    <option value="ACB"> Ngan hang ACB</option>
                                    <option value="OCB"> Ngan hang OCB</option>
                                    <option value="IVB"> Ngan hang IVB</option>
                                    <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                                </select>
                            </div>
                            <div class="is-vertical-flex form-group">
                                <label class="control-label col-sm-4">Ngôn ngữ</label>
                                <select name="language" id="language" class="form-control" style="padding: 5px;">
                                    <option value="vn">Tiếng Việt</option>
                                    <option value="en">English</option>
                                </select>
                            </div>
                        </div>
                        <div class="row contact-button text-center">
                            <div class="form-group" style="margin-top: 10px">
                                <input type="submit" class="btn default-btn btn-send" value="Thanh toán" name="redirect" id="redirect">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    <!-- contact content section end -->

    <?php include 'includes/footer.php'; ?>
    
</body>
</html>