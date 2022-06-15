<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Thông tin khách hàng</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./img/logo.jpg">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>
    <?php include 'admin/includes/ket_noi.php';
     
    ?>
	<section class="pages section-padding">
		<div class="container">
			<div class="row">
				<div class="info col-sm-12">
					<div class="main-input info-user padding60 mx-auto">
						<div class="log-title">
							<h3 class="text-center"><strong>Thông tin khách hàng</strong></h3>
						</div>

						<?php 
							// Lấy ra được ID 
							$id_khach_hang = $_SESSION['dang_nhap']['id_khach_hang'];
							// secho $id_tin_tuc; exit();

							// Viết câu lệnh SQL để lấy tin tức có ID như trên
							$sql = "
								SELECT *
								FROM tbl_khach_hang
								WHERE id_khach_hang='".$id_khach_hang."'
							";

							// Thực hiện truy vấn để lấy dữ liệu
							$khach_hang = mysqli_query($ket_noi, $sql);

							//Hiển thị dữ liệu lên Website
							$row = mysqli_fetch_array($khach_hang);

							// Update thông tin KH
							if(isset($_POST['email'])){
								// 1. Chuỗi kết nối đến CSDL
								$ten_kh= $_POST['ten_kh'];
								$sdt= $_POST['sdt'];
								$email= $_POST['email'];
								$username= $_POST['username'];
								$password= md5($_POST['new-pw']);
								$ngaysinh= $_POST['ngay_sinh'];
								$diachi= $_POST['dia_chi'];

								if ($_POST['new-pw'] != "") {
									$sql_update = "
								UPDATE `tbl_khach_hang`
								SET
									`ten_kh` = '".$ten_kh."',
									`username` = '".$username."',
									`password` = '".$password."',
									`email` = '".$email."',
									`sdt` = '".$sdt."',
									`ngay_sinh` = '".$ngaysinh."',
									`dia_chi` = '".$diachi."'
									WHERE `id_khach_hang` = '".$id_khach_hang."' 
								";
								}else{
									$sql_update = "
								UPDATE `tbl_khach_hang`
								SET
									`ten_kh` = '".$ten_kh."',
									`username` = '".$username."',
									`email` = '".$email."',
									`sdt` = '".$sdt."',
									`ngay_sinh` = '".$ngaysinh."',
									`dia_chi` = '".$diachi."'
									WHERE `id_khach_hang` = '".$id_khach_hang."' 
								";
								}
					
								
					
								if ($ket_noi->query($sql_update) === TRUE) {
					
									echo 
									"
										<script type='text/javascript'>
											window.alert('Bạn đã cập nhật khách hàng thành công.');
										</script>
									";
								
									// Chuyển người dùng vào trang thông tin khách hàng
									echo 
									"
										<script type='text/javascript'>
											window.location.href = './thong_tin_khach_hang.php'
										</script>
									";
								} else {
									  echo "Error: " . $sql_update . "<br>" . $ket_noi->error;
								}
						}

						;?>

						<div class="custom-input">
							<form method="POST" enctype="multipart/form-data" action="">
								<input type="text" name="ten_kh" value="<?php echo $row['ten_kh'] ?>"/>
								<input type="text" name="sdt" value="<?php echo $row['sdt'] ?>" />
								<input type="email" name="email" value="<?php echo $row['email'] ?>" />
								<input type="text" name="username" value=<?php echo $row['username'] ?> />
								<input type="date" name="ngay_sinh" value="<?php echo $row['ngay_sinh'] ?>" />
								<input type="password" name="new-pw" placeholder="Nhập mật khẩu mới?">
								<textarea name="dia_chi" rows="3" class="form-control"><?php echo $row['dia_chi'] ?></textarea>								
								<div class="submit-text coupon text-center" style="margin-top:10px">
									<button type="submit" class="btn btn-info" >Cập nhật</button>
								</div>
							</form>
						</div>
					</div>
				</div>

                <div class="bill col-sm-12 mt-5">
                    <div class="padding60 mx-auto">
						<div class="log-title">
							<h3 class="text-center"><strong>Lịch sử mua hàng</strong></h3>
						</div>

						<div class="card-body">
							<table class="table table-bordered text-center">
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
									$sql = "SELECT * FROM tbl_hdb where id_khach_hang = ".$id_khach_hang." ORDER BY id_hdb DESC
									 
									 "; 


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
											<a href="kh_chi_tiet_don.php?id=<?php echo $row["id_hdb"];?>" class="btn btn-info">Chi tiết</a>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
                    </div>
                </div>
			</div>
		</div>
	</section>
	<?php include 'includes/footer.php'; ?>
</body>
</html>

