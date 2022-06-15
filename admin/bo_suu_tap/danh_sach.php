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
					<h3 class="card-title">Danh sách bộ sưu tập</h3>
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
							<td>Tên bộ sưu tập</td>
							<td>Mô tả</td>
							<td>Ngày ra mắt</td>

						</tr>
						</thead>
						<tbody>
							<?php 
							// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
							$sql = "
								SELECT *
								FROM tbl_bo_suu_tap
								ORDER BY id_bst DESC
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
									<?php echo $row["id_bst"];?>
								</td>
								<td>
									<?php echo $row["ten_bst"];?>
								</td>
								<td>
									<?php echo $row["mo_ta"];?>
								</td>
								<td>
									<?php echo $row["ngay_ra_mat"];?>
								</td>
								
								<td>
									<div class="btn-group" style="gap:5px">
									<a href="sua.php?id=<?php echo $row["id_bst"];?>" class="btn btn-info">Sửa</a>
									<a href="xoa.php?id=<?php echo $row["id_bst"];?>" class="btn btn-danger">Xóa</a>
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
