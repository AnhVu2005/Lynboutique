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
<?php

          include './PHPMailer-master/src/Exception.php';
					include './PHPMailer-master/src/PHPMailer.php';
					include './PHPMailer-master/src/SMTP.php';
					include './PHPMailer-master/src/OAuth.php';
					include './PHPMailer-master/src/POP3.php';
				use PHPMailer\PHPMailer\PHPMailer;
				use PHPMailer\PHPMailer\SMTP;
				use PHPMailer\PHPMailer\Exception;
// require 'vendor/autoload.php';
				
				if(isset($_POST["send"])){
					
					 


					// Instantiation and passing `true` enables exceptions
					$mail = new PHPMailer(true);
					try {
					

					$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
					$mail->isSMTP();                                            // Send using SMTP
					$mail->Host       = 'smtp.gmail.com';                    	// Set the SMTP server to send through
					$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
					$mail->Username   = 'lynbotique@gmail.com';                 // SMTP username
					$mail->Password   = 'wmcucirtjaqiagcz'; 					//'ABC123456*';  SMTP password
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
					$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
					$mail->isHTML(true);
					$mail->setFrom('from@example.com', 'Mailer');
				    $mail->addAddress($_POST["email"], 'Lyns User');     		// Add a recipient
					$mail->Subject = 'Lyns Boutique';
				    $mail->Body    =  $_POST["phan_hoi"];
				    $mail->send();

				    include('../includes/ket_noi.php');

					// 2. Lẫy dữ liệu để cập nhật tin tức
					$id_khach_hang = $_POST["id"];
					$ten_kh = $_POST["phan_hoi"];
					

					$sql = "
						UPDATE `tbl_lien_he`
						SET
							`phan_hoi` = '".$ten_kh."'
							WHERE `id_lien_he` = '".$id_khach_hang."' 
						";
						mysqli_query($ket_noi, $sql);
					    echo 
						"
							<script type='text/javascript'>
								window.alert('Bạn đã phản hồi thành công.');
							</script>
						";

						// Chuyển người dùng vào trang quản trị tin tức
						echo 
						"
							<script type='text/javascript'>
								window.location.href = './danh_sach.php'
							</script>
						";
					} catch (Exception $e) {
					    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
					}
				}
;?>
<!DOCTYPE html>
<html>
<head>
	<title>Phản hồi khách hàng</title>
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
					<h3 class="card-title">Phản hồi khách hàng</h3>
				</div>
				
				
				<?php 
					// 2. Lẫy ra được ID 
					$id_khach_hang = $_GET["id"];
					// secho $id_tin_tuc; exit();

					// 3. Viết câu lệnh SQL để lấy tin tức có ID như trên
					$sql = "
						SELECT *
						FROM tbl_lien_he
		                WHERE id_lien_he='".$id_khach_hang."'
					";
					// 4. Thực hiện truy vấn để lấy dữ liệu
					$khach_hang = mysqli_query($ket_noi, $sql);
					// 5. Hiển thị dữ liệu lên Website
					$row = mysqli_fetch_array($khach_hang);
				;?>
				<!-- /.card-header -->
				<div class="card-body">

					<form action="" method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tên khách hàng</label>
									<input name="id" class="form-control" type="hidden" required value="<?php echo $row['id_lien_he'] ?>">
									<input name="ten_kh" class="form-control" required value="<?php echo $row['ten'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Số điện thoại</label>
									<input name="sdt" class="form-control" value="<?php echo $row['sdt'] ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Email</label>
									<input name="email" type="email" class="form-control" value="<?php echo $row['email'] ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nội dung</label>
									<textarea name="noi_dung" class="form-control" value="<?php echo $row['noi_dung'] ?>" required><?php echo $row['noi_dung'] ?></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Phản hồi</label>
									<textarea name="phan_hoi" id="phan_hoi" class="form-control" value="<?php echo $row['phan_hoi'] ?>" required></textarea>
								</div>
							</div>
							

							<div class="col-md-12 text-center">
								<button name="send" type="submit" class="btn btn-info">Gửi</button>
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
</html>
