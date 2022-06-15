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
					<h3 class="card-title">Thêm mới bộ sưu tập</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form action="./them_thuc_hien.php" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tên</label>
									<input name="ten_bst" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Mô tả</label>
									<input name="mo_ta" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Ngày ra mắt</label>
									<input name="ngay_ra_mat" type="date" class="form-control" required>
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
