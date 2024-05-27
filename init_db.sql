-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 24, 2024 lúc 03:57 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kiem_tra_truc_tuyen_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_admin` varchar(255) NOT NULL,
  `ten_admin` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bai_thi`
--

CREATE TABLE `bai_thi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_bai_thi` varchar(255) NOT NULL,
  `ten_bai_thi` varchar(255) NOT NULL,
  `thoi_gian_bat_dau` datetime DEFAULT NULL,
  `thoi_gian_ket_thuc` datetime DEFAULT NULL,
  `mo_ta` varchar(255) DEFAULT NULL,
  `danh_sach_cau_hoi` longtext DEFAULT NULL,
  `ma_nguoi_tao` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bai_thi`
--

INSERT INTO `bai_thi` (`id`, `ma_bai_thi`, `ten_bai_thi`, `thoi_gian_bat_dau`, `thoi_gian_ket_thuc`, `mo_ta`, `danh_sach_cau_hoi`, `ma_nguoi_tao`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BT_CSDL', 'Bài thi Cơ sở dữ liệu', '2024-05-02 23:21:00', '2024-05-10 14:21:00', 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', '[{\"cau_hoi\":\"Trong cơ sở dữ liệu, khái niệm nào dùng để mô tả thông tin về một thực thể cụ thể, như tên, tuổi, địa chỉ, vv.?\",\"cau_tra_loi\":[\"Khóa chính\",\"Thuộc tính\",\"Bảng\",\"Ràng buộc\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Trong cơ sở dữ liệu quan hệ, khóa nào được sử dụng để duy nhất định danh một hàng trong bảng\",\"cau_tra_loi\":[\"Khóa chính\",\"Khóa ngoại\",\"Khóa thay thế\",\"Khóa ứng dụng\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Trong mô hình ER (Entity-Relationship), mối quan hệ \\\"Một-đến-Nhiều\\\" được biểu diễn bằng cách nào?\",\"cau_tra_loi\":[\"Hình tam giác\",\"Hình chữ nhật\",\"Hình oval\",\"Hình tròn\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Trong SQL, câu lệnh nào dùng để thêm một hàng vào bảng?\",\"cau_tra_loi\":[\"INSERT INTO\",\"ADD ROW\",\"CREATE ROW\",\"UPDATE ROW\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Trong cơ sở dữ liệu, ràng buộc UNIQUE được sử dụng để làm gì?\",\"cau_tra_loi\":[\"Đảm bảo không có giá trị trùng lặp trong một cột\",\"Xác định mối quan hệ giữa các bảng\",\"Xác định khóa ngoại\",\"Xác định kiểu dữ liệu cho một cột\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Trong SQL, câu lệnh nào dùng để xóa một bảng?\",\"cau_tra_loi\":[\"DELETE TABLE\",\"REMOVE TABLE\",\"DROP TABLE\",\"ERASE TABLE\"],\"dap_an_dung\":[1]},{\"cau_hoi\":\"adaaddad\",\"cau_tra_loi\":[\"adada\",\"dada\",\"dâd\",\"ada\"],\"dap_an_dung\":[0,1]},{\"cau_hoi\":\"adadadada\",\"cau_tra_loi\":[\"dâdadad\",\"adadadada\",\"dâdadada\",\"dâdadad\"],\"dap_an_dung\":[1]}]', NULL, '2024-03-28 06:23:12', '2024-05-17 05:33:44', NULL),
(3, 'BT_JV', 'Lập trình Java', '2024-04-07 11:21:00', '2024-04-08 11:22:00', NULL, NULL, NULL, '2024-04-06 01:01:10', '2024-04-20 23:31:21', '2024-04-20 23:31:21'),
(4, 'BT_LN', 'Bài thi Linux', '2024-05-02 13:31:00', '2024-05-31 14:38:00', 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', '[{\"cau_hoi\":\"Làm thế nào để viết một bash script có thể chạy (executable) trên Linux?\",\"cau_tra_loi\":[\"Thêm dòng #!/bin/bash ở đầu script và cấp quyền thực thi cho script.\",\"Sử dụng extension .exe cho file script.\",\"Đổi tên file script thành script.run.\",\"Không cần làm gì, bash script sẽ tự chạy.\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Làm thế nào để lấy tham số được truyền vào trong một bash script?\",\"cau_tra_loi\":[\"Sử dụng argv trong bash.\",\"Sử dụng $1, $2, $3,... để truy cập các tham số.\",\"Sử dụng params để lấy tất cả tham số.\",\"Sử dụng input() để nhận tham số.\"],\"dap_an_dung\":[1]},{\"cau_hoi\":\"Lệnh nào được sử dụng để chạy một chương trình hoặc script trong nền (background)?\",\"cau_tra_loi\":[\"run\",\"start\",\"bg\",\"&\"],\"dap_an_dung\":[3]},{\"cau_hoi\":\"Làm thế nào để lặp qua danh sách các file trong một thư mục trong bash script?\",\"cau_tra_loi\":[\"Sử dụng for file in * và do...done.\",\"Sử dụng while loop.\",\"Sử dụng list_files() function.\",\"Sử dụng foreach loop.\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Làm thế nào để chạy một lệnh với quyền root (superuser) trong bash script?\",\"cau_tra_loi\":[\"Sử dụng sudo trước lệnh cần chạy.\",\"Sử dụng runas root trong script.\",\"Sử dụng su -c trước lệnh.\",\"Sử dụng root keyword.\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Để xóa một biến môi trường (environment variable) trong Linux, bạn sử dụng lệnh nào sau đây?\",\"cau_tra_loi\":[\"rmvar\",\"unset\",\"deleteenv\",\"removevar\"],\"dap_an_dung\":[1]},{\"cau_hoi\":\"Làm thế nào để kiểm tra xem một file có tồn tại trong bash script?\",\"cau_tra_loi\":[\"Sử dụng file_exists() function.\",\"Sử dụng if [ -f \\\"$file\\\" ].\",\"Sử dụng check -file command.\",\"Sử dụng file -check option.\"],\"dap_an_dung\":[1]},{\"cau_hoi\":\"Làm thế nào để kiểm tra một thư mục có tồn tại trong bash script?\",\"cau_tra_loi\":[\"Sử dụng if [ -d \\\"$directory\\\" ].\",\"Sử dụng check -directory command.\",\"Sử dụng exists() function.\",\"Sử dụng if [ -folder \\\"$directory\\\" ].\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Làm thế nào để tạo một biến môi trường (environment variable) trong bash script?\",\"cau_tra_loi\":[\"Sử dụng setenv.\",\"Sử dụng export.\",\"Sử dụng define.\",\"Sử dụng newvar.\"],\"dap_an_dung\":[1]},{\"cau_hoi\":\"Làm thế nào để kiểm tra xem một lệnh đã thành công hay không trong bash script?\",\"cau_tra_loi\":[\"Sử dụng check_success.\",\"Sử dụng if [ $? -eq 0 ].\",\"Sử dụng success_check.\",\"Sử dụng if [ exit_code -eq 0 ].\"],\"dap_an_dung\":[1]}]', NULL, '2024-04-20 23:31:48', '2024-05-13 00:34:41', NULL),
(5, 'adadd', 'adadad', '2024-04-24 19:26:00', '2024-05-03 19:26:00', NULL, NULL, NULL, '2024-04-23 05:26:36', '2024-05-01 06:33:36', '2024-05-01 06:33:36'),
(6, 'aaa', 'aaa', '2024-05-03 19:48:00', '2024-05-18 19:48:00', NULL, NULL, NULL, '2024-04-23 05:48:20', '2024-05-01 06:33:38', '2024-05-01 06:33:38'),
(7, 'aaaaa', 'aaaaaaaaaa', '2024-04-25 19:50:00', '2024-05-11 19:50:00', NULL, NULL, NULL, '2024-04-23 05:50:31', '2024-04-23 06:08:50', '2024-04-23 06:08:50'),
(8, 'qqq', 'qqqqqq', '2024-04-26 19:52:00', '2024-05-09 19:52:00', NULL, NULL, '207CT123456', '2024-04-23 05:52:50', '2024-04-23 06:08:47', '2024-04-23 06:08:47'),
(9, 'e', 'ee', '2024-05-02 20:02:00', '2024-05-11 20:02:00', NULL, NULL, '207CT123456', '2024-04-23 06:02:10', '2024-05-01 06:33:40', '2024-05-01 06:33:40'),
(10, 'BT_CSLT', 'Bài thi Cơ sở lập trình', '2024-05-01 20:34:00', '2024-05-10 20:34:00', 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', '[{\"cau_hoi\":\"dadadad\",\"cau_tra_loi\":[\"adad\",\"adad\",\"adadad\",\"adadad\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"dadad\",\"cau_tra_loi\":[\"adad\",\"adad\",\"adada\",\"dad\"],\"dap_an_dung\":[0]}]', NULL, '2024-05-01 06:34:29', '2024-05-04 23:22:27', NULL),
(11, 'adada', 'dâdad', '2024-05-06 13:16:00', '2024-05-08 13:16:00', NULL, NULL, '207CT123456', '2024-05-04 23:16:27', '2024-05-04 23:22:42', '2024-05-04 23:22:42'),
(12, 'aaaaaaa', 'aaaaaaa', '2024-05-17 15:25:00', '2024-05-24 15:25:00', NULL, NULL, NULL, '2024-05-17 01:26:01', '2024-05-17 01:26:05', '2024-05-17 01:26:05'),
(13, 'd123d', 'adadadadd', '2024-05-20 12:40:00', '2024-05-23 12:40:00', NULL, '[{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u, kh\\u00e1i ni\\u1ec7m n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 m\\u00f4 t\\u1ea3 th\\u00f4ng tin v\\u1ec1 m\\u1ed9t th\\u1ef1c th\\u1ec3 c\\u1ee5 th\\u1ec3, nh\\u01b0 t\\u00ean, tu\\u1ed5i, \\u0111\\u1ecba ch\\u1ec9, vv.?\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Thu\\u1ed9c t\\u00ednh\",\"B\\u1ea3ng\",\"R\\u00e0ng bu\\u1ed9c\"],\"dap_an_dung\":[1]},{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u quan h\\u1ec7, kh\\u00f3a n\\u00e0o \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 duy nh\\u1ea5t \\u0111\\u1ecbnh danh m\\u1ed9t h\\u00e0ng trong b\\u1ea3ng\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Kh\\u00f3a ngo\\u1ea1i\",\"Kh\\u00f3a thay th\\u1ebf\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"M\\u1ed9t c\\u00e2u h\\u1ecfi kh\\u00e1c v\\u1edbi ch\\u1ec9 2 c\\u00e2u tr\\u1ea3 l\\u1eddi\",\"cau_tra_loi\":[\"\\u0110\\u00e1p \\u00e1n 1\",\"\\u0110\\u00e1p \\u00e1n 2\"],\"dap_an_dung\":[0,1]}]', '207CT123456', '2024-05-19 22:40:46', '2024-05-23 22:41:39', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giang_vien`
--

CREATE TABLE `giang_vien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_giang_vien` varchar(255) NOT NULL,
  `ten_giang_vien` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `ma_khoa` varchar(255) NOT NULL,
  `ma_nganh` varchar(255) DEFAULT NULL,
  `cac_mon_giang_day` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giang_vien`
--

INSERT INTO `giang_vien` (`id`, `ma_giang_vien`, `ten_giang_vien`, `so_dien_thoai`, `email`, `ngay_sinh`, `ma_khoa`, `ma_nganh`, `cac_mon_giang_day`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'q', 'q', 'q', 'q', '2002-03-04', 'CNTT', 'CNTT452', '[{\"thu_tu\":1,\"ma_mon\":\"CSLT1\"},{\"thu_tu\":2,\"ma_mon\":\"CSDL\"}]', NULL, '2024-03-24 23:40:25', '2024-03-24 23:40:25'),
(2, 'a', 'a', 'a', 'a', '2013-05-26', 'a', 'a', NULL, '2024-03-20 00:55:50', '2024-03-20 01:17:54', '2024-03-20 01:17:54'),
(3, '2304526', 'Pham Duy dd', '05540265489', 'duy@gmail.com', '2014-02-05', 'CNTT', 'CNTT15', '[{\"thu_tu\":1,\"ma_mon\":\"CSLT1\"},{\"thu_tu\":2,\"ma_mon\":\"CSLT1\"}]', '2024-03-20 03:23:34', '2024-05-04 22:50:48', '2024-05-04 22:50:48'),
(4, '2304526', 'Pham Duy', '055402654898', 'duy@gmail.com', '2014-02-05', 'CNTT', 'CNTT15', '[{\"thu_tu\":1,\"ma_mon\":\"LTPY\"},{\"thu_tu\":2,\"ma_mon\":\"LTJS\"},{\"thu_tu\":3,\"ma_mon\":\"CSDL\"}]', '2024-03-23 00:43:49', '2024-05-04 22:50:51', '2024-05-04 22:50:51'),
(5, '2304526', 'Pham Duy', 'a', 'duy@gmail.com', '2014-02-05', 'MI', 'CNTT1', NULL, '2024-03-23 00:48:11', '2024-05-04 22:50:53', '2024-05-04 22:50:53'),
(6, '2304526', 'a', '055402654898', 'duy@gmail.com', '2002-07-17', 'CNTT', 'CNTT15', NULL, '2024-03-23 00:55:13', '2024-05-04 22:50:57', '2024-05-04 22:50:57'),
(7, '2304526', 'Pham Duy', '0554026548', 'duy@gmail.com', '2014-02-05', 'DL', 'CNPM', NULL, '2024-03-23 00:55:54', '2024-05-04 22:51:00', '2024-05-04 22:51:00'),
(8, '123456', 'Pham Duy hehe', '111111111111111111', 'duy3@gmail.com', '2013-05-26', 'CNTT', NULL, NULL, '2024-03-24 23:03:04', '2024-05-04 22:51:02', '2024-05-04 22:51:02'),
(9, '1234566', 'Pham Duy hehet', '12345678979', 'duy07@gmail.com', '2013-05-26', 'CNTT', 'CNPM', NULL, '2024-03-24 23:04:55', '2024-05-04 22:51:04', '2024-05-04 22:51:04'),
(10, '1234569', 'Pham Duyq', '774415', 'duy01@gmail.com', '2014-02-05', 'CNTT', NULL, 'null', '2024-03-24 23:08:09', '2024-05-04 22:51:06', '2024-05-04 22:51:06'),
(11, '78221', 'Pham Duye', '99999999', 'duy36@gmail.com', '2014-02-05', 'CNTT', NULL, 'null', '2024-03-24 23:13:35', '2024-05-04 22:51:09', '2024-05-04 22:51:09'),
(12, '!@@#$$', 'Pham Duyv', '45894665486', 'duy000@gmail.com', '2013-05-26', 'CNTT', NULL, NULL, '2024-03-24 23:30:43', '2024-04-21 22:31:02', '2024-04-21 22:31:02'),
(13, 'a', 'a', '0833299959', 'duy6@gmail.com', '2014-02-05', 'CNTT', NULL, NULL, '2024-03-24 23:40:43', '2024-03-24 23:55:25', '2024-03-24 23:55:25'),
(14, 'q', 'q', 'q', 'q', '2014-02-05', 'CNTT', NULL, NULL, '2024-03-24 23:41:46', '2024-03-24 23:51:48', '2024-03-24 23:51:48'),
(15, 's', 's', 's', 's', '2014-02-05', 'CNTT', NULL, NULL, '2024-03-24 23:48:00', '2024-04-21 22:31:05', '2024-04-21 22:31:05'),
(16, 'ư', 'ư', 'ww', 'ư', '2014-02-05', 'CNTT', NULL, 'null', '2024-03-24 23:51:04', '2024-04-21 22:31:08', '2024-04-21 22:31:08'),
(17, 'q', 'q', 'q', 'q', '2014-02-05', 'CNTT', NULL, NULL, '2024-03-24 23:51:55', '2024-04-21 22:31:13', '2024-04-21 22:31:13'),
(18, 'a', 'a', 'a', 'a', '2014-02-05', 'CNTT', NULL, NULL, '2024-03-24 23:55:30', '2024-04-21 22:32:17', '2024-04-21 22:32:17'),
(19, '207CT68618', 'Pham Duy', '0445789641', 'duy99@gmail.com', '2013-05-26', 'CNTT', NULL, NULL, '2024-03-25 00:28:22', '2024-04-21 22:32:19', '2024-04-21 22:32:19'),
(20, '12345', 'sdasdadad', '01234567891', 'duy111@gmail.com', '2014-02-05', 'CNTT', 'CNPM', NULL, '2024-04-18 02:49:58', '2024-04-21 22:32:23', '2024-04-21 22:32:23'),
(21, '207CT123456', 'Nguyễn Văn A', '05540265499', 'vanA@gmail.com', '1997-01-15', 'CNTT', 'CNPM', '[{\"thu_tu\":1,\"ma_mon\":\"CSDL\"}]', '2024-04-21 22:35:37', '2024-05-04 22:51:17', NULL),
(22, '23045267', 'a', '11111111111', 'a@gmail.com', '2024-04-16', 'CNTT', 'CNPM', NULL, '2024-04-21 22:36:17', '2024-05-04 22:51:12', '2024-05-04 22:51:12'),
(23, '207GV1111', 'Trần Văn B', '01234525688', 'vanB@vanlanguni.edu.vn', '1992-02-05', 'CNTT', 'CNPM', '[{\"thu_tu\":1,\"ma_mon\":\"CSLT1\"},{\"thu_tu\":2,\"ma_mon\":\"CSDL\"}]', '2024-05-04 22:53:22', '2024-05-17 01:22:53', NULL),
(24, '201CT123456', 'Nguyễn Văn d', '01234525879', 'nguyenvanB@vanlangui.vn', '1988-06-15', 'CNTT', 'CNPM', NULL, '2024-05-17 01:22:23', '2024-05-17 01:22:46', '2024-05-17 01:22:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ket_qua`
--

CREATE TABLE `ket_qua` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_bai_thi` varchar(255) NOT NULL,
  `ten_bai_thi` varchar(255) NOT NULL,
  `ma_sinh_vien` varchar(255) NOT NULL,
  `diem` double(8,2) NOT NULL,
  `so_cau_tra_loi_dung` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ket_qua`
--

INSERT INTO `ket_qua` (`id`, `ma_bai_thi`, `ten_bai_thi`, `ma_sinh_vien`, `diem`, `so_cau_tra_loi_dung`, `created_at`, `updated_at`, `deleted_at`) VALUES
(32, 'BT_LN', 'Bài thi Linux', '207CT68611', 4.00, 4, '2024-05-13 00:43:43', '2024-05-13 00:43:43', NULL),
(33, 'BT_LN', 'Bài thi Linux', '207CT68611', 4.00, 4, '2024-05-15 01:55:10', '2024-05-15 01:55:10', NULL),
(34, 'BT_LN', 'Bài thi Linux', '207CT68618', 0.00, 0, '2024-05-16 23:25:04', '2024-05-16 23:25:04', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_khoa` varchar(255) NOT NULL,
  `ten_khoa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`id`, `ma_khoa`, `ten_khoa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CNTT', 'Công nghệ thông tin', NULL, NULL, NULL),
(2, 'MI', 'MINH', NULL, '2024-03-27 22:09:55', '2024-03-27 22:09:55'),
(3, 'CNTT2', 'Minh dep trai', '2024-03-23 00:51:22', '2024-03-27 22:09:58', '2024-03-27 22:09:58'),
(4, 'MK', 'Marketing', '2024-03-27 22:10:14', '2024-03-27 22:10:14', NULL),
(5, 'DL', 'Du lịch', '2024-03-27 22:11:31', '2024-03-27 22:11:31', NULL),
(6, 'adadda', 'ddadadd', '2024-05-17 01:50:19', '2024-05-17 01:50:30', '2024-05-17 01:50:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_hoc_phan`
--

CREATE TABLE `lop_hoc_phan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_lop_hoc_phan` varchar(255) NOT NULL,
  `ten_lop_hoc_phan` varchar(255) NOT NULL,
  `ma_mon_hoc` varchar(255) NOT NULL,
  `thoi_gian_bat_dau` datetime NOT NULL,
  `thoi_gian_ket_thuc` datetime NOT NULL,
  `danh_sach_sinh_vien` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `danh_sach_giang_vien` longtext DEFAULT NULL,
  `danh_sach_bai_thi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop_hoc_phan`
--

INSERT INTO `lop_hoc_phan` (`id`, `ma_lop_hoc_phan`, `ten_lop_hoc_phan`, `ma_mon_hoc`, `thoi_gian_bat_dau`, `thoi_gian_ket_thuc`, `danh_sach_sinh_vien`, `danh_sach_giang_vien`, `danh_sach_bai_thi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, '265LTLN11111', 'Lập trình Linux cơ bản', 'LN', '2024-05-04 12:56:00', '2024-05-24 12:56:00', '[{\"ma_sinh_vien\":\"207CT68618\"},{\"ma_sinh_vien\":\"207CT68641\"},{\"ma_sinh_vien\":\"207CT67641\"},{\"ma_sinh_vien\":\"207CT68611\"},{\"ma_sinh_vien\":\"207CT54641\"}]', '[{\"ma_giang_vien\":\"207GV1111\"},{\"ma_giang_vien\":\"207CT123456\"}]', '[{\"ma_bai_thi\":\"BT_LN\"}]', '2024-05-04 22:56:51', '2024-05-17 05:32:50', NULL),
(6, 'adad', 'adadad', 'CSLT1', '2024-05-08 13:28:00', '2024-05-23 13:28:00', '[{\"ma_sinh_vien\":\"207CT68611\"}]', '[{\"ma_giang_vien\":\"207CT123456\"}]', '[{\"ma_bai_thi\":\"BT_CSDL\"}]', '2024-05-04 23:28:13', '2024-05-04 23:31:31', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_mon_hoc` varchar(255) NOT NULL,
  `ten_mon_hoc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mon_hoc`
--

INSERT INTO `mon_hoc` (`id`, `ma_mon_hoc`, `ten_mon_hoc`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CSLT1', 'Cơ sở lập trình', '2024-03-21 21:01:47', '2024-05-04 22:54:39', NULL),
(2, 'CSDL', 'Cơ sở dữ liệu', '2024-03-21 21:08:52', '2024-03-21 21:08:52', NULL),
(3, 'LTPY', 'Lập trình python cơ bản', NULL, NULL, NULL),
(4, 'LTJS', 'Lập trình javascript cơ bản', NULL, NULL, NULL),
(5, 'LTWCB', 'Lập trình web cơ bản', '2024-03-27 21:49:01', '2024-03-27 21:49:01', NULL),
(6, 'LN', 'Lập trình Linux', '2024-04-05 22:34:26', '2024-04-05 22:34:26', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganh`
--

CREATE TABLE `nganh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_nganh` varchar(255) NOT NULL,
  `ten_nganh` varchar(255) NOT NULL,
  `ma_khoa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nganh`
--

INSERT INTO `nganh` (`id`, `ma_nganh`, `ten_nganh`, `ma_khoa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CNTT151', 'Công nghệ phần mềm', 'CNTT', '2024-03-21 21:26:51', '2024-03-21 21:34:40', '2024-03-21 21:34:40'),
(2, 'CNTT1', 'Trí tuệ nhân tạo AI', 'CNTT', '2024-03-21 21:33:59', '2024-03-27 22:18:55', '2024-03-27 22:18:55'),
(3, 'CNPM', 'Công nghệ phần mềm', 'CNTT', '2024-03-27 22:18:32', '2024-03-27 22:18:32', NULL),
(4, 'CNDL', 'Công nghệ dữ liệu', 'CNTT', '2024-05-04 22:53:53', '2024-05-04 22:53:53', NULL),
(5, 'TTNT', 'Trí tuệ nhân tạo AI', 'CNTT', '2024-05-04 22:54:20', '2024-05-04 22:54:20', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `mat_khau` varchar(255) DEFAULT NULL,
  `session_id` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `ho_ten`, `email`, `role`, `mat_khau`, `session_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'Admina', 'admin@gmail.com', 'Admin', '$2y$12$/rtZ6hg60b2MwX5gGGOmVeGYM5AfK2VN0nB3nNDzf02WqZ7l1pyNy', NULL, '2024-04-18 03:08:42', '2024-05-17 00:34:55', NULL),
(9, 'Phạm Lê Minh Duy', 'duy00007@gmail.com', 'Sinh viên', '$2y$12$J0KLzufSH2TgUO9kLWpU1.xOcL55OK5eG2HTZkgOVNDuKYdkabtkG', NULL, '2024-04-18 03:09:07', '2024-04-18 03:09:07', NULL),
(10, 'Nguyễn Văn A', 'vanA@gmail.com', 'Giảng viên', '$2y$12$B4nCEnTKEgUJ7HQdxM0IsOWusA3h6TXvWVkwf7JCUWv6qJLJpdhCm', NULL, '2024-04-18 03:09:33', '2024-04-18 03:09:33', NULL),
(11, 'Phạm Lê Minh Duy', 'minhduy00007@gmail.com', 'Sinh viên', '$2y$12$4irvX6Ly9s6/lAjFvS7okucM3Ylz0bVs4KV7jpAFZkEPSImUpVD5C', NULL, '2024-04-18 05:34:01', '2024-04-18 05:34:01', NULL),
(12, 'Trần Công Minh', 'minh@gmail.com', 'Sinh viên', '$2y$12$duNIpBfR4Tb1Igjk5F8j6ukqmzBRcNnGos.5eXvnQ/vCJcgqB/NKW', NULL, '2024-04-21 22:39:36', '2024-04-21 22:39:36', NULL),
(13, 'Hoàng Vĩnh Tiến', 'tien@gmail.com', 'Sinh viên', '$2y$12$vkY7InV0/S3Rh1dgG6WsUOaTDLVmsC4Su3MztyubFF8jh2Gohbm0K', NULL, '2024-04-21 22:39:53', '2024-04-21 22:39:53', NULL),
(14, 'Nguyễn Minh Huy', 'huy@gmail.com', 'Sinh viên', '$2y$12$nauzYp/itex88XvSUl75Du/jRxIrijy6N6FdbQm7BDEb0Lk0nIKIy', NULL, '2024-04-21 22:40:15', '2024-04-21 22:40:15', NULL),
(15, 'Bùi Tuần Kiệt', 'kiet@gmail.com', 'Sinh viên', '$2y$12$zO1yfe.Bj73nmGMqp9We1eM6RhDJpYk9YaHi8wuoysd51qCN.lNAe', NULL, '2024-04-21 22:40:40', '2024-05-17 00:43:48', '2024-05-17 00:43:48'),
(16, 'Trần Đỗ Đăng Khoa', 'khoa@gmail.com', 'Sinh viên', '$2y$12$Meco5bH/sshgr9ctEepMRuEhPEQuUtYmg.aUAfsgixpjDio3XoyNK', NULL, '2024-04-21 22:41:19', '2024-05-17 01:12:51', '2024-05-17 01:12:51'),
(17, 'Trâng Quang Thạch', 'thach@gmail.com', 'Sinh viên', '$2y$12$5CXWCE5XJ6gLwWO9MlFNhO72cwNcUQJvIwOE0OG/K91JwUWnTsst2', NULL, '2024-04-21 22:42:04', '2024-04-21 22:42:04', NULL),
(18, 'Phạm Văn Quý', 'quy@gmail.com', 'Sinh viên', '$2y$12$1SvcSj/rkilkXioAzm2.xOAzrbi25lui1HmjINZ8zy2gqEpQydi8O', NULL, '2024-04-21 22:42:32', '2024-05-17 01:12:16', '2024-05-17 01:12:16'),
(19, 'Phạm Lê Minh Duy', 'duy.207CT68618@vanlanguni.vn', 'Sinh viên', NULL, NULL, '2024-05-01 01:03:00', '2024-05-19 23:13:30', NULL),
(20, 'Trần Văn B', 'vanB@vanlanguni.vn', 'Giảng viên', '$2y$12$D3OqIWOt/xfJN8Lil3y5zOk3T/5w8Tn8pwukkOfl3r.ox7ePMIlpW', NULL, '2024-05-04 22:55:27', '2024-05-04 22:55:27', NULL),
(21, 'AdminHai', 'admin2@vanlanguni.vn', 'Admin', '$2y$12$eiNjRPzcf9.7XhjzPje2SOkJfJUpIhoLZ2lixSNkoMQRaUuIYK.GG', NULL, '2024-05-17 00:22:23', '2024-05-17 00:22:23', NULL),
(22, 'aaaa', 'a@gmail.com', 'Giảng viên', '$2y$12$ooX9ZBpgXDO7Q/N2R4.Kyu4fde4QIvknoYkw29vw09bIlH11EbZI6', NULL, '2024-05-17 01:15:49', '2024-05-17 01:17:21', '2024-05-17 01:17:21'),
(23, 'Phạm Minh Duy', 'duy.207CT68617@vanlanguni.vn', 'Sinh viên', NULL, NULL, '2024-05-17 01:19:19', '2024-05-17 01:19:19', NULL),
(24, '207CT68653 - Trần Công Minh - K26T-IT19', 'minh.207ct68653@vanlanguni.vn', 'Chưa phân quyền', NULL, NULL, '2024-05-18 03:20:52', '2024-05-18 03:20:52', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinh_vien`
--

CREATE TABLE `sinh_vien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_sinh_vien` varchar(255) NOT NULL,
  `ten_sinh_vien` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `ma_khoa` varchar(255) NOT NULL,
  `ma_nganh` varchar(255) NOT NULL,
  `bai_thi` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinh_vien`
--

INSERT INTO `sinh_vien` (`id`, `ma_sinh_vien`, `ten_sinh_vien`, `so_dien_thoai`, `email`, `ngay_sinh`, `ma_khoa`, `ma_nganh`, `bai_thi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '207CT68618', 'Phạm Lê Minh Duy2', '0833299959', 'duy123@gmail.com', '2002-07-17', 'MI', 'CNTT15', NULL, '2024-03-20 21:25:34', '2024-03-27 21:03:19', '2024-03-27 21:03:19'),
(2, '207CT68617', 'Phạm Lê Minh Duy2', '055402654898', 'duy@gmail.com', '2014-02-05', 'CNTT', 'CNTT1', NULL, '2024-03-24 22:27:14', '2024-03-27 21:03:17', '2024-03-27 21:03:17'),
(3, '207CT68618', 'Phạm Lê Minh Duy', '055402654898', 'duy.207CT68618@vanlanguni.vn', '2013-05-26', 'CNTT', 'CNTT1', NULL, '2024-03-24 22:32:53', '2024-03-27 21:03:15', '2024-03-27 21:03:15'),
(4, '207CT11248', 'Duy', '01542354215', 'duy6@gmail.com', '2014-02-05', 'CNTT', 'CNTT1', NULL, '2024-03-27 21:01:56', '2024-03-27 21:03:13', '2024-03-27 21:03:13'),
(5, '207CT68618', 'Hoàng Vĩnh Huy', '0833299959', 'duy@gmail.com', '2002-07-17', 'CNTT', 'CNPM', NULL, '2024-03-27 21:05:12', '2024-05-04 22:57:18', '2024-05-04 22:57:18'),
(6, '207CT68618', 'Phạm Lê Minh Duy', '0833299958', 'duy.207CT68618@vanlanguni.vn', '2014-02-05', 'CNTT', 'CNPM', '[{\"ma_bai_thi\":\"BT_LN\",\"ma_lop_hoc_phan\":\"265LTLN11111\"}]', '2024-03-27 21:11:07', '2024-05-16 23:25:04', NULL),
(7, '207CT68641', 'Phạm Lê Minh Huy', '0833295626', 'duyxau@gmail.com', '2014-02-05', 'CNTT', 'CNPM', NULL, '2024-03-30 01:53:07', '2024-03-30 01:53:07', NULL),
(8, '207CT67641', 'Trần Công Minh', '0833274159', 'duy123dan@gmail.com', '2002-07-17', 'CNTT', 'CNPM', NULL, '2024-03-30 01:53:33', '2024-03-30 01:55:21', NULL),
(9, '207CT54641', 'Phạm Lê Minh Dj', '0833234959', 'duydit3@gmail.com', '2002-07-17', 'CNTT', 'CNPM', NULL, '2024-03-30 01:54:08', '2024-03-30 01:54:08', NULL),
(10, '207CT68611', 'Phạm Lê Minh Duy', '0833299951', 'minhduy00007@gmail.com', '2024-04-08', 'CNTT', 'CNPM', '[{\"ma_bai_thi\":\"BT_LN\",\"ma_lop_hoc_phan\":\"265LTLN11111\"}]', '2024-04-18 05:50:08', '2024-05-15 01:55:10', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bai_thi`
--
ALTER TABLE `bai_thi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ket_qua`
--
ALTER TABLE `ket_qua`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lop_hoc_phan`
--
ALTER TABLE `lop_hoc_phan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nganh`
--
ALTER TABLE `nganh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bai_thi`
--
ALTER TABLE `bai_thi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `giang_vien`
--
ALTER TABLE `giang_vien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `ket_qua`
--
ALTER TABLE `ket_qua`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lop_hoc_phan`
--
ALTER TABLE `lop_hoc_phan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nganh`
--
ALTER TABLE `nganh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
