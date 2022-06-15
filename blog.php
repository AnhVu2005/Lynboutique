<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Blog</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/logo.jpg">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>

    <!-- blog section start -->
    <section class="latest-blog section-padding">
        <div class="container">
            <ul class="blog-row clearfix">
                <li>
                    <div class="row">
                        <?php 

                // 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
                $sql = "
                    SELECT * FROM `tbl_tin_tuc`
                    ORDER BY
                    id_tin_tuc
                    DESC
                ";

                // 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
                $noi_dung_tin_tuc = mysqli_query($ket_noi, $sql);

                // 4. Hiển thị dữ liệu mong muốn
                while ($row = mysqli_fetch_array($noi_dung_tin_tuc)) {
                ;?>
                        <div style="margin-bottom: 30px" class="col-sm-4 col-xs-12">
                            <div class="l-blog-text">
                                <div style="height: 248.09px" class="banner"><a href="tin_tuc_chi_tiet.php?id=<?php echo $row["id_tin_tuc"];?>"><img style="width: 100%; height: 100%;" src="./img/<?php 
                        if ($row["anh"]<>"") {
                            echo $row["anh"];
                        } else {
                            echo "no_image.png";
                        }
                    ;?>" alt="" /></a></div>
                                <div style="height: 143px;" class="s-blog-text">
                                    <h4 style="margin-bottom: 15px"><a href="tin_tuc_chi_tiet.php?id=<?php echo $row["id_tin_tuc"];?>"><?php echo $row["ten"];?></a></h4>
                                    
                                    <p style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $row["tieu_de"];?></p>
                                </div>
                                <div class="date-read clearfix">
                                    <a href="tin_tuc_chi_tiet.php?id=<?php echo $row["id_tin_tuc"];?>"><i class="mdi mdi-clock"></i><?php echo $row["ngay_viet"];?></a>
                                    <a href="tin_tuc_chi_tiet.php?id=<?php echo $row["id_tin_tuc"];?>">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ;?>
                    </div>
                </li>
            </ul>

        </div>
    </section>
    <!-- blog section end -->

	<?php include 'includes/footer.php'; ?>
</body>
</html>