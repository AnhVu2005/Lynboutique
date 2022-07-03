<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Thanh toán</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./img/logo.jpg">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>

	<?php
		if(!isset($_SESSION['dang_nhap'])) {
			echo 
			"
				<script type='text/javascript'>
					window.location.href = '/DoAnTotNghiep/dang_nhap.php'
				</script>
			";
		}

		// xử lý đặt hàng
		if(isset($_POST['dat_hang'])) {
			$id_khach_hang = $_SESSION['dang_nhap']["id_khach_hang"];
			$phuong_thuc_tt = 'Thanh toán khi nhận hàng';
			$ngay_dat_hang = date('Y-m-d');
			$tong_tien = $_SESSION['tong_tien_gio_hang'];
			$ten_kh = $_POST["ten_kh"];
			$email = $_POST["email"];
			$sdt = $_POST["sdt"];
			$dia_chi = $_POST["dia_chi"];
			$trang_thai = 'Chờ xác nhận';

			$sql_hdb = "INSERT INTO `tbl_hdb` (`id_khach_hang`, `phuong_thuc_tt`, `ngay_dat_hang`,`tong_tien`, `ten_kh`, `email`, `sdt`, `dia_chi`, `trang_thai`) 
				VALUES ('".$id_khach_hang."', '".$phuong_thuc_tt."', '".$ngay_dat_hang."', '".$tong_tien."', '".$ten_kh."', '".$email."', '".$sdt."', '".$dia_chi."', '".$trang_thai."');";

			if ($ket_noi->query($sql_hdb) === TRUE) {
				// insert chi tiết đơn hàng
				$id_hdb = $ket_noi->insert_id;
				foreach($_SESSION['gio_hang'] as $gh) {
					$id_sp = $gh['id_sp'];
					$so_luong = $gh['so_luong_sp'];
					$gia_ban = (int) $gh['gia_giam'];
					$size = $gh['size'];
					$tong_tien = (int) ($gh['gia_giam'] * $gh['so_luong_sp']);

					$sql_chi_tiet = "INSERT INTO `tbl_chi_tiet_hdb` (`id_hdb`, `id_sp`, `size`, `so_luong`, `gia_ban`,`tong_tien`) 
						VALUES ('".$id_hdb."', '".$id_sp."', '".$size."', '".$so_luong."', '".$gia_ban."', '".$tong_tien."');";
					
					$ket_noi->query($sql_chi_tiet);

					$sql_update_so_luong = "UPDATE tbl_san_pham
					SET so_luong_".$size." = so_luong_".$size." - ".$so_luong."
					WHERE id_sp = '".$id_sp."';";

					$ket_noi->query($sql_update_so_luong);
				}

				// Sau khi đặt hàng xong xóa giỏ hàng
				unset($_SESSION['gio_hang']);
				unset($_SESSION['tong_tien_gio_hang']);

				echo 
				"
					<script type='text/javascript'>
						window.alert('Đặt hàng thành công.');
					</script>
				";

				echo 
				"
					<script type='text/javascript'>
						window.location.href = '/DoAnTotNghiep'
					</script>
				";
			} else {
				echo "<script type='text/javascript'>
					window.alert(Đặt hàng thất bại.');
				</script>";
				
				echo 
				"
					<script type='text/javascript'>
						window.location.href = '/DoAnTotNghiep'
					</script>
				";
			}
		}
		if(isset($_POST['dat_hang_onl'])) {
			$_SESSION['thong_tin_khach_tt']=[];
			$_SESSION['thong_tin_khach_tt']['ten_kh'] = $_POST["ten_kh"];
			$_SESSION['thong_tin_khach_tt']['email'] = $_POST["email"];
			$_SESSION['thong_tin_khach_tt']['sdt'] = $_POST["sdt"];
			$_SESSION['thong_tin_khach_tt']['dia_chi'] = $_POST["dia_chi"];
			echo 
				"
					<script type='text/javascript'>
						window.location.href = '/DoAnTotNghiep/mua_hang_onl.php'
					</script>
				";
		}
	?>

   <!-- Checkout content section start -->
	<section class="pages checkout section-padding">
		<div class="container">
			<div class="row">
				<form method="post">
					<div class="col-sm-6">
						<div class="main-input single-cart-form padding60">
							<div class="log-title">
								<h3><strong>Thông tin khách hàng</strong></h3>
							</div>
							<div class="custom-input">
								<?php 
									$id_khach_hang = $_SESSION['dang_nhap']["id_khach_hang"];
									$sql = "SELECT * FROM tbl_khach_hang WHERE id_khach_hang = $id_khach_hang";
									$sql_query = mysqli_query($ket_noi, $sql);
									$khach_hang = mysqli_fetch_array($sql_query);
								?>
							
								<input type="text" name="ten_kh" value="<?php echo $khach_hang['ten_kh']; ?>" placeholder="Tên khách hàng" required/>
								<input type="email" name="email" value="<?php echo $khach_hang['email']; ?>" placeholder="Địa chỉ email" required/>
								<input type="text" name="sdt" value="<?php echo $khach_hang['sdt']; ?>" placeholder="Số điện thoại" required/>
								<div class="custom-mess">
									<textarea rows="2" name="dia_chi" placeholder="Địa chỉ nhận hàng"><?php echo $khach_hang['dia_chi']; ?></textarea>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-sm-6">
						<div class="padding60">
							<div class="log-title">
								<h3><strong>Thông tin thanh toán</strong></h3>
							</div>
							<div class="cart-form-text pay-details table-responsive">
								<table>
									<thead>
										<tr>
											<th>Sản phẩm</th>
											<td>Tổng tiền</td>
										</tr>
									</thead>
									<tbody>
									<?php
										if(isset($_SESSION['gio_hang']) && !empty($_SESSION['gio_hang'])) {
											foreach($_SESSION['gio_hang'] as $gh) {
												?>
													<tr>
														<th><?php echo $gh["ten_sp"]; ?>, size: <?php echo $gh["size"]; ?> x <?php echo $gh['so_luong_sp'] ?></th>
														<td><?php echo $gh['gia_giam'] * $gh['so_luong_sp'] ?> vnđ</td>
													</tr>
												<?php
											}
											?>
											<?php
										} else {
											echo '<tr><td colspan="5">Không có sản phẩm nào</td></tr>';
										}
									?>
									</tbody>
									<tfoot>
										<tr>
											<?php if (isset($_SESSION['tong_tien_gio_hang'])) {?>

												<th>Tổng tiền</th>
												<td><?php echo $_SESSION['tong_tien_gio_hang']; ?> vnđ</td>
											<?php } ?>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-sm-6">
						<div class="text-center">
							<?php if (isset($_SESSION['tong_tien_gio_hang'])) {?>
								<div class="categories">
									<div class="submit-text">
										<button name="dat_hang">Thanh toán tiền mặt</button>
										<button name="dat_hang_onl">Thanh toán qua VNpay</button>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- Checkout content section end -->

	<?php include 'includes/footer.php'; ?>
</body>
</html>