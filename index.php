<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Trang chủ</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./img/logo.jpg">
	<?php include 'includes/head.php'; ?>
</head>

<body>
	<?php include 'includes/header.php'; ?>

	<!-- slider-section-start -->
	<div class="main-slider-one main-slider-two slider-area">
		<div id="wrapper">
			<div class="slider-wrapper">
				<div id="mainSlider" class="nivoSlider">
					<img src="/DoAnTotNghiep/accets/img/slider/1.png" alt="main slider" />
					<img src="/DoAnTotNghiep/accets/img/slider/2.png" alt="main slider" />
				</div>
			</div>
		</div>
	</div>
	<!-- slider section end -->

	<!-- tab-products section start -->
	<div class="tab-products single-products products-two section-padding">
		<div class="container">
			<div class="row">
				<div class="wrapper">
					<div class="row text-center">
						<div class="col-xs-12">
							<div class="section-title text-center">
								<hr>
								<h2>Sản phẩm mới</h2>
								<hr>
							</div>
						</div>
						<?php
						$sql = 'SELECT * FROM tbl_san_pham ORDER BY id_sp DESC LIMIT 0, 8';

						$san_pham = mysqli_query($ket_noi, $sql);

						$i = 0;
						while ($row = mysqli_fetch_array($san_pham)) {
							++$i; ?>
							<div class="col-xs-12 col-sm-6 col-md-3 mb-5">
								<div class="single-product">
									<div class="product-img">
										<div class="pro-type">
											<span>new</span>
										</div>
										<a href="/DoAnTotNghiep/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>">
											<img src="/DoAnTotNghiep/img/<?php echo $row["anh"]; ?>" />
										</a>
										<div class="actions-btn">
											<a href="?them_gio_hang=<?php echo $row["id_sp"]; ?>&size-pick=m&so_luong_sp=1"><i class="mdi mdi-cart"></i></a>
											<a href="/DoAnTotNghiep/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>"><i class="mdi mdi-eye"></i></a>
										</div>
									</div>
									<div class="product-dsc">
										<p><a href="/DoAnTotNghiep/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>"><?php echo $row["ten_sp"]; ?></a></p>
										<span><?php echo $row["gia_giam"]; ?> vnđ <del><?php echo $row["gia_ban"]; ?></del></span>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<br>
					<div class="text-center">
						<a href="/DoAnTotNghiep/san_pham.php" class="btn btn-default">Xem thêm</a>
					</div>

					<!-- San pham ban chay -->
					<br>
					<div class="row text-center">
						<div class="col-xs-12">
							<div class="section-title text-center">
								<hr>
								<h2>Sản phẩm bán chạy</h2>
								<hr>
							</div>
						</div>
						<?php
						$sql = 'SELECT tbl_san_pham.* ,  
						SUM(tbl_chi_tiet_hdb.so_luong) as tong 
						FROM tbl_san_pham join tbl_chi_tiet_hdb 
						on tbl_san_pham.id_sp = tbl_chi_tiet_hdb.id_sp 
						group by tbl_san_pham.id_sp ORDER BY tong DESC
						LIMIT 0, 8';

						$san_pham = mysqli_query($ket_noi, $sql);

						$i = 0;
						while ($row = mysqli_fetch_array($san_pham)) {
							++$i; ?>
							<div class="col-xs-12 col-sm-6 col-md-3 mb-5">
								<div class="single-product">
									<div class="product-img">
										<div class="pro-type">
											<span>hot</span>
										</div>
										<a href="/DoAnTotNghiep/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>">
											<img src="/DoAnTotNghiep/img/<?php echo $row["anh"]; ?>" />
										</a>
										<div class="actions-btn">
											<a href="?them_gio_hang=<?php echo $row["id_sp"]; ?>&size-pick=m&so_luong_sp=1"><i class="mdi mdi-cart"></i></a>
											<a href="/DoAnTotNghiep/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>"><i class="mdi mdi-eye"></i></a>
										</div>
									</div>
									<div class="product-dsc">
										<p><a href="/DoAnTotNghiep/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>"><?php echo $row["ten_sp"]; ?></a></p>
										<span><?php echo $row["gia_giam"]; ?> vnđ <del><?php echo $row["gia_ban"]; ?></del></span>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<!-- End san phan ban chay -->

					<!-- San pham danh cho ban -->
					<br>
					<div class="row text-center">
						<div class="col-xs-12">
							<div class="section-title text-center">
								<hr>
								<h2>Sản phẩm dành cho bạn</h2>
								<hr>
							</div>
						</div>
						<?php
						$list_row_temp = array();
						if (isset($_COOKIE["goiySP"]) != 1) {
							// lay du lieu da xem san pham
							$sql = 'SELECT tbl_san_pham.id_phan_loai, sum(tbl_goi_y_sp.views) AS tong_views 
							FROM tbl_san_pham JOIN tbl_goi_y_sp ON tbl_san_pham.id_sp = tbl_goi_y_sp.id_sp 
							GROUP BY tbl_san_pham.id_phan_loai ';

							$san_pham = mysqli_query($ket_noi, $sql);

							while ($row = mysqli_fetch_array($san_pham)) {
								$object = new stdClass();
								$object->id = intval($row["id_phan_loai"]);
								$object->views = intval($row['tong_views']);
								array_push($list_row_temp, $object);
							}

							function quick_sort($my_array)
							{
								$loe = $gt = array();
								if (count($my_array) < 2) {
									return $my_array;
								}
								$pivot_key = key($my_array);
								$pivot = array_shift($my_array);
								foreach ($my_array as $val) {
									if ($val->views <= $pivot->views) {
										$loe[] = $val;
									} elseif ($val->views > $pivot->views) {
										$gt[] = $val;
									}
								}
								return array_merge(quick_sort($gt), array($pivot_key => $pivot), quick_sort($loe));
							}
						} else {
							
							$list_row_temp = $_COOKIE["goiySP"];
						}

						$list_row_temp = quick_sort($list_row_temp);
						$list_full_product = array();

						$sql = "WITH cte AS
						(SELECT *,
						(dense_rank() over(PARTITION BY tbl_san_pham.id_phan_loai  ORDER BY tbl_san_pham.id_sp DESC)) AS ranking 
						FROM tbl_san_pham where tbl_san_pham.id_phan_loai = " . $list_row_temp[0]->id .
							" || tbl_san_pham.id_phan_loai = " . $list_row_temp[1]->id .
							" || tbl_san_pham.id_phan_loai = " . $list_row_temp[2]->id .
							" )
					   
						  SELECT *
						  FROM cte
						  WHERE ranking < 5";
						  
						$san_pham = mysqli_query($ket_noi, $sql);

						while ($row = mysqli_fetch_array($san_pham)) {
							array_push($list_full_product, $row);
						}

						$i = 0;
						foreach ($list_full_product as $key => $row) {
							if ($i == 12) break;
							$i++ ?>
							<div class="col-xs-12 col-sm-6 col-md-3 mb-5">
								<div class="single-product">
									
									<div class="product-img">
										<div class="pro-type">
											<span>for you</span>
										</div>
										<a href="/DoAnTotNghiep/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>">
											<img src="/DoAnTotNghiep/img/<?php echo $row["anh"]; ?>" />
										</a>
										<div class="actions-btn">
											<a href="?them_gio_hang=<?php echo $row["id_sp"]; ?>&size-pick=m&so_luong_sp=1"><i class="mdi mdi-cart"></i></a>
											<a href="/DoAnTotNghiep/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>"><i class="mdi mdi-eye"></i></a>
										</div>
									</div>
									<div class="product-dsc">
										<p><a href="/DoAnTotNghiep/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>"><?php echo $row["ten_sp"]; ?></a></p>
										<span><?php echo $row["gia_giam"]; ?> vnđ <del><?php echo $row["gia_ban"]; ?></del></span>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<!-- End san pham danh cho ban -->
				</div>
			</div>
		</div>
	</div>
	<!-- tab-products section end -->
	<?php include 'includes/footer.php'; ?>
</body>

</html>