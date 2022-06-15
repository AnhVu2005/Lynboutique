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
	$id_tin_tuc = $_POST["txtID"];
	$ngay_dang = $_POST["ngay_viet"];
	$ten = $_POST["ten"];
	$tieu_de = $_POST["tieu_de"];
	$noi_dung = $_POST["noi_dung"];
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
		UPDATE `tbl_tin_tuc`
		SET
			`ngay_viet` = '".$ngay_dang."',
			`ten` = '".$ten."',
			`tieu_de` = '".$tieu_de."',
			`noi_dung` = '".$noi_dung."'
			WHERE `id_tin_tuc` = '".$id_tin_tuc."'
		";
	} else {
		$sql = "
		UPDATE `tbl_tin_tuc`
		SET
			`ngay_viet` = '".$ngay_dang."',
			`ten` = '".$ten."',
			`anh` = '".$filename."',
			`tieu_de` = '".$tieu_de."',
			`noi_dung` = '".$noi_dung."'
			WHERE `id_tin_tuc` = '".$id_tin_tuc."'
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
				window.alert('Bạn đã blog thành công.');
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