<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Tin tức chi tiết </title>
    <link rel="icon" href="./img/logo.jpg">
    <link rel="stylesheet" type="text/css" href="/DoAnTotNghiep/css/BaiTapLon.css">
    <?php include 'includes/head.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <section id="content" class="container-body body-content--album padding60">
        <?php
        // 0. Lấy dữ liệu mã ID tin tức để thực hiện câu lệnh truy vấn
        $id_tin_tuc = $_GET["id"];

        $sql = "
            SELECT *
            FROM tbl_tin_tuc
            WHERE id_tin_tuc='".$id_tin_tuc."'
        ";
        // Hướng dẫn check câu lệnh truy vấn viết đúng hay sai
        // var_dump($sql); exit();

        // 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
        $noi_dung_tin_tuc = mysqli_query($ket_noi, $sql);

        // 4. Hiển thị dữ liệu mong muốn
        while ($row = mysqli_fetch_array($noi_dung_tin_tuc)) {
        ;?>
        <div class="page-title-head">
            <strong class="font-playfair is-text-center"><?php echo $row["ten"];?></strong>
            <br>
            <p style="" class="is-text-center"><?php echo $row["ngay_viet"];?></p>
        </div>

        <br>

        <div class="row album-des">
            <h4 class="col-xs-12" style="text-align:justify; margin-top: 20px; margin-bottom: 50px; font-size: 18px">
                <p dir="ltr" style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">
                    <span style="font-size: 17px; font-family: Arial; color: #1d2129; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;"><?php echo $row["tieu_de"];?></span>
                </p>
            </h4>
        </div>
        <div style="overflow: auto;" class="row album-des">
            <h4 class="col-xs-12" style="text-align:justify; margin-top: 20px; margin-bottom: 50px; font-size: 18px">
                <p dir="ltr" style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">
                    <span style="font-size: 17px;text-transform: lowercase; font-family: Arial; color: #1d2129; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;"><img style="float: right; margin: 40px;" src="./img/<?php 
                if ($row["anh"]<>"") {
                echo $row["anh"];
                } else {
                echo "no_image.png";
                }
            ;?>" width="350px" height="auto"><?php echo $row["noi_dung"];?></span>
                </p>
            </h4>
            
        </div>
        <?php
            }
        ;?>
        
    </section>
    <?php include 'includes/footer.php'; ?>
</body>
</html>