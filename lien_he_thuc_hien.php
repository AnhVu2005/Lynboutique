<?php include 'includes/head.php'; ?>
<?php 
	// 2. Lẫy dữ liệu để thêm mới tin tức
	$ten_kh = $_POST["first_name"];
	$username = $_POST["email"];
	$phonenumber = $_POST["phone_number"];
	$email = $_POST["description"];
	

	// 3. Viết câu lệnh SQL để thêm mới tin tức có ID như trên
	$sql = "
		INSERT INTO `tbl_lien_he` (`ten`, `email`, `sdt`, `noi_dung`) 
		VALUES ('".$ten_kh."', '".$username."', '".$phonenumber."', '".$email."'); 
	";

	// // 4. Thực hiện truy vấn để thêm mới dữ liệu
	// mysqli_query($ket_noi, $sql);

	if ($ket_noi->query($sql) === TRUE) {
	 	// 5. Thông báo việc thêm mới tin tức thành công & quay trở lại trang quản lý tin tức
		// Thông báo cho người dùng biết bài viết đã được thêm mới thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Cảm ơn bạn đã liên hệ, chúng tôi sẽ phản hồi lại cho bạn bằng gmail trong thời gian sớm nhất.');
			</script>
		";

		// Chuyển người dùng vào trang quản trị tin tức
		echo 
		"
			<script type='text/javascript'>
				window.location.href = './index.php'
			</script>
		";
	} else {
  		// echo "Error: " . $sql . "<br>" . $ket_noi->error;
  		echo 
		"
			<script type='text/javascript'>
				window.alert('đã xảy ra lỗi vui lòng kiểm tra lại.');
			</script>
		";

		echo 
		"
			<script type='text/javascript'>
				window.location.href = './lien_he.php'
			</script>
		";
	}
;?>