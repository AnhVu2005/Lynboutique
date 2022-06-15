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

	// 2. Lẫy dữ liệu để thêm mới tin tức
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
	


	// 3. Viết câu lệnh SQL để thêm mới tin tức có ID như trên
	$sql = "
		INSERT INTO `tbl_ncc` (`ten_ncc`, `email`, `sdt`,`dia_chi`, `logo`) 
		VALUES ('".$ten_ncc."', '".$email."', '".$sdt."', '".$dia_chi."','".$logo."'); 
	";

	// // 4. Thực hiện truy vấn để thêm mới dữ liệu
	// mysqli_query($ket_noi, $sql);

	if ($ket_noi->query($sql) === TRUE) {
	 	// 5. Thông báo việc thêm mới tin tức thành công & quay trở lại trang quản lý tin tức
		// Thông báo cho người dùng biết bài viết đã được thêm mới thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã thêm nhà cung cấp thành công.');
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