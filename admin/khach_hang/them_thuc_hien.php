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
	$ten_kh = $_POST["ten_kh"];
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	$email = $_POST["email"];
	$sdt = $_POST["sdt"];
	$ngay_sinh = $_POST["ngay_sinh"];
	$dia_chi = $_POST["dia_chi"];
	
// echo "<pre>";
// print_r($_FILES);die;
	// Lấy ra thông tin ảnh minh họa


	// 3. Viết câu lệnh SQL để thêm mới tin tức có ID như trên
	$sql = "
		INSERT INTO `tbl_khach_hang` (`ten_kh`, `username`, `password`, `email`,`sdt`,`ngay_sinh`,`dia_chi`) 
		VALUES ('".$ten_kh."', '".$username."', '".$password."', '".$email."','".$sdt."', '".$ngay_sinh."','".$dia_chi."'); 
	";

	// // 4. Thực hiện truy vấn để thêm mới dữ liệu
	// mysqli_query($ket_noi, $sql);

	if ($ket_noi->query($sql) === TRUE) {
	 	// 5. Thông báo việc thêm mới tin tức thành công & quay trở lại trang quản lý tin tức
		// Thông báo cho người dùng biết bài viết đã được thêm mới thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã thêm khách hàng thành công.');
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