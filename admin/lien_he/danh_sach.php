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
	<title>Danh sách liên hệ</title>
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
					<h3 class="card-title">Danh sách liên hệ</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table class="table table-bordered contact-table">
						<thead>                  
						<tr>
						 	<td>ID</td>
							<td>Tên</td>
							<td>SĐT</td>
							<td>email</td>
							<td>Nội dung</td>
							<td>Phản hồi</td>
						</tr>
						</thead>
						<tbody>
							<?php 
							// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
							$sql = "
								SELECT *
								FROM tbl_lien_he
								ORDER BY id_lien_he
							";

							// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
							$lien_he = mysqli_query($ket_noi, $sql);

							// 4. Hiển thị dữ liệu mong muốn
							$i=0;
							while ($row = mysqli_fetch_array($lien_he)) {
								$i++;
							?>
						    <tr>
						     	<td>
									<?php echo $row["id_lien_he"];?>
								</td>
								<td>
									<?php echo $row["ten"];?>
								</td>
								<td>
									<?php echo $row["sdt"];?>
								</td>
								<td>
									<?php echo $row["email"];?>
								</td>
								<td>
									<?php echo $row["noi_dung"];?>
								</td>
								<td>
									<?php echo $row["phan_hoi"];?>
								</td>
								<td>
									<div class="btn-group" style="display: flex; gap: 5px; width: 150px">
									<a href="phan_hoi.php?id=<?php echo $row["id_lien_he"];?>" class="btn btn-info">Phản hồi</a>
									<a href="xoa.php?id=<?php echo $row["id_lien_he"];?>" class="btn btn-danger">Xóa</a>
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
