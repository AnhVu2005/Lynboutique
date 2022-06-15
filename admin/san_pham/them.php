<?php 
	session_start();
	if(!$_SESSION['email']) {
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn không có quyền truy cập!');
			</script>
		";

		// Chuyển người dùng vào trang quản trị tin tức
		echo 
		"
			<script type='text/javascript'>
				window.location.href = '/DoAnTotNghiep/admin/dang_nhap.php'
			</script>
		";
	}
;?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm sản phẩm</title>
	<?php include('../includes/head.php') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
	<?php include('../includes/header.php') ?>

	<?php include('../includes/sidebar.php') ?>

	<?php include('../includes/ket_noi.php') ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Main content -->
		<section class="content">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title">Thêm sản phẩm</h3>
				</div>
				<div class="card-body">
					<form action="./them_thuc_hien.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Ảnh</label>
							<input type="file" name="anh" style="width: 25%;" required="">
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tên sản phẩm</label>
									<input name="ten_sp" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Loại sản phẩm</label>
									<select name="id_phan_loai" class="form-control" required>
										<option value="" >--- Chọn loại sản phẩm ---</option>
										<?php 
											$sql_loai_sp = "SELECT * FROM tbl_phan_loai";
											$loai_sp = mysqli_query($ket_noi, $sql_loai_sp);
											while ($loai = mysqli_fetch_array($loai_sp)) {
										?>
											<option value="<?php echo $loai['id_phan_loai'] ?>" ><?php echo $loai['ten_phan_loai'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nhà cung cấp</label>
									<select name="id_ncc" class="form-control" required>
										<option value="" >--- Chọn loại nhà cung cấp ---</option>
										<?php 
											$sql_ncc = "SELECT * FROM tbl_ncc";
											$nccs = mysqli_query($ket_noi, $sql_ncc);
											while ($ncc = mysqli_fetch_array($nccs)) {
										?>
											<option value="<?php echo $ncc['id_ncc'] ?>" ><?php echo $ncc['ten_ncc'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Bộ sưu tập</label>
									<select name="id_bst" class="form-control" required>
										<option value="" >--- Chọn bộ sưu tập ---</option>
										<?php 
											$sql_bst = "SELECT * FROM tbl_bo_suu_tap";
											$bsts = mysqli_query($ket_noi, $sql_bst);
											while ($bst = mysqli_fetch_array($bsts)) {
										?>
											<option value="<?php echo $bst['id_bst'] ?>" ><?php echo $bst['ten_bst'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Giá bán</label>
									<input name="gia_ban" type="number" class="form-control" required >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Mức khuyến mãi</label>
									<input name="muc_km" type="number" class="form-control" min="0" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Giá giảm</label>
									<input name="gia_giam" type="number" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6 size-add">
								<div class="form-group">
									<label>Size</label> <br>
									<!-- <input name="size" type="size" class="form-control" required> -->
									<div class="size-group">
									<div class="size">
									<label for="sizeS">S</label>
									<input type="number" name="so_luong_s" id="sizeS" class="form-control" min="0">
									</div>
									<div class="size">
									<label for="sizeM">M</label>									
									<input type="number" name="so_luong_m" id="sizeM" class="form-control" min="0">
									</div>
									<div class="size">
									<label for="sizeL">L</label>
									<input type="number" name="so_luong_l" id="sizeL" class="form-control" min="0">
									</div>
									<div class="size">
									<label for="sizeXL">XL</label>
									<input type="number" name="so_luong_xl" id="sizeXL" class="form-control" min="0">
									</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group">
									<label>Mô tả</label>
									<textarea name="mo_ta" type="mo_ta" class="form-control" rows="3" required></textarea>
								</div>
							</div>
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-info">Thêm mới</button>
							</div>
						</div>
					</form>
				</div>
            </div>
		</section>
		<!-- /.content -->
		</div>
	</div>
	<!-- ./wrapper -->

	<?php include('../includes/footer.php') ?>
</body>

