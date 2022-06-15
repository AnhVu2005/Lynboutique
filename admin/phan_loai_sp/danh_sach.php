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
	<title>Danh sách phân loại sản phẩm</title>
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
					<h3 class="card-title">Danh sách loại sản phẩm</h3>
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
							<td>Ảnh minh họa</td>
							<td>Tên loại sản phẩm</td>
							<td></td>
						</tr>
						</thead>
						<tbody>
							<?php 
							// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
							$sql = "
								SELECT *
								FROM tbl_phan_loai
								ORDER BY id_phan_loai DESC
							";

							// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
							$phan_loai = mysqli_query($ket_noi, $sql);

							// 4. Hiển thị dữ liệu mong muốn
							$i=0;
							while ($row = mysqli_fetch_array($phan_loai)) {
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
									<?php echo $row["ten_phan_loai"];?>
								</td>
								<td>
									<div class="btn-group" style="display:flex; gap: 5px; width: 25px">
									<a href="sua.php?id=<?php echo $row["id_phan_loai"];?>" class="btn btn-info">Sửa</a>
									<a href="xoa.php?id=<?php echo $row["id_phan_loai"];?>" class="btn btn-danger">Xóa</a>
									</div>
								</td>
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
