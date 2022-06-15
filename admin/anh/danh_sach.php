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
					<h3 class="card-title">Danh sách ảnh</h3>
					<div class="float-right">
						<a class="btn btn-primary" href="them.php">Thêm mới</a>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table class="table table-bordered">
						<thead>                  
						<tr>
						 	<td>STT</td>
							<td>Ảnh</td>
							<td>Tên ảnh</td>
							<td>Bộ sưu tập</td>
							<td>Sản phẩm</td>
						</tr>
						</thead>
						<tbody>
							<?php 
							// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
							$sql = "
								SELECT tbl_anh.*, tbl_san_pham.ten_sp, tbl_bo_suu_tap.ten_bst FROM `tbl_anh` 
									INNER JOIN tbl_san_pham ON tbl_san_pham.id_sp=tbl_anh.id_sp
									INNER JOIN tbl_bo_suu_tap ON tbl_bo_suu_tap.id_bst=tbl_san_pham.id_bst
									ORDER BY tbl_anh.id_anh DESC
							";

							// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
							$anh = mysqli_query($ket_noi, $sql);

							// 4. Hiển thị dữ liệu mong muốn
							$i=0;
							while ($row = mysqli_fetch_array($anh)) {
								$i++;
							?>
						    <tr>
						    	<td><?php echo $i;?></td>
						    	<td>
									<img src="/DoAnTotNghiep/img/<?php 
											if ($row["anh"]<>"") {
												echo $row["anh"];
											} else {
												echo "diep4.png";
											}
										;?>" width="180px" height="auto">
								</td>
								<td>
									<?php echo $row["ten"];?>
								</td>
								<td>
									<?php echo $row["ten_bst"];?>
								</td>
								<td>
									<?php echo $row["ten_sp"];?>
								</td>
								<td>
									<a href="xoa.php?id=<?php echo $row["id_anh"];?>" class="btn btn-danger">Xóa</a>
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
