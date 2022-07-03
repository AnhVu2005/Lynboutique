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
	<style>
		/* Chrome, Safari, Edge, Opera */
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		/* Firefox */
		input[type=number] {
			-moz-appearance: textfield;
		}
	</style>
</head>

<body>
	<?php include 'includes/header.php'; ?>

	<?php
	$id_sp = $_GET["id_sp"];
	$sql = "SELECT * FROM tbl_san_pham WHERE id_sp = $id_sp";
	$sql_query = mysqli_query($ket_noi, $sql);
	$san_pham = mysqli_fetch_array($sql_query);

	?>

	<!-- product-details-section-start -->
	<div class="product-details pages section-padding">
		<div class="container">
			<div class="row">
				<div class="single-list-view">
					<div class="col-xs-12 col-sm-5 col-md-4">
						<div class="quick-image">
							<div class="single-quick-image text-center">
								<div class="list-img">
									<div class="product-img tab-content">
										<div class="simpleLens-container tab-pane active fade in" id="sin-2">
											<div class="pro-type sell">
												<span>sell</span>
											</div>
											<a class="simpleLens-image" data-lens-image="/DoAnTotNghiep/img/<?php echo $san_pham['anh'] ?>" href="#"><img src="/DoAnTotNghiep/img/<?php echo $san_pham['anh'] ?>" alt="" class="simpleLens-big-image"></a>
										</div>
										<?php
										$res = mysqli_query($ket_noi, "SELECT views FROM tbl_goi_y_sp where id_sp = " . $id_sp);
										$value = 0;
										if ($res->num_rows > 0) {
											while ($row = $res->fetch_assoc()) {
												//var_dump(intval($row['views']));
												$value = intval($row['views']) + 1;

												break;
											}
											$result = mysqli_query($ket_noi, "UPDATE tbl_goi_y_sp SET views= " . $value . " WHERE id_sp=" . $id_sp);
										} else {
											$result = mysqli_query($ket_noi, "INSERT INTO tbl_goi_y_sp (id_sp, views) VALUES (" . $id_sp . ",1) ");
										}

										// if (isset($_COOKIE["goiySP"])) {
										// 	$cookie_obj = json_decode($_COOKIE["goiySP"]);
										// 	if (isset($cookie_obj[$san_pham['id_phan_loai']])) {
										// 		//den day
										// 		$object = new stdClass();
										// 		$object->id = intval($row["id_phan_loai"]);
										// 		$object->views = intval($row['views']);
										// 		array_push($list_row_temp, $object);
										// 		$_COOKIE[$san_pham['id_phan_loai']]=$_COOKIE[$san_pham['id_phan_loai']] + 1;
										// 	} else {
										// 		$_COOKIE[$san_pham['id_phan_loai']]= 1;
												
										// 	}
										// } else {
										// 	setcookie("goiySP", 1, 0, "/DoAnTotNghiep");
										// 	setcookie($san_pham['id_phan_loai'], 1, 0, "/DoAnTotNghiep");

										// }
										?>
										<?php $anh_sp_query = mysqli_query($ket_noi, "SELECT * FROM tbl_anh WHERE id_sp = " . $id_sp);

										while ($anh = mysqli_fetch_array($anh_sp_query)) { ?>
											<div class="simpleLens-container tab-pane fade in" id="sin-anh-<?php echo $anh['id_anh'] ?>">
												<div class="pro-type">
													<span>new</span>
												</div>
												<a class="simpleLens-image" data-lens-image="/DoAnTotNghiep/img/<?php echo $anh['anh'] ?>" href="#"><img src="/DoAnTotNghiep/img/<?php echo $anh['anh'] ?>" alt="" class="simpleLens-big-image"></a>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="quick-thumb">
								<ul class="product-slider">
									<li class="active"><a data-toggle="tab" href="#sin-anh-<?php echo $anh['id_anh'] ?>"> <img src="/DoAnTotNghiep/img/<?php echo $san_pham['anh'] ?>" alt="small image" /> </a></li>
									<?php
									$anh_sp_query = mysqli_query($ket_noi, "SELECT * FROM tbl_anh WHERE id_sp = " . $id_sp);
									while ($anh = mysqli_fetch_array($anh_sp_query)) { ?>
										<li><a data-toggle="tab" href="#sin-anh-<?php echo $anh['id_anh'] ?>"> <img src="/DoAnTotNghiep/img/<?php echo $anh['anh'] ?>" alt="quick view" /> </a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-8">
						<form method="get" id="submit">
							<input type="hidden" name="id_sp" value="<?php echo $_GET['id_sp'] ?>" />
							<input type="hidden" name="them_gio_hang" value="<?php echo $_GET['id_sp'] ?>" />
							<div class="quick-right">
								<div class="list-text">
									<h3><?php echo $san_pham['ten_sp'] ?></h3>
									<h5><del><?php echo $san_pham['gia_ban'] ?> vnđ</del> <?php echo $san_pham['gia_giam'] ?> vnđ</h5>
									<p><?php echo $san_pham['mo_ta'] ?></p>
									<div class="all-choose">
										<div class="s-shoose">
											<h5>size</h5>
											<div class="size-drop">
												<div class="btn-group">
													<select onchange="tonKho()" name="size-pick" id="size-pick" style="padding: 5px 36px; border: 1px solid;">
														<option value="xl">XL</option>
														<option value="l">L</option>
														<option value="m" selected>M</option>
														<option value="s">S</option>
													</select>
												</div>
											</div>
										</div>
										<div class="s-shoose">
											<h5>kho</h5>
											<span id="ton_kho" class="label label-primary"><?php echo $san_pham['so_luong_m'] ?></span>
										</div>
										<div class="s-shoose">
											<h5>Số lượng</h5>
											<form action="#" method="POST">
												<div class="plus-minus">
													<a class="dec qtybutton">-</a>
													<input type="number" value="1" name="so_luong_sp" class="plus-minus-box">
													<a class="inc qtybutton">+</a>
												</div>
											</form>
										</div>
									</div>
									<div class="list-btn">
										<button type="submit" class="btn btn-success">Thêm vào giỏ hàng</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- single-product item end -->
		</div>
	</div>
	<!-- product-details section end -->
	<script>
		document.getElementById("submit").addEventListener("submit", function(event) {
			// event.preventDefault();
			if (document.getElementsByName("so_luong_sp")[0].valueAsNumber > document.getElementById("ton_kho").innerHTML) {
				event.preventDefault();
				alert("Số lượng sản phẩm không được quá giới hạn tồn kho!")
			}

		});

		let tonKho = () => {
			switch (document.getElementById("size-pick").value) {
				case "s":
					document.getElementById("ton_kho").innerHTML = <?php echo $san_pham['so_luong_s'] ?>;
					break;
				case "m":
					document.getElementById("ton_kho").innerHTML = <?php echo $san_pham['so_luong_m'] ?>;
					break;
				case "l":
					document.getElementById("ton_kho").innerHTML = <?php echo $san_pham['so_luong_l'] ?>;
					break;
				case "xl":
					document.getElementById("ton_kho").innerHTML = <?php echo $san_pham['so_luong_xl'] ?>;
					break;
			}
		}
	</script>
	<?php include 'includes/footer.php'; ?>
</body>

</html>