<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Đăng nhập</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./img/logo.jpg">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>

	<?php
		if(isset($_POST['dang_nhap'])) {
			$emailUsername = $_POST["emailUsername"];
			$password = md5($_POST["password"]);

			$sql = "SELECT * FROM tbl_khach_hang WHERE email = '".$emailUsername."' OR username = '".$emailUsername."' AND password = '".$password."'";
			$dang_nhap = mysqli_query($ket_noi, $sql);
			$row = mysqli_fetch_array($dang_nhap);

			if ($row) {
				$_SESSION['dang_nhap'] = [
					'id_khach_hang' => $row['id_khach_hang'],
					'email' => $row['email'],
					'ten_kh' => $row['ten_kh'],
				];

				echo 
				"
					<script type='text/javascript'>
						window.alert('Đăng nhập thành công.');
					</script>
				";

				// Chuyển người dùng vào trang quản trị tin tức
				echo 
				"
					<script type='text/javascript'>
						window.location.href = '/DoAnTotNghiep'
					</script>
				";
			} else {
				echo 
				"
					<script type='text/javascript'>
						window.alert('Đăng nhập thất bại. Sai email hoặc mật khẩu.');
					</script>
				";
				// echo "Error: " . $sql . "<br>" . $ket_noi->error;
			}
		}
	?>

    <!-- login content section start -->
	<section class="pages login-page section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="main-input padding60">
						<div class="log-title text-center">
							<h3><strong>Đăng nhập</strong></h3>
						</div>
						<div class="login-text">
							<div class="custom-input">
								<form action="/DoAnTotNghiep/dang_nhap.php" method="post">
									<input type="text" name="emailUsername" placeholder="Email hoặc Tên Đăng Nhập" />
									<div class="pw-group">
									<input type="password" id="password" name="password" placeholder="Mật khẩu" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mật Khẩu chứa 8 ký tự hoặc nhiều hơn. Gồm số, chữ in hoa, ký tự đặc biệt." required />
									<span id="showpw_btn">Hiện</span>
								</div>
									<a class="forget" href="/DoAnTotNghiep/dang_ky.php">Đăng ký</a><br>
									<div class="submit-text text-center">
										<button type="submit" name="dang_nhap">Đăng nhập</button>
									</div>
								</form>
							</div>
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