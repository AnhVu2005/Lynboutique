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
					<h3 class="card-title">Thêm mới ảnh</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form action="./them_thuc_hien.php" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tên</label>
									<input name="ten" type = "ten " class="form-control" required>
								</div>
							</div>
							<!-- <div class="col-md-6">
								<div class="form-group">
									<label>Bộ sưu tập</label>
									<select name="id_bst" class="form-control" required>
										<option value="" >--- Chọn bộ sưu tập ---</option>
										<?php 
											$sql_bsts = "SELECT * FROM tbl_bo_suu_tap";
											$bsts = mysqli_query($ket_noi, $sql_bsts);
											while ($bst = mysqli_fetch_array($bsts)) {
										?>
											<option value="<?php echo $bst['id_bst'] ?>" ><?php echo $bst['ten_bst'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div> -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Sản phẩm</label>
									<select name="id_sp" class="form-control" required>
										<option value="" >--- Chọn sản phẩm ---</option>
										<?php 
											$sql_sp = "SELECT * FROM tbl_san_pham";
											$sp_q = mysqli_query($ket_noi, $sql_sp);
											while ($sp = mysqli_fetch_array($sp_q)) {
										?>
											<option value="<?php echo $sp['id_sp'] ?>" ><?php echo $sp['ten_sp'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Ảnh</label>
									<input type="file" name="txtAnhMinhHoa" style="width: 100%;">
								</div>
							</div>

							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-primary">Thêm mới</button>
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
</html>
