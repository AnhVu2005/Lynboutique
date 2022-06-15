<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title> Chi tiết bộ sưu tập </title>
    <link rel="icon" href="./img/logo.jpg">
    <link rel="stylesheet" type="text/css" href="./accets/css/custom.css">
    <?php include 'includes/head.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <section id="content" class="container-body body-content--album">
        <?php
        // 0. Lấy dữ liệu mã ID tin tức để thực hiện câu lệnh truy vấn
        $id_tin_tuc = $_GET["id"];

        // 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
        $sql = "
            SELECT ten_bst, mo_ta
            FROM tbl_bo_suu_tap
            WHERE id_bst='".$id_tin_tuc."'
        ";
        // Hướng dẫn check câu lệnh truy vấn viết đúng hay sai
        // var_dump($sql); exit();

        // 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
        $noi_dung_tin_tuc = mysqli_query($ket_noi, $sql);

        // 4. Hiển thị dữ liệu mong muốn
        while ($row = mysqli_fetch_array($noi_dung_tin_tuc)) {
        ?>
            <div class="page-title-head">
                <strong class="font-playfair is-text-center"><?php echo $row["ten_bst"];?></strong>
            </div>

            <hr style="border: 1px solid;">

            <div class="row album-des">
                <h4 class="col-xs-12" style="text-align:justify; margin-top: 20px; margin-bottom: 50px; font-size: 18px">
                    <p dir="ltr" style="line-height: 1.38;">
                        <span style="text-transform: lowercase; font-size: 23px; font-family: Arial; color: #1d2129; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;"><?php echo $row["mo_ta"];?></span>
                    </p>
                </h4>
            </div>
        <?php
            }
        ;?>
        <hr style="border: 1px solid;">
        

        <!-- <div id="faded" class="faded">
            <div class="mfp-bg mfp-with-zoom mfp-img-mobile mfp-ready"></div>
            <div class="mfp-container mfp-s-ready mfp-image-holder">
               <div class="mfp-content">
                   <div class="mfp-figure" >
                      <img id="anhto" class="mfp-img" alt="undefined" src="" style="max-height: 651px;">
                      <div class="tag-vvvv"></div>
                    </div>
                </div>
                <button id="bamtrai" title="Previous (Left arrow key)" type="button" class="mfp-arrow mfp-arrow-left mfp-prevent-close">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                </button>
                <button title="Next (Right arrow key)" type="button" class="mfp-arrow mfp-arrow-right mfp-prevent-close">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </button>
            </div>
            <button title="Close (Esc)" type="button" class="mfp-close">
                X
            </button>
        </div> -->
        
        <ul style="margin-left: 20px;" class="row list-album list-item-div is-wrap-flex">
            <?php
        // 0. Lấy dữ liệu mã ID tin tức để thực hiện câu lệnh truy vấn
        $id_tin_tuc = $_GET["id"];

        // 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
        $sql = "
        SELECT
        tbl_anh.id_anh,
        tbl_anh.anh,
        tbl_anh.id_sp
        FROM
            tbl_anh
        JOIN tbl_san_pham ON tbl_anh.id_sp = tbl_san_pham.id_sp
        WHERE
            tbl_san_pham.id_bst = '".$id_tin_tuc."'
        ORDER BY
            id_anh
        DESC
        ;
        ";
        // Hướng dẫn check câu lệnh truy vấn viết đúng hay sai
        // var_dump($sql); exit();

        // 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
        $noi_dung_tin_tuc = mysqli_query($ket_noi, $sql);

        // 4. Hiển thị dữ liệu mong muốn
        while ($row = mysqli_fetch_array($noi_dung_tin_tuc)) {
        ;?>
            
            <li id="<?php echo $row["id_anh"];?>" class="item-div">
                <a href="chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"];?>">
                    <img class="anhtrai" src="./img/<?php echo $row["anh"];?>" alt="">
                </a>
            </li>
            
            <?php
                }
            ;?>
        </ul>
        
    </section>
    <?php include 'includes/footer.php'; ?>
</body>
</html>