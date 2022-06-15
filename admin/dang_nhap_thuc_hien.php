<?php

    // 1. Chuỗi kết nối đến CSDL
    include('includes/ket_noi.php');

    // 2. Lẫy dữ liệu để thêm mới tin tức
    $email = $_POST['txtEmail'];
    $mat_khau = md5($_POST['txtMatKhau']);

    // 3. Viết câu lệnh SQL để thêm mới tin tức có ID như trên
    $sql = "
		SELECT *
		FROM tbl_admin
		WHERE email = '".$email."' AND password = '".$mat_khau."'
	";

    // 4. Thực hiện truy vấn để thêm mới dữ liệu
    $kiem_tra_dang_nhap = mysqli_query($ket_noi, $sql);
    $so_ban_ghi = mysqli_num_rows($kiem_tra_dang_nhap);

    // 5. Thông báo việc thêm mới tin tức thành công & quay trở lại trang quản lý tin tức
    if ($so_ban_ghi == 0) {
        echo
        "
			<script type='text/javascript'>
				window.alert('Đăng nhập thất bại.');
			</script>
		";

        // Chuyển người dùng vào trang quản trị tin tức
        echo
        "
			<script type='text/javascript'>
				window.location.href = './dang_nhap.php'
			</script>
		";
    } else {
        session_start();

        $_SESSION['email'] = $email;
        $_SESSION['quyen_han'] = 1;

        echo
        "
			<script type='text/javascript'>
				window.alert('Bạn đã đăng nhập thành công.');
			</script>
		";

        // Chuyển người dùng vào trang quản trị tin tức
        echo
        "
			<script type='text/javascript'>
				window.location.href = './index.php'
			</script>
		";
    }
