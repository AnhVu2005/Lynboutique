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

	// 2. Lẫy ra được ID muốn xóa
	$id_anh = $_GET["id"];
	// secho $id_tin_tuc; exit();

	// 3. Viết câu lệnh SQL để xóa tin tức có ID như trên
	$sql = "
		DELETE
		FROM tbl_anh
		WHERE id_anh='".$id_anh."'
	";

	// 4. Thực hiện truy vấn để xóa dữ liệu
	mysqli_query($ket_noi, $sql);

	// 5. Thông báo việc xóa tin tức thành công & quay trở lại trang quản lý tin tức
		// Thông báo cho người dùng biết bài viết đã được xóa thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã xóa ảnh thành công.');
			</script>
		";

		// Chuyển người dùng vào trang quản trị tin tức
		echo 
		"
			<script type='text/javascript'>
				window.location.href = './danh_sach.php'
			</script>
		";
;?>