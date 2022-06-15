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
	<title>Sửa nhà cung cấp</title>
	<link rel="icon" href="../logo/logo.jpg">
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
					$id_ncc = $_GET["id"];
					// secho $id_tin_tuc; exit();

					// 3. Viết câu lệnh SQL để lấy tin tức có ID như trên
					$sql = "
						SELECT *
						FROM tbl_ncc
						WHERE id_ncc='".$id_ncc."'
					";

					// 4. Thực hiện truy vấn để lấy dữ liệu
					$ncc = mysqli_query($ket_noi, $sql);
					// 5. Hiển thị dữ liệu lên Website
					$row = mysqli_fetch_array($ncc);
				;?>
				<!-- /.card-header -->
				<div class="card-body">
					<form action="./sua_thuc_hien.php" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tên</label>
									<input name="id" class="form-control" type="hidden" required value="<?php echo $row['id_ncc'] ?>">
									<input name="ten_ncc" class="form-control" required value="<?php echo $row['ten_ncc'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" value="<?php echo $row['email'] ?>"  class="form-control" required>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>sdt</label>
									<input name="sdt" class="form-control" value="<?php echo $row['sdt'] ?>"  required>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Logo</label>
									<?php if ($row["logo"]<>"") {
										echo '<img src="/DoAnTotNghiep/img/'.$row["logo"].'" width="100px" height="auto">';
									}?>
									<input name="logo" type="file" class="form-control" value="<?php echo $row['logo'] ?>" >
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label>Địa chỉ</label>
									<textarea name="dia_chi" rows="3"  class="form-control" ><?php echo $row['dia_chi'] ?></textarea>
								</div>
							</div>

							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-info">Cập nhật</button>
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
