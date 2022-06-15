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
	<title>Sửa thông tin khách hàng</title>
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
					<h3 class="card-title">Sửa khách hàng</h3>
				</div>
				<?php 
					// 2. Lẫy ra được ID 
					$id_khach_hang = $_GET["id"];
					// secho $id_tin_tuc; exit();

					// 3. Viết câu lệnh SQL để lấy tin tức có ID như trên
					$sql = "
						SELECT *
						FROM tbl_khach_hang
						WHERE id_khach_hang='".$id_khach_hang."'
					";

					// 4. Thực hiện truy vấn để lấy dữ liệu
					$khach_hang = mysqli_query($ket_noi, $sql);
					// 5. Hiển thị dữ liệu lên Website
					$row = mysqli_fetch_array($khach_hang);
				;?>
				<!-- /.card-header -->
				<div class="card-body">

					<form action="./sua_thuc_hien.php" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Họ và tên</label>
									<input name="id" class="form-control" type="hidden" required value="<?php echo $row['id_khach_hang'] ?>">
									<input name="ten_kh" class="form-control" required value="<?php echo $row['ten_kh'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Tên đăng nhập</label>
									<input name="username" class="form-control" value="<?php echo $row['username'] ?>" required>
								</div>
							</div>
							<!-- <div class="col-md-6">
								<div class="form-group">
									<label>Mật khẩu</label>
									<input name="password" type="password" class="form-control" value="<?php echo $row['password'] ?>" required>
								</div>
							</div> -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Email</label>
									<input name="email" type="email" class="form-control" value="<?php echo $row['email'] ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Số điện thoại</label>
									<input name="sdt" type="tel" class="form-control" value="<?php echo $row['sdt'] ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Ngày sinh</label>
									<input name="ngay_sinh" type="date" class="form-control" value="<?php echo $row['ngay_sinh'] ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Địa chỉ</label>
									<input name="dia_chi" type="dia_chi" class="form-control" value="<?php echo $row['dia_chi'] ?>"  required >
								</div>
							</div>
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-info">Lưu</button>
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
