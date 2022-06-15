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
	// 1. Chuỗi kết nối đến CSDL
	include('../includes/ket_noi.php');

	// 2. Lẫy dữ liệu để cập nhật tin tức
	$id_khach_hang = $_POST["id"];
	$ten_kh = $_POST["ten_kh"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$sdt = $_POST["sdt"];
	$ngay_sinh = $_POST["ngay_sinh"];
	$dia_chi = $_POST["dia_chi"];

	$sql = "
		UPDATE `tbl_khach_hang`
		SET
			`ten_kh` = '".$ten_kh."',
			`username` = '".$username."',
			`email` = '".$email."',
			`sdt` = '".$sdt."',
			`ngay_sinh` = '".$ngay_sinh."',
			`dia_chi` = '".$dia_chi."'
			WHERE `id_khach_hang` = '".$id_khach_hang."' 
		";

	if ($ket_noi->query($sql) === TRUE) {

		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã cập nhật khách hàng thành công.');
			</script>
		";

		// Chuyển người dùng vào trang quản trị tin tức
		echo 
		"
			<script type='text/javascript'>
				window.location.href = './danh_sach.php'
			</script>
		";
	} else {
  		echo "Error: " . $sql . "<br>" . $ket_noi->error;

		echo 
		"
			<script type='text/javascript'>
				window.location.href = './danh_sach.php'
			</script>
		";
	}
;?>