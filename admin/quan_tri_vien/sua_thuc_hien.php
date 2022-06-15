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
	$id = $_POST["id"];
	$ten = $_POST["ten"];
	$password = md5($_POST["new-pw"]);
	$email = $_POST["email"];
	$sdt = $_POST["sdt"];

	if ($_POST['new-pw'] != "") {
		$sql = "
			UPDATE `tbl_admin`
			SET
				`ten` = '".$ten."',
				`email` = '".$email."',
				`password` = '".$password."',
				`sdt` = '".$sdt."'
				WHERE `id` = '".$id."' 
			";
	}else{
		$sql = "
			UPDATE `tbl_admin`
			SET
				`ten` = '".$ten."',
				`email` = '".$email."',
				`sdt` = '".$sdt."'
				WHERE `id` = '".$id."' 
			";
	}
	if ($ket_noi->query($sql) === TRUE) {

		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã cập nhật quản trị viên thành công.');
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
	}
;?>