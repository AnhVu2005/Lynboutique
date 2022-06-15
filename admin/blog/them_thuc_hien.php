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
	$ngay_dang = $_POST["ngay_viet"];
	$ten = $_POST["ten"];
	$tieu_de = $_POST["tieu_de"];
	$noi_dung = $_POST["noi_dung"];
	
// echo "<pre>";
// print_r($_FILES);die;
	// Lấy ra thông tin ảnh minh họa

	$filename = basename($_FILES["txtAnhMinhHoa"]["name"]);
	$anh_minh_hoa = "../../img/".$filename;
	$file_anh_tam = $_FILES["txtAnhMinhHoa"]["tmp_name"];
	$thuc_hien_luu_anh = move_uploaded_file($file_anh_tam, $anh_minh_hoa);
	if(!$thuc_hien_luu_anh) {
		$anh_minh_hoa = NULL;
	}


	// 3. Viết câu lệnh SQL để thêm mới tin tức có ID như trên
	$sql = "
		INSERT INTO `tbl_tin_tuc` (`ngay_viet`, `anh`, `ten`, `tieu_de`,`noi_dung`) 
		VALUES ('".$ngay_dang."', '".$filename."', '".$ten."', '".$tieu_de."','".$noi_dung."'); 
	";

	// // 4. Thực hiện truy vấn để thêm mới dữ liệu
	// mysqli_query($ket_noi, $sql);

	if ($ket_noi->query($sql) === TRUE) {
	 	// 5. Thông báo việc thêm mới tin tức thành công & quay trở lại trang quản lý tin tức
		// Thông báo cho người dùng biết bài viết đã được thêm mới thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã thêm blog mới thành công.');
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