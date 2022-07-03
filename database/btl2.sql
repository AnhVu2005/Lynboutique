-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 22, 2022 lúc 03:18 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `thanh_vien` varchar(100) NOT NULL COMMENT 'thành viên thanh toán',
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán',
  `vnp_response_code` varchar(255) NOT NULL COMMENT 'mã phản hồi',
  `code_vnpay` varchar(255) NOT NULL COMMENT 'mã giao dịch vnpay',
  `code_bank` varchar(255) NOT NULL COMMENT 'mã ngân hàng',
  `time` datetime NOT NULL COMMENT 'thời gian chuyển khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `thanh_vien`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `time`) VALUES
(1, '742874161', 'abc', 100000, 'chinh chuyển khoản', '00', '13401455', 'NCB', '2020-10-10 01:00:00'),
(2, '608324672', 'abc', 1000000, 'test chuyển khoản', '00', '13401811', 'NCB', '2020-10-11 21:00:00'),
(3, '1134065293', 'CT2', 150000, 'học phí', '00', '13407163', 'NCB', '2020-10-22 23:00:00'),
(4, '596509313', 'CT2', 5000000, 'học phí', '00', '13407176', 'NCB', '2020-10-23 00:00:00'),
(5, '70267166', 'CT2', 5000000, 'học phí', '00', '13407178', 'NCB', '2020-10-23 00:00:00'),
(6, '1672349048', 'CT1', 150000, 'học phí', '00', '13407729', 'NCB', '2020-10-23 21:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sdt` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `ten`, `email`, `password`, `sdt`) VALUES
(12, 'Anh Vũ', 'vuhna@gmail.com', '71dd411ca7d6a494c13865587d08ce00', '0901772193'),
(17, 'Sơn Tùng', 'tunghoang162@gmail.com', '87772c6f66aa41fcba385ab534384f93', '0123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_anh`
--

CREATE TABLE `tbl_anh` (
  `id_anh` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_anh`
--

INSERT INTO `tbl_anh` (`id_anh`, `ten`, `id_sp`, `anh`) VALUES
(6, 'fdfd', 21, '06b375f9c77e11df270871a111433798688240b449e3a5c70563b9d5.jpg'),
(7, 'fgfg', 22, '06b375f9c77e11df270871a111433798688240b449e3a5c70563b9d5.jpg'),
(8, 'jjj', 22, '06b375f9c77e11df270871a111433798688240b449e3a5c70563b9d5.jpg'),
(9, 'áo thun venica', 19, '1594669508-4c82b3a7dbe92e33fc8bf3559f24159bec5624c624cbbdde83305031.jpg'),
(10, 'áo thun venica', 19, '1594669597-e07d1d71d958c8e53e35cb56c33da2a61e780c2b47ac3a7b5f0359b5.jpg'),
(11, 'áo thun venica', 23, '1594669597-e07d1d71d958c8e53e35cb56c33da2a61e780c2b47ac3a7b5f0359b5.jpg'),
(12, 'áo thun venica', 23, '1594669779-e07d1d71d958c8e53e35cb56c33da2a61e780c2b47ac3a7b5f0359b5.jpg'),
(14, 'hihi', 24, '64da232fde9aa1d6d0a40d081e90aaeb8b976a35bb20bb2d86586bb8.jpg'),
(15, 'haha', 25, '1594675874-6d670da95004cda08ca69ebd83b985b4661860a67678e16d2a7e02ed.jpg'),
(16, 'hoho', 26, '1594675932-19ccf662f75ec5b90a817d9f6f7f3d379a60d719928a6abc9cf1164b.jpg'),
(17, 'áo nỉ đen', 27, 'b63bb8fffe2b5ec2736ceb514b45e54e9ad8890960594348277e5c11.jpg'),
(18, 'micky hot', 28, '1594676159-e7b4f7eac4a8abb447976839f59f3cadccb5ab2f721f84b5f2fd32cd.jpg'),
(19, 'nỉ trắng', 29, '1594676235-da0e61b5f175a645b1c5fe24ad7239dae89e71cf984279802bcb7811.jpg'),
(21, 'nỉ friend', 30, '1594676399-cb857bceaa77b99a0a85bde2fb96ca71b63b1b387c24e1eb222b59af.jpg'),
(22, 'nỉ friend 2', 31, '1594676328-953aede6d494aeb44ccd9589f89a07f31adcccecbec6986d57becfc1.jpg'),
(23, 'short trắng', 32, '1594676716-1500100308024_1.jpg'),
(24, 'quần kẻ', 33, '1594675388-abd6cc5ed03e89eff059a97c7b4ad7645e5766bbc405ac3ceaaa4708.jpg'),
(25, 'short chấm bi', 34, '1594676762-1500200321756_2.jpg'),
(26, 'váy midi', 35, '08dd995eb8258d9455b9fd17fe60ee5538a30e1df8128aed4078cba5.jpg'),
(27, 'váy dài', 36, '1594677508-1700600305282_2.JPG'),
(28, 'váy jean', 37, '1594669508-4c82b3a7dbe92e33fc8bf3559f24159bec5624c624cbbdde83305031.jpg'),
(29, 'váy vàng', 38, '1594677992-1100400308481_2.JPG'),
(30, 'váy trắng', 39, '1594678106-1100200316525_2.JPG'),
(31, 'váy xanh', 40, '1594677825-1100500308701_2.JPG'),
(32, 'váy hoa', 44, '1594677888-1100400318572_2.JPG'),
(33, 'đầm hoa', 45, '1594677939-1100200262235_2.JPG'),
(34, 'váy trễ vàng', 46, '1594677992-1100400308481_2.JPG'),
(35, 'váy cúc', 47, '1594678044-1100300285684_2.JPG'),
(36, 'váy trắng dây', 48, '1594678106-1100200316525_2.JPG'),
(37, 'hihi', 48, '1594677787-1100500308732_2.JPG'),
(38, 'đầm nâu', 49, '1594678159-1100100309559_2.JPG'),
(39, '2 dây đen', 50, '1594678212-1100400314048_2.JPG'),
(40, 'váy xanh', 51, '1594678255-1100400289797_2.JPG'),
(41, 'ko co gi', 20, '1594675566-978c1ddd3b9990e4a88d5939acdbdf1304fe2a3ace467b30a04a7484.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bo_suu_tap`
--

CREATE TABLE `tbl_bo_suu_tap` (
  `id_bst` int(11) NOT NULL,
  `ten_bst` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_ra_mat` date NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_bo_suu_tap`
--

INSERT INTO `tbl_bo_suu_tap` (`id_bst`, `ten_bst`, `ngay_ra_mat`, `mo_ta`) VALUES
(3, 'Mùa hè ', '2023-05-01', ' Nàng có yêu những chuyến đi mùa hạ? Chúng mình tin rằng, được diện đồ tone-sur-tone cùng cô bạn thân, vi vu picnic chính là điều tuyệt vời nhất. Đưa nàng ghé thăm khu vườn ngập tràn ánh nắng và hương hoa tươi mới, Lookbook '),
(9, 'Mùa Đông', '2022-11-15', 'Tiết trời rét ngọt của tháng mười hai, lại thấy yêu cảm giác khoan khoái, dễ chịu khi thu đôi bàn tay trong những ống tay áo len dài ấm áp, vùi mình trong cái thi vị của bản nhạc du dương bên ly café. Khẽ chạm và cảm nhận sự mềm mại, êm ái của len trên đầu ngón tay cũng đủ làm người ta thấy ấm lòng trong những ngày lạnh giá.'),
(10, 'MÙA THU 2021', '2022-08-19', 'Dành tặng cho những cô gái của Méo một mảng trời xuân trong veo, thanh bình và giản đơn nơi Đà Lạt, nơi bạn có thể để lại sau lưng bao bộn bề, ưu tư và tận hưởng những phút giây thư giãn, yêu chiều bản thân.'),
(11, 'MÙA XUÂN', '2022-04-20', 'Trong tiết trời se lạnh những ngày cuối năm, nhìn những con phố ngập tràn sắc màu ấm áp, những chiếc lì xì đỏ thắm muôn nơi,… ta lại thấy Tết đã đến thật gần theo cách rất riêng của nó. Tết đến, chính là khoảnh khắc tuyệt vời của những buổi hẹn cuối năm, của những giai điệu tươi vui, và cả những bộ cánh mới điệu đà. '),
(12, 'MÃI MÃI TUỔI 20', '2022-07-04', 'Điều thú vị nhất của tuổi trẻ là khi chúng ta có thể đi bất cứ đâu, đi khắp thế giới, làm những gì mình thích và khám phá biết bao điều tuyệt vời. Cũng giống như việc được mặc trên mình một chiếc áo thun rộng rãi, thoải mái, cảm giác thật tự do.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chi_tiet_hdb`
--

CREATE TABLE `tbl_chi_tiet_hdb` (
  `id_chi_tiet` int(11) NOT NULL,
  `id_hdb` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_ban` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_chi_tiet_hdb`
--

INSERT INTO `tbl_chi_tiet_hdb` (`id_chi_tiet`, `id_hdb`, `id_sp`, `size`, `so_luong`, `gia_ban`, `tong_tien`) VALUES
(1, 1, 20, 's', 1, 150000, 150000),
(2, 1, 25, 'm', 1, 349000, 349000),
(35, 21, 20, 'xl', 5, 150000, 750000),
(36, 22, 20, 'm', 1, 150000, 150000),
(37, 23, 20, 'm', 1, 150000, 150000),
(38, 24, 45, 's', 1, 600000, 600000),
(39, 25, 47, 'l', 5, 550000, 2750000),
(40, 26, 20, 'l', 4, 150000, 600000),
(41, 26, 23, 'm', 5, 149000, 745000),
(42, 27, 19, 'l', 6, 100000, 600000),
(43, 28, 39, 'm', 3, 280000, 840000),
(44, 29, 39, 'l', 3, 280000, 840000),
(45, 30, 39, 's', 5, 280000, 1400000),
(46, 30, 40, 'l', 5, 350000, 1750000),
(47, 31, 39, 'xl', 10, 280000, 2800000),
(48, 32, 27, 'l', 10, 300000, 3000000),
(49, 33, 39, 's', 10, 280000, 2800000),
(50, 34, 27, 'm', 12, 300000, 3600000),
(51, 35, 37, 's', 6, 249000, 1494000),
(52, 36, 32, 'm', 15, 250000, 3750000),
(53, 37, 32, 'l', 15, 250000, 3750000),
(54, 38, 28, 'm', 1, 299000, 299000),
(55, 39, 28, 'm', 1, 299000, 299000),
(56, 40, 20, 'm', 1, 150000, 150000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_goi_y_sp`
--

CREATE TABLE `tbl_goi_y_sp` (
  `id` int(12) NOT NULL,
  `id_sp` int(12) NOT NULL,
  `views` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_goi_y_sp`
--

INSERT INTO `tbl_goi_y_sp` (`id`, `id_sp`, `views`) VALUES
(1, 19, 2),
(2, 20, 3),
(3, 21, 1),
(4, 22, 5),
(5, 23, 10),
(6, 24, 6),
(7, 25, 20),
(8, 26, 15),
(9, 27, 7),
(10, 28, 31),
(11, 29, 0),
(12, 30, 0),
(13, 31, 0),
(14, 32, 8),
(15, 33, 0),
(16, 34, 0),
(17, 35, 1),
(18, 36, 0),
(19, 37, 3),
(20, 38, 0),
(21, 39, 24),
(22, 40, 8),
(23, 41, 1),
(24, 42, 9),
(25, 43, 7),
(26, 44, 5),
(27, 45, 10),
(28, 46, 2),
(29, 47, 5),
(30, 48, 5),
(31, 49, 1),
(32, 50, 12),
(33, 52, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hdb`
--

CREATE TABLE `tbl_hdb` (
  `id_hdb` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `phuong_thuc_tt` varchar(100) NOT NULL,
  `ngay_dat_hang` date NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ten_kh` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `trang_thai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_hdb`
--

INSERT INTO `tbl_hdb` (`id_hdb`, `id_khach_hang`, `phuong_thuc_tt`, `ngay_dat_hang`, `tong_tien`, `ten_kh`, `email`, `sdt`, `dia_chi`, `trang_thai`) VALUES
(1, 1, 'Thanh toán khi nhận hàng', '2022-01-17', 499000, 'Hoàng Hải Yến', 'hhy260299@gmail.com', '0912345678', '40 Thái Hà, Đống Đa, Hà Nội', 'Đã nhận hàng'),
(21, 1, 'Thanh toán khi nhận hàng', '2022-04-16', 750000, 'Hoàng Hải Yến', 'hhy2602@gmail.com', '0912345678', '50 Thái Hà, Đống Đa, Hà Nội', 'Đã nhận hàng'),
(22, 1, 'Thanh toán khi nhận hàng', '2022-04-17', 150000, 'Hoàng Hải Yến', 'hhy2602@gmail.com', '0912345678', '50 Thái Hà, Đống Đa, Hà Nội', 'Đã nhận hàng'),
(23, 1, 'Thanh toán khi nhận hàng', '2022-04-17', 150000, 'Hoàng Hải Yến', 'hhy2602@gmail.com', '0912345678', '50 Thái Hà, Đống Đa, Hà Nội', 'Hủy đơn'),
(24, 1, 'Thanh toán khi nhận hàng', '2022-04-17', 600000, 'Hoàng Hải Yến', 'hhy2602@gmail.com', '0912345678', '50 Thái Hà, Đống Đa, Hà Nội', 'Hủy đơn'),
(25, 2, 'Thanh toán khi nhận hàng', '2022-04-18', 2750000, 'Nguyễn Phương Linh', 'LNPL@gmail.com', '0984738473', '9 Chùa Bộc, Đống Đa, Hà Nội', 'Chờ xác nhận'),
(26, 4, 'Thanh toán khi nhận hàng', '2022-04-25', 1345000, 'Hoàng Nghĩa Anh Vũ', 'anhvu200599@gmail.com', '0901234567', '90 Đại La, Hai Bà Trưng, Hà Nội', 'Chờ xác nhận'),
(27, 4, 'Thanh toán khi nhận hàng', '2022-04-25', 600000, 'Hoàng Nghĩa Anh Vũ', 'anhvu200599@gmail.com', '0901234567', '90 Đại La, Hai Bà Trưng, Hà Nội', 'Chờ xác nhận'),
(28, 4, 'Thanh toán khi nhận hàng', '2022-04-25', 840000, 'Hoàng Nghĩa Anh Vũ', 'anhvu200599@gmail.com', '0901234567', '90 Đại La, Hai Bà Trưng, Hà Nội', 'Hủy đơn'),
(29, 2, 'Thanh toán khi nhận hàng', '2022-04-25', 840000, 'Nguyễn Phương Linh', 'LNPL@gmail.com', '0984738473', '9 Chùa Bộc, Đống Đa, Hà Nội', 'Hủy đơn'),
(30, 3, 'Thanh toán khi nhận hàng', '2022-04-25', 3150000, 'Hoàng Sơn Tùng', 'tunghoang162@gmail.com', '0902468102', 'Hồng Hà Eco, Thanh Trì', 'Đã nhận hàng'),
(31, 2, 'Thanh toán khi nhận hàng', '2022-04-25', 2800000, 'Nguyễn Phương Linh', 'LNPL@gmail.com', '0984738473', '9 Chùa Bộc, Đống Đa, Hà Nội', 'Hủy đơn'),
(32, 2, 'Thanh toán khi nhận hàng', '2022-04-25', 3000000, 'Nguyễn Phương Linh', 'LNPL@gmail.com', '0984738473', '9 Chùa Bộc, Đống Đa, Hà Nội', 'Đã nhận hàng'),
(33, 4, 'Thanh toán khi nhận hàng', '2022-04-25', 2800000, 'Hoàng Nghĩa Anh Vũ', 'anhvu200599@gmail.com', '0901234567', '90 Đại La, Hai Bà Trưng, Hà Nội', 'Hủy đơn'),
(34, 4, 'Thanh toán khi nhận hàng', '2022-04-25', 3600000, 'Hoàng Nghĩa Anh Vũ', 'anhvu200599@gmail.com', '0901234567', '90 Đại La, Hai Bà Trưng, Hà Nội', 'Đã nhận hàng'),
(35, 4, 'Thanh toán khi nhận hàng', '2022-04-25', 1494000, 'Hoàng Nghĩa Anh Vũ', 'anhvu200599@gmail.com', '0901234567', '90 Đại La, Hai Bà Trưng, Hà Nội', 'Đã nhận hàng'),
(36, 4, 'Thanh toán khi nhận hàng', '2022-04-26', 3750000, 'Hoàng Nghĩa Anh Vũ', 'anhvu200599@gmail.com', '0901234567', '90 Đại La, Hai Bà Trưng, Hà Nội', 'Đặt hàng'),
(37, 3, 'Thanh toán khi nhận hàng', '2022-04-26', 3750000, 'Hoàng Sơn Tùng', 'tunghoang162@gmail.com', '0902468102', 'Hồng Hà Eco, Thanh Trì', 'Hủy đơn'),
(38, 4, 'Thanh toán khi nhận hàng', '2022-04-26', 299000, 'Hoàng Nghĩa Anh Vũ', 'anhvu200599@gmail.com', '0901234567', '90 Đại La, Hai Bà Trưng, Hà Nội', 'Chờ xác nhận'),
(39, 4, 'Thanh toán khi nhận hàng', '2022-04-26', 299000, 'Hoàng Nghĩa Anh Vũ', 'anhvu200599@gmail.com', '0901234567', '90 Đại La, Hai Bà Trưng, Hà Nội', 'Chờ xác nhận'),
(40, 4, 'Thanh toán khi nhận hàng', '2022-04-26', 150000, 'Hoàng Nghĩa Anh Vũ', 'anhvu200599@gmail.com', '0901234567', '90 Đại La, Hai Bà Trưng, Hà Nội', 'Chờ xác nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khach_hang`
--

CREATE TABLE `tbl_khach_hang` (
  `id_khach_hang` int(11) NOT NULL,
  `ten_kh` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_khach_hang`
--

INSERT INTO `tbl_khach_hang` (`id_khach_hang`, `ten_kh`, `username`, `password`, `email`, `sdt`, `ngay_sinh`, `dia_chi`) VALUES
(1, 'Hoàng Hải Yến', 'yen262', 'f6c6e3408694d6959a243ce44c3dfe54', 'hhy2602@gmail.com', '0912345678', '1999-02-26', '50 Thái Hà, Đống Đa, Hà Nội'),
(2, 'Nguyễn Phương Linh', 'npl24', '45d98b2fa66d5a3b916196108aa2ae36', 'LNPL@gmail.com', '0984738473', '2001-01-13', '9 Chùa Bộc, Đống Đa, Hà Nội'),
(3, 'Hoàng Sơn Tùng', 'tipwilson16', '4ce0886f16a0e8d80aee6cf265bf755a', 'tunghoang162@gmail.com', '0902468102', '1999-02-16', 'Hồng Hà Eco, Thanh Trì'),
(4, 'Hoàng Nghĩa Anh Vũ', 'hnav214', 'e60e383411343f83eb6aa098bb013b3f', 'anhvu200599@gmail.com', '0901234567', '1999-04-21', '90 Đại La, Hai Bà Trưng, Hà Nội'),
(5, 'Nguyễn Hà Trang', 'nhtrang@gmail.com', '7ab14fb890fcfd19a9cc79a70c3a6dc8', 'nhtrang@gmail.com', '0912345678', '1999-08-02', '18 Tạ Quang Bửu, Hai Bà Trưng, Hà Nội\r\n'),
(6, 'Nguyễn Phương Anh', 'npa99@gmail.com', '71391005dd62b5e5b6a8c028324f58f6', 'npa99@gmail.com', '0912345876', '2000-11-10', '50 Hàng Bạc, Hoàn Kiếm, Hà Nội'),
(7, 'Nguyễn Minh Anh', 'mna15@gmail.com', 'a013dc3391181b848fa338be6a56a064', 'mna15@gmail.com', '0912349876', '1999-11-15', '102 Minh Khai, Hai bà Trưng, Hà Nội'),
(8, 'Vũ Thùy Vân', 'vtv08@gmail.com', '6e3d3009afffb95bc13038f6ba3cebd8', 'vtv08@gmail.com', '091298765', '2000-09-10', '120 Hoàng Quốc Việt, Cầu Giấy, Hà Nội'),
(19, 'Đinh Quốc Bình', 'QBinh', 'd240ebd1abbcac8ed94505d6ccb55932', 'dqb270599@gmail.com', '012345679', '1999-05-27', '112 Trần Đại Nghĩa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lien_he`
--

CREATE TABLE `tbl_lien_he` (
  `id_lien_he` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `sdt` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `noi_dung` text NOT NULL,
  `phan_hoi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_lien_he`
--

INSERT INTO `tbl_lien_he` (`id_lien_he`, `ten`, `sdt`, `email`, `noi_dung`, `phan_hoi`) VALUES
(1, 'Hoàng Hải Yến', 395485843, 'hhy2602@gmail.com', 'muốn đổi sang mẫu khác', 'dgdfg'),
(2, 'Nguyễn Phương Linh', 834572937, 'LNPL@gmail.com', 'Hàng bị lỗi, muốn đổi mẫu khác', 'dfsdfsdfsdf'),
(3, 'Hoàng Hải Yến', 958365843, 'hhy2602@gmail.com', 'Váy xinh nhưng hơi bé.Muốn đổi size váy', NULL),
(4, 'Hoàng Nghĩa Anh Vũ', 901772193, 'anhvu200599@gmail.com', 'Mình muốn đổi Váy hai dây màu đen sang sản phẩm Váy trắng hai dây', 'Cảm ơn quý khách đã liên hệ và Shop sẽ đổi sản phẩm cho bạn. Bạn vui lòng bảo quản sản phẩm cẩn thận và giữ nguyên tem mác cho tới ngày đổi nhé!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ncc`
--

CREATE TABLE `tbl_ncc` (
  `id_ncc` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `ten_ncc` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` int(20) NOT NULL,
  `dia_chi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_ncc`
--

INSERT INTO `tbl_ncc` (`id_ncc`, `logo`, `ten_ncc`, `email`, `sdt`, `dia_chi`) VALUES
(5, '1594666080-unnamed.png', 'Tổng Công Ty May 10 - CTCP', 'cskh@garco10.com.vn', 919636628, 'Hà Nội'),
(6, '1594667250-L39568356700-1.gif', 'May Cần Mẫn - Công Ty TNHH May Cần Mẫn', 'nguyendacchin@canmangarment.com', 909303579, 'HN'),
(7, '1594667410-Untitled-1.png', 'Công Ty TNHH Thời Trang Felegant Uniform', 'oanhtu.felegant@gmail.com', 909045785, 'SÃ i GÃ²n'),
(8, '1594667503-L39574408100.gif', 'May Phước Sơn - Công Ty TNHH Sản Xuất Thương Mại Dịch Vụ May Phước Sơn', 'info@phuocson-garment.com', 2147483647, 'Hà Nội\r\n'),
(9, '1594667659-L39572021200.gif', 'May Mặc Vĩnh Tài - Công Ty TNHH Sản Xuất & Thương Mại Vĩnh Tài', 'kinhdoanh@vinhtai.vn', 903373811, 'Sài Gòn'),
(10, '1594667765-L39571582700.gif', 'Thời Trang HP - Công Ty TNHH Sản Xuất Thương Mại Liên Kết Thời Trang HP', 'info@hplinkfashion.com', 62874630, 'Hà Nội'),
(11, '1594667828-L39570997500-1.gif', 'May Mặc An Phát - Công Ty TNHH XNK May Mặc An Phát', 'anphatppt@gmail.com', 906300850, 'Sài Gòn\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phan_loai`
--

CREATE TABLE `tbl_phan_loai` (
  `id_phan_loai` int(11) NOT NULL,
  `ten_phan_loai` varchar(255) NOT NULL,
  `anh` text NOT NULL,
  `mo_ta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_phan_loai`
--

INSERT INTO `tbl_phan_loai` (`id_phan_loai`, `ten_phan_loai`, `anh`, `mo_ta`) VALUES
(1, 'Áo Thun', 'Ã¡o thun.jpg', 'Năng Động'),
(2, 'Áo nỉ', 'b63bb8fffe2b5ec2736ceb514b45e54e9ad8890960594348277e5c11.jpg', 'Thoải mái\r\n'),
(3, 'Quần short', '23bd0a09bda62037a51013b3125970fcae42463ae559f07c61f2ea5f.jpg', 'Năng Động'),
(4, 'Chân Váy', '08dd995eb8258d9455b9fd17fe60ee5538a30e1df8128aed4078cba5.jpg', 'Sexy'),
(5, 'Yếm Váy', '64da232fde9aa1d6d0a40d081e90aaeb8b976a35bb20bb2d86586bb8.jpg', 'Thời trang'),
(6, 'Váy liền', '3cb0da93bbfcc1452e677d42cf61cf5126207cf9b47863a3493a8f27.jpg', 'Dịu Dàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_san_pham`
--

CREATE TABLE `tbl_san_pham` (
  `id_sp` int(11) NOT NULL,
  `id_ncc` int(11) NOT NULL,
  `id_phan_loai` int(11) NOT NULL,
  `id_bst` int(11) DEFAULT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `anh` text NOT NULL,
  `so_luong` int(11) NOT NULL,
  `so_luong_s` int(11) NOT NULL,
  `so_luong_m` int(11) NOT NULL,
  `so_luong_l` int(11) NOT NULL,
  `so_luong_xl` int(11) NOT NULL,
  `gia_ban` int(11) NOT NULL,
  `gia_giam` int(11) DEFAULT NULL,
  `muc_km` int(11) DEFAULT NULL,
  `mo_ta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_san_pham`
--

INSERT INTO `tbl_san_pham` (`id_sp`, `id_ncc`, `id_phan_loai`, `id_bst`, `ten_sp`, `anh`, `so_luong`, `so_luong_s`, `so_luong_m`, `so_luong_l`, `so_luong_xl`, `gia_ban`, `gia_giam`, `muc_km`, `mo_ta`) VALUES
(19, 6, 1, 3, 'Áo thun Venice ', '1594669779-e07d1d71d958c8e53e35cb56c33da2a61e780c2b47ac3a7b5f0359b5.jpg', 200, 50, 50, 44, 50, 200000, 100000, 10, 'Năng động '),
(20, 5, 1, 3, 'Áo thun Barcelona', '1594669508-4c82b3a7dbe92e33fc8bf3559f24159bec5624c624cbbdde83305031.jpg', 200, 52, 48, 50, 56, 200000, 150000, 5, 'Áo thun nữ, cổ tròn, freesize.\r\n\r\nChất liệu: cotton.\r\n\r\nMàu sắc: đen.'),
(21, 6, 1, 3, 'Áo thun California', '1594675388-abd6cc5ed03e89eff059a97c7b4ad7645e5766bbc405ac3ceaaa4708.jpg', 200, 50, 50, 50, 50, 250000, 149000, 10, 'Áo thun nữ, cổ tròn, freesize. Chất liệu: cotton. Màu sắc: đen.'),
(22, 7, 1, 3, 'Áo thun Egg', '1594675498-1709698cf438183b6828197e5e804ed2ae229f69b87c6b02758f7090.jpg', 200, 50, 50, 50, 50, 250000, 149000, 10, 'Áo thun nữ, cổ tròn, freesize. Chất liệu: cotton. Màu sắc: Trắng.'),
(23, 7, 1, 3, 'Áo thun London', '1594675566-978c1ddd3b9990e4a88d5939acdbdf1304fe2a3ace467b30a04a7484.jpg', 200, 50, 45, 50, 50, 200000, 149000, 5, 'Áo thun nữ, cổ tròn, freesize. Chất liệu: cotton. Màu sắc: vàng.'),
(24, 6, 1, 9, 'Áo thun Healthy', '1594675647-fdd78d764ebc85f4c5c481779a80f44498886d6c0d5287db9f21c45c.jpg', 200, 50, 50, 50, 50, 200000, 99000, 15, 'Áo thun nữ, cổ tròn, freesize. Chất liệu: cotton. Màu sắc: tím.'),
(25, 11, 2, 9, 'Áo nỉ tom and jerry', '1594675874-6d670da95004cda08ca69ebd83b985b4661860a67678e16d2a7e02ed.jpg', 200, 50, 50, 50, 50, 450000, 349000, 10, 'SKU: ANA-00529'),
(26, 11, 2, 9, 'Áo nỉ Trắng có mũ', '1594675932-19ccf662f75ec5b90a817d9f6f7f3d379a60d719928a6abc9cf1164b.jpg', 200, 50, 50, 50, 50, 500000, 400000, 10, 'SKU: ANA-00530'),
(27, 11, 2, 9, 'Áo nỉ đen', '1594676091-c9440b57df827343eb7a45f6e34a99cc63e26164e83ae8c124ed2249.jpg', 200, 50, 38, 40, 50, 500000, 300000, 15, 'SKU: ANA-00531'),
(28, 10, 2, 9, 'Áo nỉ mickey hot 2020', '1594676159-e7b4f7eac4a8abb447976839f59f3cadccb5ab2f721f84b5f2fd32cd.jpg', 200, 50, 48, 50, 50, 500000, 299000, 20, 'SKU: ANA-00529'),
(29, 10, 2, 9, 'Áo nỉ trắng ', '1594676235-da0e61b5f175a645b1c5fe24ad7239dae89e71cf984279802bcb7811.jpg', 200, 50, 50, 50, 50, 300000, 250000, 5, 'SKU: ANA-00529'),
(30, 10, 2, 10, 'Áo nỉ cho bạn bè', '1594676328-953aede6d494aeb44ccd9589f89a07f31adcccecbec6986d57becfc1.jpg', 200, 50, 50, 50, 50, 400000, 350000, 5, 'SKU: ANA-00529'),
(31, 11, 2, 10, 'Áo nỉ cho bạn bè', '1594676399-cb857bceaa77b99a0a85bde2fb96ca71b63b1b387c24e1eb222b59af.jpg', 200, 50, 50, 50, 50, 400000, 250000, 25, 'SKU: ANA-005300'),
(32, 7, 3, 10, 'Quần Short Trắng', '1594676565-e525b9484a1d07510225d8dd3e2541eb4e4f892c85e14f3f7b5acbcf.jpg', 200, 50, 35, 35, 50, 32000, 250000, 10, 'Quần short nữ mang phong cách năng động, trẻ trung.\r\nThiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.\r\nChất liệu: Kaki.\r\nThông số: \r\n'),
(33, 10, 3, 10, 'Quần kẻ', '1594676716-1500100308024_1.jpg', 200, 50, 50, 50, 50, 400000, 399000, 10, 'Quần short nữ mang phong cách năng động, trẻ trung.\r\nThiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.\r\nChất liệu: Kaki.\r\n\r\n'),
(34, 10, 3, 10, 'Short chấm bi', '1594676762-1500200321756_2.jpg', 200, 50, 50, 50, 50, 450000, 400000, 5, 'Quần short nữ mang phong cách năng động, trẻ trung.\r\nThiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.\r\nChất liệu: Kaki.'),
(35, 8, 4, 11, 'Váy MIDI', '1594676928-1700500232299_2.JPG', 200, 50, 50, 50, 50, 300000, 249000, 5, 'Váy midi mang phong cách năng động, trẻ trung.\r\nThiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(36, 8, 4, 11, 'Chân váy dài', '1594677033-1700300299355_2.JPG', 200, 50, 50, 50, 50, 400000, 320000, 10, 'Váy dài mang phong cách năng động, trẻ trung.\r\nThiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(37, 8, 4, 11, 'Chân váy Jean', '1594677088-1700400282165_2.JPG', 200, 44, 50, 50, 50, 300000, 249000, 5, 'Váy jean mang phong cách năng động, trẻ trung.\r\nThiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(38, 8, 4, 11, 'Chân Váy vàng', '1594677375-1700400314835_2.JPG', 200, 50, 50, 50, 50, 400000, 320000, 5, 'Váy midi mang phong cách năng động, trẻ trung.\r\nThiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(39, 8, 4, 11, 'Váy trắng', '1594677454-1700300321711_2.JPG', 200, 35, 47, 47, 40, 300000, 280000, 5, 'Váy trắng mang phong cách năng động, trẻ trung.\r\nThiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(40, 8, 4, 11, 'Váy xanh', '1594677508-1700600305282_2.JPG', 200, 50, 50, 45, 50, 400000, 350000, 5, 'Váy midi mang phong cách năng động, trẻ trung.\r\nThiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(41, 6, 5, 3, 'Yếm sọc đỏ', '1594677736-1100500308718_2.JPG', 200, 50, 50, 50, 50, 600000, 450000, 20, 'Thiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(42, 7, 5, 3, 'Yếm trắng', '1594677787-1100500308732_2.JPG', 200, 50, 50, 50, 50, 550000, 480000, 10, 'Thiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(43, 8, 5, 3, 'Yếm xanh', '1594677825-1100500308701_2.JPG', 200, 50, 50, 50, 50, 60000, 450000, 20, 'Thiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(44, 7, 6, 11, 'Váy Hoa', '1594677888-1100400318572_2.JPG', 200, 50, 50, 50, 50, 700000, 580000, 20, 'Thiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(45, 9, 6, 12, 'Đầm Hoa tay bồng', '1594677939-1100200262235_2.JPG', 200, 50, 50, 50, 50, 800000, 600000, 20, 'Thiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(46, 7, 6, 12, 'Váy trễ vai vàng', '1594677992-1100400308481_2.JPG', 200, 50, 50, 50, 50, 700000, 580000, 10, 'Thiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(47, 10, 6, 12, 'Váy cúc', '1594678044-1100300285684_2.JPG', 200, 50, 50, 45, 50, 600000, 550000, 5, 'Thiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(48, 8, 6, 12, 'Váy trắng hai dây', '1594678106-1100200316525_2.JPG', 200, 50, 50, 50, 50, 900000, 650000, 25, 'Thiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(49, 11, 6, 12, 'Đầm nâu', '1594678159-1100100309559_2.JPG', 200, 50, 50, 50, 50, 750000, 600000, 20, 'Thiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.'),
(50, 10, 6, 12, 'Váy hai dây màu đen', '1594678212-1100400314048_2.JPG', 200, 50, 50, 50, 50, 800000, 700000, 10, 'Thiết kế đơn giản, dễ dàng kết hợp với các phụ kiện thời trang khác.\r\nĐường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian.\r\nThích hợp diện đi chơi, dạo phố.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tin_tuc`
--

CREATE TABLE `tbl_tin_tuc` (
  `id_tin_tuc` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `tieu_de` text NOT NULL,
  `noi_dung` text NOT NULL,
  `anh` text NOT NULL,
  `ngay_viet` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_tin_tuc`
--

INSERT INTO `tbl_tin_tuc` (`id_tin_tuc`, `ten`, `tieu_de`, `noi_dung`, `anh`, `ngay_viet`) VALUES
(5, 'VÁY DÀI ĐẸP ĐỦ MỌI PHONG CÁCH – GIÁ CỰC TỐT CHO CÁC NÀNG', 'VÁY DÀI ĐẸP ĐỦ MỌI PHONG CÁCH – GIÁ CỰC TỐT CHO CÁC NÀNG', 'Những chiếc chân váy dài đẹp và cuốn hút luôn là trợ thủ đắc lực cho các cô nàng hiện đại trong mọi dịp, giúp các chị em thoải mái biến hóa từ phong cách lịch sự, trưởng thành đến tự tin, năng động đầy cá tính. Và hơn thế nữa, những chiếc chân váy dài sẽ giúp mang đến vẻ quyến rũ gợi cảm khó cưỡng dành cho các quý cô. Chỉ cần một chút khéo léo và tinh tế trong cách phối đồ, sẽ không gì có thể cản bước các cô gái trở nên xinh đẹp và hấp dẫn hơn bao giờ hết. Với mức giá cực kì hấp dẫn, đa dạng và kiểu dáng, LYN luôn mang đến những mẫu váy dài đẹp và chất lượng hơn bao giờ hết.\r\n\r\n \r\nThời Trang Nhất Cho Các Nàng\r\n', 'chan_vay_dai.jpg', '2022-04-20'),
(6, '55 KIỂU ĐẦM ĐẸP HÚT MẮT – PHONG CÁCH NHẤT 2020', '55 KIỂU ĐẦM ĐẸP HÚT MẮT – PHONG CÁCH NHẤT 2020', 'Tìm kiếm cho mình những kiểu đầm đẹp, hợp thời trang và hấp dẫn nhất cho năm nay là điều không dễ dàng đối với các nàng đúng không nào? Trên thị trường đã có quá nhiều cửa hàng thời trang, nhưng mua những mẫu váy đẹp 2020 ở đâu để khẳng định cá tính và phong cách? Bộ sưu tập các mẫu đầm đẹp 2020 của J-P Fashion chắc chắn sẽ giúp giải đáp mọi thắc mắc của các nàng. Được cập nhật liên tục và nhanh chóng nhất, J-P Fashion luôn mang đến những thiết kế váy đẹp với đủ mọi phong cách, từ sang trọng, quyến rũ đến Hàn Quốc thời thượng, trẻ trung và hơn thế nữa cho tất cả các chị em. Còn đợi gì mà không xem ngay!\r\n\r\n \r\nNhững Kiểu Đầm Đẹp Phù Hợp Mọi Phong Cách.\r\n', 'dam_sang_trong_1.jpg', '2022-04-05'),
(7, 'TUYỆT CHIÊU MẶC ĐẸP AÓ SƠ MI HOA KHIẾN AI CŨNG KHÓ RỜI MẮT', 'TUYỆT CHIÊU MẶC ĐẸP AÓ SƠ MI HOA KHIẾN AI CŨNG KHÓ RỜI MẮT\r\n', 'Aó Sơ mi hoa được xem là một trong những biểu tượng của sự nữ tính, item có mặt trong hầu hết tủ đồ của các nàng, đặc biệt là những cô nàng công sở. Tuy nhiên, để mặc đẹp sơ mi hoa, khiến mình trở nên khác biệt với item quan thuộc này thì bạn đã biết cách chưa? Cùng tham khảo Tips mặc đẹp cùng sơ mi hoa từ lyn nhé!\r\n\r\n\r\nTuyệt chiêu mà bạn có thể áp dụng dễ dàng đó chính là phối áo sơ mi họa tiết cùng quần jean. Công thức này dường như đã quá quen thuộc với các cô nàng nhưng lại không hề nhàm chán, tẻ nhạt, lại càng không bao giờ phải sợ lỗi mốt. Những mẫu sơ mi hoa có thể mix match cùng quần jean thật sự đếm không xuể, phù hợp cho rất nhiều dịp khác nhau: từ áo sơ mi hoa đi biển thoải mái, áo sơ mi nữ công sở lịch sự hay item kinh điển – áo sơ mi nữ trắng, một sự phối hợp mang đến tính thời trang mà ít item nào có thể sánh kịp. Để công thức mix match áo sơ mi hoa cùng quần jean trở nên hoàn hảo hơn, bạn có thể kế hợp cùng một chiếc balo năng động hoặc một đôi sneaker trẻ trung. Quen thuộc nhưng không nhàm chán, bạn hoàn toàn có thể tự tin diện bộ đôi áo sơ mi bông hoa cùng quần jean kinh điển mà không cần đắn đo tính thời trang ', 'ao_so_mi_hoa_di_bien.jpg', '2022-04-01'),
(8, 'BÍ KÍP NÂNG CẤP THỜI TRANG CÔNG SỞ VỚI QUẦN TÂY ÁO SƠ MI KHÔNG THỂ BỎ LỠ', 'BÍ KÍP NÂNG CẤP THỜI TRANG CÔNG SỞ VỚI QUẦN TÂY ÁO SƠ MI KHÔNG THỂ BỎ LỠ\r\n', 'Năm 2020 chứng kiến sự lên ngôi của Classic Blue – Xanh cổ điển. Theo công bố của Viện Màu sắc Pantone, gam màu cổ điển này được chọn là “màu sắc của năm”, Gam màu xanh cổ điển được dự đoán sẽ “bao trùm” các thiết kế thời trang bao gồm các nhóm màu xanh quen thuộc với những sắc thái khác nhau như xanh cobalt, xanh navy hay xanh hoàng gia.\r\nNhững chiếc quần tây áo sơ mi với tông xanh cổ điển không chỉ thời trang, phong cách mà còn mang đến cảm giác thân thiện và đáng tin cậy cho người mặc. Một cảm giá thật phù hợp và tuyệt vời cho môi trường công sở đúng không nào? Ngoài ra, với màu xanh cổ điển còn giúp cho người mặc thon gọn hơn, môt ưu điểm đặc biệt quan trọng mà tất cả các cô nàng đều quan tâm. Vậy nên khi chọn những chiếc quần tây áo sơ mi trong năm nay, nhất định không thể bỏ qua gam màu xanh cổ điển bạn nhé!\r\n', 'ao_mi_coban.jpg', '2022-03-25'),
(9, 'ĐIỂM DANH 10 MẪU QUẦN TÂY NỮ ĐẸP CÔ GÁI NÀO CŨNG NÊN SỞ HỮU', 'ĐIỂM DANH 10 MẪU QUẦN TÂY NỮ ĐẸP CÔ GÁI NÀO CŨNG NÊN SỞ HỮU', 'Thời trang luôn là tuyên ngôn đẳng cấp của hầu hết các cô gái hiện đại. Các mẫu quần tây nữ đẹp không chỉ giúp các bạn tôn dáng bản thân mà còn thể hiện sự tự tin trong mọi tình huống. Từ công sở đến đời thường, mẫu quần tây nữ chưa bao giờ lỗi thời.\r\n\r\nNgày nay, thời trang quần jean tuy vẫn còn hiện hữu và là trào lưu. Nhưng các cô gái luôn tìm kiếm cho mình những quần tây đẹp bởi sự hữu ích của chúng ở nhiều trường hợp khác nhau. Bạn có thể mặc quần tây nữ đi học, đi làm hoặc đi chơi, ăn uống cùng bạn bè. Đơn giản chỉ cần mix-match cùng với áo và giày phù hợp sao cho phù hợp và nổi bật nhất.\r\n\r\nMột số mẫu quần tây LYN muốn giới thiệu đến bạn đọc để có thêm nhiều sự lựa chọn hơn\r\n\r\nQuần tây nữ form baggy - Chuẩn trong mọi trường hợp\r\n\r\nCác mẫu quần tây đẹp không chỉ giúp bạn ghi điểm với người đối diện. Mà còn tạo cảm giác thoải mái khi vận động nhiều do nhu cầu công việc. Mẫu quần baggy thanh lịch này tuy không làm mưa làm gió trên thị trường như những mẫu khác. Nhưng hầu hết chúng đã nằm gọn gàng trong tủ đồ của những quý cô hiện đại.', 'quan_baggy.jpg', '2022-03-20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_anh`
--
ALTER TABLE `tbl_anh`
  ADD PRIMARY KEY (`id_anh`);

--
-- Chỉ mục cho bảng `tbl_bo_suu_tap`
--
ALTER TABLE `tbl_bo_suu_tap`
  ADD PRIMARY KEY (`id_bst`);

--
-- Chỉ mục cho bảng `tbl_chi_tiet_hdb`
--
ALTER TABLE `tbl_chi_tiet_hdb`
  ADD PRIMARY KEY (`id_chi_tiet`);

--
-- Chỉ mục cho bảng `tbl_goi_y_sp`
--
ALTER TABLE `tbl_goi_y_sp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_hdb`
--
ALTER TABLE `tbl_hdb`
  ADD PRIMARY KEY (`id_hdb`);

--
-- Chỉ mục cho bảng `tbl_khach_hang`
--
ALTER TABLE `tbl_khach_hang`
  ADD PRIMARY KEY (`id_khach_hang`);

--
-- Chỉ mục cho bảng `tbl_lien_he`
--
ALTER TABLE `tbl_lien_he`
  ADD PRIMARY KEY (`id_lien_he`);

--
-- Chỉ mục cho bảng `tbl_ncc`
--
ALTER TABLE `tbl_ncc`
  ADD PRIMARY KEY (`id_ncc`);

--
-- Chỉ mục cho bảng `tbl_phan_loai`
--
ALTER TABLE `tbl_phan_loai`
  ADD PRIMARY KEY (`id_phan_loai`);

--
-- Chỉ mục cho bảng `tbl_san_pham`
--
ALTER TABLE `tbl_san_pham`
  ADD PRIMARY KEY (`id_sp`);

--
-- Chỉ mục cho bảng `tbl_tin_tuc`
--
ALTER TABLE `tbl_tin_tuc`
  ADD PRIMARY KEY (`id_tin_tuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_anh`
--
ALTER TABLE `tbl_anh`
  MODIFY `id_anh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_bo_suu_tap`
--
ALTER TABLE `tbl_bo_suu_tap`
  MODIFY `id_bst` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_chi_tiet_hdb`
--
ALTER TABLE `tbl_chi_tiet_hdb`
  MODIFY `id_chi_tiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `tbl_goi_y_sp`
--
ALTER TABLE `tbl_goi_y_sp`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `tbl_hdb`
--
ALTER TABLE `tbl_hdb`
  MODIFY `id_hdb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_khach_hang`
--
ALTER TABLE `tbl_khach_hang`
  MODIFY `id_khach_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_lien_he`
--
ALTER TABLE `tbl_lien_he`
  MODIFY `id_lien_he` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_ncc`
--
ALTER TABLE `tbl_ncc`
  MODIFY `id_ncc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_phan_loai`
--
ALTER TABLE `tbl_phan_loai`
  MODIFY `id_phan_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_san_pham`
--
ALTER TABLE `tbl_san_pham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `tbl_tin_tuc`
--
ALTER TABLE `tbl_tin_tuc`
  MODIFY `id_tin_tuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
