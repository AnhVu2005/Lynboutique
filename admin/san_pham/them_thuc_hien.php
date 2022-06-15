<?php 
	// session_start();
	// if(!$_SESSION['email']) {
	// 	echo 
	// 	"
	// 		<script type='text/javascript'>
	// 			window.alert('Bạn không có quyền truy cập!');
	// 		</script>
	// 	";

	// 	// Chuyển người dùng vào trang quản trị tin tức
	// 	echo 
	// 	"
	// 		<script type='text/javascript'>
	// 			window.location.href = './dang_nhap.php'
	// 		</script>
	// 	";
	// }
;?>
<?php 
	// 1. Chuỗi kết nối đến CSDL
	include('../includes/ket_noi.php');


	$ten_sp = $_POST["ten_sp"];
	$id_phan_loai = $_POST["id_phan_loai"];
	$id_ncc = $_POST["id_ncc"];
	$id_bst = $_POST["id_bst"];	
	$so_luong_s = $_POST["so_luong_s"];
	$so_luong_m = $_POST["so_luong_m"];
	$so_luong_l = $_POST["so_luong_l"];
	$so_luong_xl = $_POST["so_luong_xl"];
	$gia_ban = $_POST["gia_ban"];
	$muc_km = $_POST["muc_km"];
	$gia_giam = $_POST["gia_giam"];
	
	$mo_ta = $_POST["mo_ta"];

	// Lấy ra thông tin ảnh minh họa
	$anh = NULL;
	if(isset($_FILES["anh"]["name"]) && !empty($_FILES["anh"]["name"])) {
		$filename = time().'-'.basename($_FILES["anh"]["name"]);
		$anh_minh_hoa = "../../img/".$filename;
		$file_anh_tam = $_FILES["anh"]["tmp_name"];
		$thuc_hien_luu_anh = move_uploaded_file($file_anh_tam, $anh_minh_hoa);
		
		$anh = $filename;
	}
	// 3. Viết câu lệnh SQL để thêm mới tin tức có ID như trên
	$sql = "
		INSERT INTO `tbl_san_pham` (`ten_sp`, `id_phan_loai`, `id_ncc`, `id_bst`, `so_luong_s`, `so_luong_m`, `so_luong_l`, `so_luong_xl`,`gia_ban`,`muc_km`,`gia_giam`, `mo_ta`, `anh`) 
		VALUES ('".$ten_sp."', '".$id_phan_loai."', '".$id_ncc."', '".$id_bst."', '".$so_luong_s."', '".$so_luong_m."', '".$so_luong_l."', '".$so_luong_xl."', '".$gia_ban."', '".$muc_km."', '".$gia_giam."', '".$mo_ta."', '".$anh."'); ";

	// // 4. Thực hiện truy vấn để thêm mới dữ liệu
	// mysqli_query($ket_noi, $sql);

	if ($ket_noi->query($sql) === TRUE) {
	 	// 5. Thông báo việc thêm mới tin tức thành công & quay trở lại trang quản lý tin tức
		// Thông báo cho người dùng biết bài viết đã được thêm mới thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã thêm sản phẩm thành công.');
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