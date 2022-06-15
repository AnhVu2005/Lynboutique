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
	<title>Danh sách khách hàng</title>
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
					<h3 class="card-title">Danh sách khách hàng</h3>
					<div class="float-right">
						<a class="btn btn-primary" href="them.php">Thêm mới</a>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table class="table table-bordered">
						<thead>                  
						<tr>
						 	<td>ID</td>
							<td>Tên</td>
							<td>Username</td>
							<td>Email</td>
							<td>Sdt</td>
							<td>Ngày sinh</td>
							<td>Địa chỉ</td>
							<td></td>
						</tr>
						</thead>
						<tbody>
							<?php 
							// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
							$sql = "
								SELECT *
								FROM tbl_khach_hang
								ORDER BY id_khach_hang DESC
							";

							// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
							$khach_hang = mysqli_query($ket_noi, $sql);

							// 4. Hiển thị dữ liệu mong muốn
							$i=0;
							while ($row = mysqli_fetch_array($khach_hang)) {
								$i++;
							?>
						    <tr>
						     	<td>
									<?php echo $row["id_khach_hang"];?>
								</td>
								<td>
									<?php echo $row["ten_kh"];?>
								</td>
								<td>
									<?php echo $row["username"];?>
								</td>
								<td>
									<?php echo $row["email"];?>
								</td>
								<td>
									<?php echo $row["sdt"];?>
								</td>
								<td style="width: 9%;">
									<?php echo $row["ngay_sinh"];?>
								</td>
								<td>
									<?php echo $row["dia_chi"];?>
								</td>
								<td>
									<div class="btn-group" style="display: flex; gap: 5px">
									<a href="sua.php?id=<?php echo $row["id_khach_hang"];?>" class="btn btn-info">Sửa</a>
									<a href="xoa.php?id=<?php echo $row["id_khach_hang"];?>" class="btn btn-danger">Xóa</a>
									</div>
								</td>
						    </tr>
						<?php } ?>
						</tbody>
					</table>
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
