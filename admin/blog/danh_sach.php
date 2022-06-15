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
					<h3 class="card-title">Danh sách Blog</h3>
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
					     	<td>Ngày đăng</td>
							<td>Ảnh minh họa</td>
							<td>Tên blog</td>
							<td>Tiêu đề</td>
							<td>Nội dung</td>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
							// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
							$sql = "
								SELECT *
								FROM tbl_tin_tuc
								ORDER BY id_tin_tuc DESC
							";

							// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
							$noi_dung_tin_tuc = mysqli_query($ket_noi, $sql);

							// 4. Hiển thị dữ liệu mong muốn
							$i=0;
							while ($row = mysqli_fetch_array($noi_dung_tin_tuc)) {
								$i++;
						?>
						    <tr>
						     	<td><?php echo $i;?></td>
						     	<td>
									<?php echo $row["ngay_viet"];?>
								</td>
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
									<a href="tin_tuc.php?id=<?php echo $row["id_sp"];?>"s><?php echo $row["ten"];?></a>
								</td>
								<td>

									<?php echo $row["tieu_de"];?>
								</td>
								<td>
									<?php echo $row["noi_dung"];?>
								</td>
								<td>
									<div class="btn-group" style="display: flex; gap: 5px;">
									<a href="sua.php?id=<?php echo $row["id_tin_tuc"];?>" class="btn btn-info">Sửa</a>
									<a href="xoa.php?id=<?php echo $row["id_tin_tuc"];?>" class="btn btn-danger">Xóa</a>
									</div>
								</td>
						    </tr>
					    <?php } ?>
					  </tbody>
					</table>
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
