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
					<h3 class="card-title">Danh sách đơn hàng</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table class="table table-bordered">
						<thead>                  
						<tr>
						 	<td>ID</td>
							<td>Tên khách hàng</td>
							<td>Ngày đặt hàng</td>
							<td>Địa chỉ</td>
							<td>email</td>
							<td>sdt</td>
							<td>Trạng thái</td>
							<td></td>
						</tr>
						</thead>
						<tbody>
							<?php 
							// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
							$sql = "SELECT * FROM tbl_hdb ORDER BY id_hdb DESC"; 

							// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
							$don_hang = mysqli_query($ket_noi, $sql);

							// 4. Hiển thị dữ liệu mong muốn
							$i=0;
							while ($row = mysqli_fetch_array($don_hang)) {
								$i++;
							?>
						    <tr>
						     	<td>
									<?php echo $row["id_hdb"];?>
								</td>
								<td>
									<?php echo $row["ten_kh"];?>
								</td>
								<td>
									<?php echo $row["ngay_dat_hang"];?>
								</td>
								<td>
									<?php echo $row["dia_chi"];?>
								</td>
								<td>
								
									<?php echo $row["email"];?>
								</td>
								<td>
									<?php echo $row["sdt"];?>
								</td>
								<td>
									<?php echo $row["trang_thai"];?>
								</td>
								<td>
									<a href="chi_tiet.php?id=<?php echo $row["id_hdb"];?>" class="btn btn-info">Chi tiết</a>
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

