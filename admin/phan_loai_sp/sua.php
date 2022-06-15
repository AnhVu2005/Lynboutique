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
	<title>Sửa phân loại sản phẩm</title>
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
					<h3 class="card-title">Sửa loại sản phẩm</h3>
				</div>
				<?php 
					// 2. Lẫy ra được ID 
					$id_phan_loai = $_GET["id"];
					// secho $id_tin_tuc; exit();

					// 3. Viết câu lệnh SQL để lấy tin tức có ID như trên
					$sql = "
						SELECT *
						FROM tbl_phan_loai
						WHERE id_phan_loai='".$id_phan_loai."'
					";

					// 4. Thực hiện truy vấn để lấy dữ liệu
					$phan_loai = mysqli_query($ket_noi, $sql);
					// 5. Hiển thị dữ liệu lên Website
					$row = mysqli_fetch_array($phan_loai);
				;?>
				<!-- /.card-header -->
							<form action="./sua_thuc_hien.php" method="POST" enctype="multipart/form-data">
					<p>
						Tên loại sản phẩm <br>
						<input type="text" name="txtten_phan_loai" value="<?php echo $row['ten_phan_loai'];?>" style="width: 100%;">
					</p>
					<p>
						Ảnh minh họa <br>
						<input type="file" name="txtAnhMinhHoa" style="width: 100%;">
					</p>
					<p>
						<img src="../../img/<?php 
								if ($row["anh"]<>"") {
									echo $row["anh"];
								} else {
									echo "diep1.png";
								}
							;?>" width="180px" height="auto">
					</p>
					<p>
						Mô tả <br>
						<textarea name="txtMoTa" style="width: 100%;"><?php echo $row['mo_ta'];?></textarea>
					</p>
					

							
								<button type="submit" class="btn btn-info">Lưu</button>
							
							<input type="hidden" name="txtID" value="<?php echo $row['id_phan_loai'];?>">
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
