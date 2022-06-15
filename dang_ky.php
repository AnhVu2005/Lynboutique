<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Đăng ký tài khoản</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./img/logo.jpg">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>

	<?php
		if(isset($_POST['dang_ky']) && isset($_POST['ten_kh'])) {
			$ten_kh = $_POST["ten_kh"];
			$sdt = $_POST["sdt"];
			$email = $_POST["email"];
			$username = $_POST["username"];
			$password = md5($_POST["password"]);
			$dia_chi = $_POST["dia_chi"];
			$ngay_sinh = $_POST["ngay_sinh"];

			$sql = "INSERT INTO `tbl_khach_hang` (`ten_kh`, `sdt`, `email`, `username`, `password`, `dia_chi`, `ngay_sinh`) 
				VALUES ('".$ten_kh."', '".$sdt."', '".$email."', '".$username."', '".$password."', '".$dia_chi."', '".$ngay_sinh."');";

			if ($ket_noi->query($sql) === TRUE) {
				echo 
				"
					<script type='text/javascript'>
						window.alert('Đăng ký thành công.');
					</script>
				";

				// Chuyển người dùng vào đăng nhập
				echo 
				"
					<script type='text/javascript'>
						window.location.href = '/DoAnTotNghiep/dang_nhap.php'
					</script>
				";
			} else {
				echo "<script type='text/javascript'>
					window.alert('Đăng ký thất bại.');
				</script>";
				echo "Error: " . $sql . "<br>" . $ket_noi->error;
			}
		}
	?>

    <!-- login content section start -->
	<section class="pages login-page section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="main-input padding60 new-customer">
						<div class="log-title text-center">
							<h3><strong>Đăng ký tài khoản</strong></h3>
						</div>
						<div class="custom-input">
							<form action="/DoAnTotNghiep/dang_ky.php" method="post">
								<input type="text" name="ten_kh" placeholder="Họ và tên" />
								<input type="text" name="sdt" placeholder="Số điện thoại" />
								<input type="email" name="email" placeholder="Địa chỉ email" />
								<input type="text" name="username" placeholder="Tên đăng nhập" />
								<div class="pw-group">
									<input type="password" id="password" name="password" placeholder="Mật khẩu" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mật Khẩu chứa 8 ký tự hoặc nhiều hơn. Gồm số, chữ in hoa, ký tự đặc biệt." required />
									<span id="showpw_btn">Hiện</span>
								</div>								<input type="date" name="ngay_sinh" />
								<textarea name="dia_chi" rows="3" class="form-control" placeholder="Địa chỉ"></textarea>
								<div class="submit-text coupon text-center" style="margin-top: 5px">
									<button type="submit" name="dang_ky">Đăng ký</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- login content section end -->

	<?php include 'includes/footer.php'; ?>
</body>
</html>