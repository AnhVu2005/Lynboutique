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
	<title>Sửa sản phẩm</title>
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
					<h3 class="card-title">Sửa sản phẩm</h3>
				</div>
				<?php 
					// 2. Lẫy ra được ID 
					$id_sp = $_GET["id"];
					
					// secho $id_tin_tuc; exit();

					// 3. Viết câu lệnh SQL để lấy tin tức có ID như trên
					$sql = "SELECT * FROM tbl_san_pham WHERE id_sp = $id_sp";

					// 4. Thực hiện truy vấn để lấy dữ liệu
					$san_pham = mysqli_query($ket_noi, $sql);
					// 5. Hiển thị dữ liệu lên Website
					$row = mysqli_fetch_array($san_pham);
				?>
				<!-- /.card-header -->
				<div class="card-body">
					<form action="./sua_thuc_hien.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Ảnh</label>
							<input type="file" name="anh" style="width: 100%;">
							<img src="../../img/<?php 
								if ($row["anh"]<>"")
								{
									echo $row["anh"];
								}
								else 
								{
									echo "diep1.png";
								}
							;?>" width="180px" height="auto">
						</div>
						<div class="row">
							<input name="id" class="form-control" type="hidden" required value="<?php echo $row['id_sp'] ?>">
									
							<div class="col-md-6">
								<div class="form-group">
									<label>Tên sản phẩm</label>
									<input name="ten_sp" class="form-control" required value="<?php echo $row['ten_sp'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Loại sản phẩm</label>
									<select name="id_phan_loai" class="form-control" required>
										<?php 
											$sql_loai_sp = "SELECT * FROM tbl_phan_loai";
											$loai_sp = mysqli_query($ket_noi, $sql_loai_sp);
											while ($loai = mysqli_fetch_array($loai_sp)) {
										?>
											<option value="<?php echo $loai['id_phan_loai'] ?>" <?php echo $loai['id_phan_loai']  == $row['id_phan_loai'] ? 'selected': '' ?>><?php echo $loai['ten_phan_loai'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nhà cung cấp</label>
									<select name="id_ncc" class="form-control" required>
										<?php 
											$sql_ncc = "SELECT * FROM tbl_ncc";
											$nccs = mysqli_query($ket_noi, $sql_ncc);
											while ($ncc = mysqli_fetch_array($nccs)) {
										?>
											<option value="<?php echo $ncc['id_ncc'] ?>" <?php echo $ncc['id_ncc']  == $row['id_ncc'] ? 'selected': '' ?>><?php echo $ncc['ten_ncc'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label>Giá bán</label>
									<input name="gia_ban" type="number"  class="form-control" value="<?php echo $row['gia_ban'] ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Mức khuyến mãi</label>
									<input type="number" name="muc_km" class="form-control" value="<?php echo $row['muc_km'] ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Giá giảm</label>
									<input type="number" name="gia_giam" class="form-control" value="<?php echo $row['gia_giam'] ?>"  required >
								</div>
							</div>
							<div class="col-md-6 size-add">
								<div class="form-group">
									<label>Size</label> <br>
									<!-- <input name="size" type="size" class="form-control" required> -->
									<div class="size-group">
									<div class="size">
									<label for="sizeS">S</label>
									<input type="number" value="<?php echo $row['so_luong_s'] ?>" name="so_luong_s" id="sizeS" class="form-control" min="0">
									</div>
									<div class="size">
									<label for="sizeM">M</label>									
									<input type="number" value="<?php echo $row['so_luong_m'] ?>" name="so_luong_m" id="sizeM" class="form-control" min="0">
									</div>
									<div class="size">
									<label for="sizeL">L</label>
									<input type="number" value="<?php echo $row['so_luong_l'] ?>" name="so_luong_l" id="sizeL" class="form-control" min="0">
									</div>
									<div class="size">
									<label for="sizeXL">XL</label>
									<input type="number" value="<?php echo $row['so_luong_xl'] ?>" name="so_luong_xl" id="sizeXL" class="form-control" min="0">
									</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Bộ sưu tập</label>
									<select name="id_bst" class="form-control" required>
										<?php 
											$sql_bst = "SELECT * FROM tbl_bo_suu_tap";
											$bsts = mysqli_query($ket_noi, $sql_bst);
											while ($bst = mysqli_fetch_array($bsts)) {
										?>
											<option value="<?php echo $bst['id_bst'] ?>" <?php echo $bst['id_bst']  == $row['id_bst'] ? 'selected': '' ?>><?php echo $bst['ten_bst'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Mô tả</label>
									<textarea name="mo_ta" type="mo_ta" class="form-control" rows="3" required><?php echo $row['mo_ta'] ?></textarea>
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

