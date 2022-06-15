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
	if ( isset($_POST["huyDon"]) ) {
		$trangThai = $_POST["huyDon"];
	}else{$trangThai = $_POST["trangThai"];}
	
    $id = $_POST["id_hdb"];
	


	
	
		$sql = "
		UPDATE `tbl_hdb`
		SET
			`trang_thai` = '".$trangThai."'
			WHERE `id_hdb` = '".$id."' 
		";
	
//echo $sql; exit();
	// 4. Thực hiện truy vấn để thêm mới dữ liệu
	// mysqli_query($ket_noi, $sql);

	// // 5. Thông báo việc thêm mới tin tức thành công & quay trở lại trang quản lý tin tức
	// 	// Thông báo cho người dùng biết bài viết đã được thêm mới thành công
	// 	echo 
	// 	"
	// 		<script type='text/javascript'>
	// 			window.alert('Bạn đã cập nhật thành công.');
	// 		</script>
	// 	";

	// 	// Chuyển người dùng vào trang quản trị tin tức
	// 	echo 
	// 	"
	// 		<script type='text/javascript'>
	// 			window.location.href = './danh_sach.php'
	// 		</script>
	// 	";

        if ($ket_noi->query($sql) === TRUE) {

            echo 
            "
                <script type='text/javascript'>
                    window.alert('Bạn đã cập nhật thành công.');
                </script>
            ";
    
            // Chuyển người dùng vào trang quản trị tin tức

			if (isset($_POST["huyDon"])) {
				echo 
            "
                <script type='text/javascript'>
                    window.history.back();
                </script>
            ";
			}else{
				echo 
            "
                <script type='text/javascript'>
                    window.location.href = './danh_sach.php'
                </script>
            ";
			}
            
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