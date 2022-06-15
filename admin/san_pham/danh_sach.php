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
	<title>Danh sách sản phẩm</title>
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
					<h3 class="card-title">Danh sách sản phẩm</h3>
					<div class="float-right">
						<a class="btn btn-primary" href="them.php">Thêm mới</a>
					</div>
				</div>

				<!-- /.card-header -->
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered">
						<thead>                  
							<tr>
								<td>STT</td>
								<td>Ảnh minh họa</td>
								<td>Tên sản phẩm</td>
								<td>Loại sp</td>
								<td>Nhà cung cấp</td>
								<td>Số lượng</td>
								<td>Giá Bán</td>
								<td>Mức khuyến mãi</td>
								<td>Giá Giảm</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<?php 
								// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
								$sql = "SELECT tbl_san_pham.*, tbl_phan_loai.ten_phan_loai, tbl_ncc.ten_ncc FROM `tbl_san_pham` 
									INNER JOIN tbl_ncc ON tbl_ncc.id_ncc=tbl_san_pham.id_ncc
									INNER JOIN tbl_phan_loai ON tbl_phan_loai.id_phan_loai=tbl_san_pham.id_phan_loai
									ORDER BY tbl_san_pham.id_sp DESC
								";

								// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
								$noi_dung_san_pham = mysqli_query($ket_noi, $sql);

								// 4. Hiển thị dữ liệu mong muốn
								$i=0;
								while ($row = mysqli_fetch_array($noi_dung_san_pham)) {
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
											;?>" width="100px" height="auto">
									</td>
									<td>
										<?php echo $row["ten_sp"];?>
									</td>
									<td>
										<?php echo $row["ten_phan_loai"];?>
									</td>
									<td>
										<?php echo $row["ten_ncc"];?>
									</td>
									<td style="padding:0px; border: 0px;">
										<table style="width: 100%;">
											<tr>
												<td>S: <?php echo $row["so_luong_s"];?></td>
											</tr>
											<tr>
												<td>M: <?php echo $row["so_luong_m"];?></td>
											</tr>
											<tr>
												<td>L: <?php echo $row["so_luong_l"];?></td>
											</tr>
											<tr>
												<td>XL: <?php echo $row["so_luong_xl"];?></td>
											</tr>
										</table>
									</td>
									<td>
										<?php echo $row["gia_ban"];?>
									</td>
									<td>
										<?php echo $row["muc_km"];?>
									</td>
									<td>
										<?php echo $row["gia_giam"];?>
									</td>
									<td>
										<div class="btn-group" style="display: flex; gap: 5px;">
										<a href="sua.php?id=<?php echo $row["id_sp"];?>" class="btn btn-info">Sửa</a>
										<a href="xoa.php?id=<?php echo $row["id_sp"];?>" class="btn btn-danger">Xóa</a>
										</div>
									</td>
								</tr>
							<?php } ?>
						</tbody>
						</table>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer clearfix">
					<ul class="pagination pagination-sm m-0 float-right">
						<li class="page-item"><a class="page-link" href="#">«</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">»</a></li>
					</ul>
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
