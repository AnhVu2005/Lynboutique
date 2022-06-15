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
?>
<?php 
	include('../includes/ket_noi.php');

	// 2. Lẫy dữ liệu để cập nhật tin tức
	$id_ncc = $_POST["id"];
	$ten_ncc = $_POST["ten_ncc"];
	$email = $_POST["email"];
	$sdt = $_POST["sdt"];
	$dia_chi = $_POST["dia_chi"];

	$logo = NULL;
	if(isset($_FILES["logo"]["name"]) && !empty($_FILES["logo"]["name"])) {
		$filename = time().'-'.basename($_FILES["logo"]["name"]);
		$anh_minh_hoa = "../../img/".$filename;
		$file_anh_tam = $_FILES["logo"]["tmp_name"];
		$thuc_hien_luu_anh = move_uploaded_file($file_anh_tam, $anh_minh_hoa);
		
		$logo = $filename;
	}

	if(empty($logo)) {
		$sql = "
			UPDATE `tbl_ncc`
			SET
				`ten_ncc` = '".$ten_ncc."',
				`email` = '".$email."',
				`sdt` = '".$sdt."',
				`dia_chi` = '".$dia_chi."'
				WHERE `id_ncc` = '".$id_ncc."' 
			";
	} else {
		$sql = "
			UPDATE `tbl_ncc`
			SET
				`ten_ncc` = '".$ten_ncc."',
				`email` = '".$email."',
				`sdt` = '".$sdt."',
				`dia_chi` = '".$dia_chi."', 
				`logo` = '".$logo."', 
				WHERE `id_ncc` = '".$id_ncc."'
			";
	}
	
	if ($ket_noi->query($sql) === TRUE) {

		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã cập nhật nhà cung cấp thành công.');
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