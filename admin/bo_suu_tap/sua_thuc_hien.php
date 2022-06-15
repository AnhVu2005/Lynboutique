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
	$id_bst = $_POST["id"];
	$ten_bst = $_POST["ten_bst"];
	$mo_ta = $_POST["mo_ta"];
	$ngay_ra_mat = $_POST["ngay_ra_mat"];

	$sql = "
		UPDATE `tbl_bo_suu_tap`
		SET
			`ten_bst` = '".$ten_bst."',
			`mo_ta` = '".$mo_ta."',
			`ngay_ra_mat` = '".$ngay_ra_mat."'
			WHERE `id_bst` = '".$id_bst."' 
		";

	if ($ket_noi->query($sql) === TRUE) {

		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã cập nhật bộ sưu tập thành công.');
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