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
				window.location.href = './DoAnTotNghiep/admin/dang_nhap.php'
			</script>
		";
	}
;?>
<?php 
	// 1. Chuỗi kết nối đến CSDL
	include('../includes/ket_noi.php');

	// 2. Lẫy dữ liệu để cập nhật tin tức
	$id_phan_loai = $_POST["txtID"];
	$ten_phan_loai = $_POST["txtten_phan_loai"];
	$mo_ta = $_POST["txtMoTa"];

// Lấy ra thông tin ảnh minh họa
	$filename = basename($_FILES["txtAnhMinhHoa"]["name"]);
	$anh_minh_hoa = "../../img/".$filename;
	$file_anh_tam = $_FILES["txtAnhMinhHoa"]["tmp_name"];
	$thuc_hien_luu_anh = move_uploaded_file($file_anh_tam, $anh_minh_hoa);
	if(!$thuc_hien_luu_anh) {
		$filename = NULL;
	}

	// 3. Viết câu lệnh SQL để cập nhật tin tức có ID như trên
	if($filename == NULL)
	{
		$sql = "
		UPDATE `tbl_phan_loai`
		SET
			`ten_phan_loai` = '".$ten_phan_loai."',
			`mo_ta` = '".$mo_ta."'
			WHERE `id_phan_loai` = '".$id_phan_loai."'
		";
	} else {
		$sql = "
		UPDATE `tbl_phan_loai`
		SET
			`ten_phan_loai` = '".$ten_phan_loai."',
			`anh` = '".$filename."',
			`mo_ta` = '".$mo_ta."'
			WHERE `id_phan_loai` = '".$id_phan_loai."' 
		";
	}
//echo $sql; exit();
	// 4. Thực hiện truy vấn để thêm mới dữ liệu
	mysqli_query($ket_noi, $sql);

	// 5. Thông báo việc thêm mới tin tức thành công & quay trở lại trang quản lý tin tức
		// Thông báo cho người dùng biết bài viết đã được thêm mới thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã cập nhật loại sản phẩm thành công.');
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