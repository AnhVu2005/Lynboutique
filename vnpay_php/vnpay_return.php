<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
</head>

<body>
    <?php include '../includes/head.php'; ?>
    <?php
    require_once("./config.php");
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }

    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    ?>
    <!--Begin display -->
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">VNPAY RESPONSE</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>

                <label><?php echo $_GET['vnp_TxnRef'] ?></label>
            </div>
            <div class="form-group">

                <label>Số tiền:</label>
                <label><?php echo $_GET['vnp_Amount'] ?></label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã phản hồi (vnp_ResponseCode):</label>
                <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label><?php echo $_GET['vnp_BankCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label><?php echo $_GET['vnp_PayDate'] ?></label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label>
                    <?php
                    if ($secureHash == $vnp_SecureHash) {
                        if ($_GET['vnp_ResponseCode'] == '00') {
                            echo "<span style='color:blue'>GD Thanh cong</span>";



                            $id_khach_hang = $_SESSION['dang_nhap']["id_khach_hang"];
                            $phuong_thuc_tt = 'Thanh toán onl';
                            $ngay_dat_hang = date('Y-m-d');
                            $tong_tien = $_SESSION['tong_tien_gio_hang'];
                            $ten_kh = $_SESSION['thong_tin_khach_tt']['ten_kh'];
                            $email = $_SESSION['thong_tin_khach_tt']['email'];
                            $sdt = $_SESSION['thong_tin_khach_tt']['sdt'];
                            $dia_chi = $_SESSION['thong_tin_khach_tt']['dia_chi'];
                            $trang_thai = 'Chờ xác nhận thanh toán onl';

                            $sql_hdb = "INSERT INTO `tbl_hdb` (`id_khach_hang`, `phuong_thuc_tt`, `ngay_dat_hang`,`tong_tien`, `ten_kh`, `email`, `sdt`, `dia_chi`, `trang_thai`) 
                                        VALUES ('" . $id_khach_hang . "', '" . $phuong_thuc_tt . "', '" . $ngay_dat_hang . "', '" . $tong_tien . "', '" . $ten_kh . "', '" . $email . "', '" . $sdt . "', '" . $dia_chi . "', '" . $trang_thai . "');";

                            if ($ket_noi->query($sql_hdb) === TRUE) {
                                // insert chi tiết đơn hàng
                                $id_hdb = $ket_noi->insert_id;
                                foreach ($_SESSION['gio_hang'] as $gh) {
                                    $id_sp = $gh['id_sp'];
                                    $so_luong = $gh['so_luong_sp'];
                                    $gia_ban = (int) $gh['gia_giam'];
                                    $size = $gh['size'];
                                    $tong_tien = (int) ($gh['gia_giam'] * $gh['so_luong_sp']);

                                    $sql_chi_tiet = "INSERT INTO `tbl_chi_tiet_hdb` (`id_hdb`, `id_sp`, `size`, `so_luong`, `gia_ban`,`tong_tien`) 
                                                VALUES ('" . $id_hdb . "', '" . $id_sp . "', '" . $size . "', '" . $so_luong . "', '" . $gia_ban . "', '" . $tong_tien . "');";

                                    $ket_noi->query($sql_chi_tiet);

                                    $sql_update_so_luong = "UPDATE tbl_san_pham
                                            SET so_luong_" . $size . " = so_luong_" . $size . " - " . $so_luong . "
                                            WHERE id_sp = '" . $id_sp . "';";

                                    $ket_noi->query($sql_update_so_luong);
                                }

                                // insert onl
                                $sql_id_hdb = "SELECT id_hdb FROM tbl_hdb ORDER BY id_hdb DESC LIMIT 0,1";
                                $query_id = mysqli_query($ket_noi, $sql_id_hdb);
                                $id_hdb = mysqli_fetch_array($query_id);
                                $MaDH = $_GET['vnp_TxnRef'];
                                $SoTien = $_GET['vnp_Amount'];
                                $NDThanhToan = $_GET['vnp_OrderInfo'];
                                $MaPhanHoi = $_GET['vnp_ResponseCode'];
                                $MaGDVNPay = $_GET['vnp_TransactionNo'];
                                $MaNganHang = $_GET['vnp_BankCode'];
                                $TGThanhToan = $_GET['vnp_PayDate'];

                                $sql = " INSERT INTO `tbl_thanh_toan_onl` (`MaDH`, `id_hdb`, `SoTien`, `NDThanhToan`, `MaPhanHoi`, 
                                        `MaGDVNPay`, `MaNganHang`, `TGThanhToan`) 
                                        VALUES ('" . $MaDH . "', '" . $id_hdb["id_hdb"] . "', '" . $SoTien . "', '" . $NDThanhToan . "', '" . $MaPhanHoi . "',
                                        '" . $MaGDVNPay . "', '" . $MaNganHang . "', '" . $TGThanhToan . "'); ";

                                if ($ket_noi->query($sql) === TRUE && isset($_SESSION['thong_tin_khach_tt'])) { // Sau khi đặt hàng xong xóa giỏ hàng
                                    unset($_SESSION['gio_hang']);
                                    unset($_SESSION['tong_tien_gio_hang']);

                                    echo
                                    "
                                            <script type='text/javascript'>
                                                window.alert('Cảm ơn bạn đã thanh toán qua VNpay!');
                                            </script>
                                        ";

                                    echo
                                    "
                                            <script type='text/javascript'>
                                                window.location.href = '/DoAnTotNghiep'
                                            </script>
                                        ";
                                } else {
                                    echo
                                    "
                                            <script type='text/javascript'>
                                                window.alert('đã xảy ra lỗi vui lòng kiểm tra lại.');
                                            </script>
                                        ";
                                }
                            } else {
                                echo "<script type='text/javascript'>
                                            window.alert(Đặt hàng thất bại.');
                                        </script>";

                                // echo 
                                // "
                                //     <script type='text/javascript'>
                                //         window.location.href = '/DoAnTotNghiep'
                                //     </script>
                                // ";
                            }
                        } else {
                            echo "<span style='color:red'>GD Khong thanh cong</span>";
                        }
                    } else {
                        echo "<span style='color:red'>Chu ky khong hop le</span>";
                    }
                    ?>

                </label>
            </div>
        </div>
        <p>
            &nbsp;
        </p>
        <footer class="footer">
            <p>&copy; VNPAY <?php echo date('Y') ?></p>
        </footer>
    </div>
</body>

</html>