-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 22, 2024 lúc 08:26 AM
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
  `ma_lop_hoc_phan` varchar(255) DEFAULT NULL,
  `ma_bai_thi` varchar(255) NOT NULL,
  `ten_bai_thi` varchar(255) NOT NULL,
  `mon_hoc` varchar(255) NOT NULL,
  `thoi_gian_bat_dau` datetime DEFAULT NULL,
  `thoi_gian_ket_thuc` datetime DEFAULT NULL,
  `lan_thi` int(11) NOT NULL,
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

INSERT INTO `bai_thi` (`id`, `ma_lop_hoc_phan`, `ma_bai_thi`, `ten_bai_thi`, `mon_hoc`, `thoi_gian_bat_dau`, `thoi_gian_ket_thuc`, `lan_thi`, `mo_ta`, `danh_sach_cau_hoi`, `ma_nguoi_tao`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'LHP_CSDL', 'BT_CSDL', 'Bài thi Cơ sở dữ liệu', 'CSDL', '2024-06-14 23:21:00', '2024-06-24 14:21:00', 1, NULL, '[{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u, kh\\u00e1i ni\\u1ec7m n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 m\\u00f4 t\\u1ea3 th\\u00f4ng tin v\\u1ec1 m\\u1ed9t th\\u1ef1c th\\u1ec3 c\\u1ee5 th\\u1ec3, nh\\u01b0 t\\u00ean, tu\\u1ed5i, \\u0111\\u1ecba ch\\u1ec9, vv.?\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Thu\\u1ed9c t\\u00ednh\",\"B\\u1ea3ng\",\"R\\u00e0ng bu\\u1ed9c\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u quan h\\u1ec7, kh\\u00f3a n\\u00e0o \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 duy nh\\u1ea5t \\u0111\\u1ecbnh danh m\\u1ed9t h\\u00e0ng trong b\\u1ea3ng\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Kh\\u00f3a ngo\\u1ea1i\",\"Kh\\u00f3a thay th\\u1ebf\",\"Kh\\u00f3a \\u1ee9ng d\\u1ee5ng\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Trong m\\u00f4 h\\u00ecnh ER (Entity-Relationship), m\\u1ed1i quan h\\u1ec7 \\\"M\\u1ed9t-\\u0111\\u1ebfn-Nhi\\u1ec1u\\\" \\u0111\\u01b0\\u1ee3c bi\\u1ec3u di\\u1ec5n b\\u1eb1ng c\\u00e1ch n\\u00e0o?\",\"cau_tra_loi\":[\"H\\u00ecnh tam gi\\u00e1c\",\"H\\u00ecnh ch\\u1eef nh\\u1eadt\",\"H\\u00ecnh oval\",\"H\\u00ecnh tr\\u00f2n\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Trong SQL, c\\u00e2u l\\u1ec7nh n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 th\\u00eam m\\u1ed9t h\\u00e0ng v\\u00e0o b\\u1ea3ng?\",\"cau_tra_loi\":[\"INSERT INTO\",\"ADD ROW\",\"CREATE ROW\",\"UPDATE ROW\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u, r\\u00e0ng bu\\u1ed9c UNIQUE \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 l\\u00e0m g\\u00ec?\",\"cau_tra_loi\":[\"\\u0110\\u1ea3m b\\u1ea3o kh\\u00f4ng c\\u00f3 gi\\u00e1 tr\\u1ecb tr\\u00f9ng l\\u1eb7p trong m\\u1ed9t c\\u1ed9t\",\"X\\u00e1c \\u0111\\u1ecbnh m\\u1ed1i quan h\\u1ec7 gi\\u1eefa c\\u00e1c b\\u1ea3ng\",\"X\\u00e1c \\u0111\\u1ecbnh kh\\u00f3a ngo\\u1ea1i\",\"X\\u00e1c \\u0111\\u1ecbnh ki\\u1ec3u d\\u1eef li\\u1ec7u cho m\\u1ed9t c\\u1ed9t\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"Trong SQL, c\\u00e2u l\\u1ec7nh n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 x\\u00f3a m\\u1ed9t b\\u1ea3ng?\",\"cau_tra_loi\":[\"DELETE TABLE\",\"REMOVE TABLE\",\"DROP TABLE\",\"ERASE TABLE\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"adaaddad\",\"cau_tra_loi\":[\"adada\",\"dada\",\"d\\u00e2d\",\"ada\"],\"dap_an_dung\":[0,1]},{\"cau_hoi\":\"adadadada\",\"cau_tra_loi\":[\"d\\u00e2dadad\",\"adadadada\",\"d\\u00e2dadada\",\"d\\u00e2dadad\"],\"dap_an_dung\":[1]},{\"cau_hoi\":\"adadadad\",\"cau_tra_loi\":[\"adadada\",\"dadad\",\"adada\",\"adadadadada\"],\"dap_an_dung\":[3]}]', NULL, '2024-03-28 06:23:12', '2024-06-21 23:22:41', NULL),
(3, NULL, 'BT_JV', 'Lập trình Java', '', '2024-04-07 11:21:00', '2024-04-08 11:22:00', 0, NULL, NULL, NULL, '2024-04-06 01:01:10', '2024-04-20 23:31:21', '2024-04-20 23:31:21'),
(4, '111LTLN111', 'BT_LN', 'Bài thi Linux', 'LN', '2024-05-02 13:31:00', '2024-06-16 14:38:00', 1, 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', '\"[{\\\"cau_hoi\\\":\\\"L\\u00e0m th\\u1ebf n\\u00e0o \\u0111\\u1ec3 vi\\u1ebft m\\u1ed9t bash script c\\u00f3 th\\u1ec3 ch\\u1ea1y (executable) tr\\u00ean Linux?\\\",\\\"cau_tra_loi\\\":[\\\"Th\\u00eam d\\u00f2ng #!\\/bin\\/bash \\u1edf \\u0111\\u1ea7u script v\\u00e0 c\\u1ea5p quy\\u1ec1n th\\u1ef1c thi cho script.\\\",\\\"S\\u1eed d\\u1ee5ng extension .exe cho file script.\\\",\\\"\\u0110\\u1ed5i t\\u00ean file script th\\u00e0nh script.run.\\\",\\\"Kh\\u00f4ng c\\u1ea7n l\\u00e0m g\\u00ec, bash script s\\u1ebd t\\u1ef1 ch\\u1ea1y.\\\"],\\\"dap_an_dung\\\":[0]},{\\\"cau_hoi\\\":\\\"L\\u00e0m th\\u1ebf n\\u00e0o \\u0111\\u1ec3 l\\u1ea5y tham s\\u1ed1 \\u0111\\u01b0\\u1ee3c truy\\u1ec1n v\\u00e0o trong m\\u1ed9t bash script?\\\",\\\"cau_tra_loi\\\":[\\\"S\\u1eed d\\u1ee5ng argv trong bash.\\\",\\\"S\\u1eed d\\u1ee5ng $1, $2, $3,... \\u0111\\u1ec3 truy c\\u1eadp c\\u00e1c tham s\\u1ed1.\\\",\\\"S\\u1eed d\\u1ee5ng params \\u0111\\u1ec3 l\\u1ea5y t\\u1ea5t c\\u1ea3 tham s\\u1ed1.\\\",\\\"S\\u1eed d\\u1ee5ng input() \\u0111\\u1ec3 nh\\u1eadn tham s\\u1ed1.\\\"],\\\"dap_an_dung\\\":[1]},{\\\"cau_hoi\\\":\\\"L\\u1ec7nh n\\u00e0o \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 ch\\u1ea1y m\\u1ed9t ch\\u01b0\\u01a1ng tr\\u00ecnh ho\\u1eb7c script trong n\\u1ec1n (background)?\\\",\\\"cau_tra_loi\\\":[\\\"run\\\",\\\"start\\\",\\\"bg\\\",\\\"&\\\"],\\\"dap_an_dung\\\":[3]},{\\\"cau_hoi\\\":\\\"L\\u00e0m th\\u1ebf n\\u00e0o \\u0111\\u1ec3 l\\u1eb7p qua danh s\\u00e1ch c\\u00e1c file trong m\\u1ed9t th\\u01b0 m\\u1ee5c trong bash script?\\\",\\\"cau_tra_loi\\\":[\\\"S\\u1eed d\\u1ee5ng for file in * v\\u00e0 do...done.\\\",\\\"S\\u1eed d\\u1ee5ng while loop.\\\",\\\"S\\u1eed d\\u1ee5ng list_files() function.\\\",\\\"S\\u1eed d\\u1ee5ng foreach loop.\\\"],\\\"dap_an_dung\\\":[0]},{\\\"cau_hoi\\\":\\\"L\\u00e0m th\\u1ebf n\\u00e0o \\u0111\\u1ec3 ch\\u1ea1y m\\u1ed9t l\\u1ec7nh v\\u1edbi quy\\u1ec1n root (superuser) trong bash script?\\\",\\\"cau_tra_loi\\\":[\\\"S\\u1eed d\\u1ee5ng sudo tr\\u01b0\\u1edbc l\\u1ec7nh c\\u1ea7n ch\\u1ea1y.\\\",\\\"S\\u1eed d\\u1ee5ng runas root trong script.\\\",\\\"S\\u1eed d\\u1ee5ng su -c tr\\u01b0\\u1edbc l\\u1ec7nh.\\\",\\\"S\\u1eed d\\u1ee5ng root keyword.\\\"],\\\"dap_an_dung\\\":[0]},{\\\"cau_hoi\\\":\\\"\\u0110\\u1ec3 x\\u00f3a m\\u1ed9t bi\\u1ebfn m\\u00f4i tr\\u01b0\\u1eddng (environment variable) trong Linux, b\\u1ea1n s\\u1eed d\\u1ee5ng l\\u1ec7nh n\\u00e0o sau \\u0111\\u00e2y?\\\",\\\"cau_tra_loi\\\":[\\\"rmvar\\\",\\\"unset\\\",\\\"deleteenv\\\",\\\"removevar\\\"],\\\"dap_an_dung\\\":[1]},{\\\"cau_hoi\\\":\\\"L\\u00e0m th\\u1ebf n\\u00e0o \\u0111\\u1ec3 ki\\u1ec3m tra xem m\\u1ed9t file c\\u00f3 t\\u1ed3n t\\u1ea1i trong bash script?\\\",\\\"cau_tra_loi\\\":[\\\"S\\u1eed d\\u1ee5ng file_exists() function.\\\",\\\"S\\u1eed d\\u1ee5ng if [ -f \\\\\\\"$file\\\\\\\" ].\\\",\\\"S\\u1eed d\\u1ee5ng check -file command.\\\",\\\"S\\u1eed d\\u1ee5ng file -check option.\\\"],\\\"dap_an_dung\\\":[1]},{\\\"cau_hoi\\\":\\\"L\\u00e0m th\\u1ebf n\\u00e0o \\u0111\\u1ec3 ki\\u1ec3m tra m\\u1ed9t th\\u01b0 m\\u1ee5c c\\u00f3 t\\u1ed3n t\\u1ea1i trong bash script?\\\",\\\"cau_tra_loi\\\":[\\\"S\\u1eed d\\u1ee5ng if [ -d \\\\\\\"$directory\\\\\\\" ].\\\",\\\"S\\u1eed d\\u1ee5ng check -directory command.\\\",\\\"S\\u1eed d\\u1ee5ng exists() function.\\\",\\\"S\\u1eed d\\u1ee5ng if [ -folder \\\\\\\"$directory\\\\\\\" ].\\\"],\\\"dap_an_dung\\\":[0]},{\\\"cau_hoi\\\":\\\"L\\u00e0m th\\u1ebf n\\u00e0o \\u0111\\u1ec3 t\\u1ea1o m\\u1ed9t bi\\u1ebfn m\\u00f4i tr\\u01b0\\u1eddng (environment variable) trong bash script?\\\",\\\"cau_tra_loi\\\":[\\\"S\\u1eed d\\u1ee5ng setenv.\\\",\\\"S\\u1eed d\\u1ee5ng export.\\\",\\\"S\\u1eed d\\u1ee5ng define.\\\",\\\"S\\u1eed d\\u1ee5ng newvar.\\\"],\\\"dap_an_dung\\\":[1]},{\\\"cau_hoi\\\":\\\"L\\u00e0m th\\u1ebf n\\u00e0o \\u0111\\u1ec3 ki\\u1ec3m tra xem m\\u1ed9t l\\u1ec7nh \\u0111\\u00e3 th\\u00e0nh c\\u00f4ng hay kh\\u00f4ng trong bash script?\\\",\\\"cau_tra_loi\\\":[\\\"S\\u1eed d\\u1ee5ng check_success.\\\",\\\"S\\u1eed d\\u1ee5ng if [ $? -eq 0 ].\\\",\\\"S\\u1eed d\\u1ee5ng success_check.\\\",\\\"S\\u1eed d\\u1ee5ng if [ exit_code -eq 0 ].\\\"],\\\"dap_an_dung\\\":[1]}]\"', NULL, '2024-04-20 23:31:48', '2024-06-14 22:59:44', '2024-06-14 22:59:44'),
(5, NULL, 'adadd', 'adadad', '', '2024-04-24 19:26:00', '2024-05-03 19:26:00', 0, NULL, NULL, NULL, '2024-04-23 05:26:36', '2024-05-01 06:33:36', '2024-05-01 06:33:36'),
(6, NULL, 'aaa', 'aaa', '', '2024-05-03 19:48:00', '2024-05-18 19:48:00', 0, NULL, NULL, NULL, '2024-04-23 05:48:20', '2024-05-01 06:33:38', '2024-05-01 06:33:38'),
(7, NULL, 'aaaaa', 'aaaaaaaaaa', '', '2024-04-25 19:50:00', '2024-05-11 19:50:00', 0, NULL, NULL, NULL, '2024-04-23 05:50:31', '2024-04-23 06:08:50', '2024-04-23 06:08:50'),
(8, NULL, 'qqq', 'qqqqqq', '', '2024-04-26 19:52:00', '2024-05-09 19:52:00', 0, NULL, NULL, '207CT123456', '2024-04-23 05:52:50', '2024-04-23 06:08:47', '2024-04-23 06:08:47'),
(9, NULL, 'e', 'ee', '', '2024-05-02 20:02:00', '2024-05-11 20:02:00', 0, NULL, NULL, '207CT123456', '2024-04-23 06:02:10', '2024-05-01 06:33:40', '2024-05-01 06:33:40'),
(10, NULL, 'BT_CSLT', 'Bài thi Cơ sở lập trình', 'CSLT1', '2024-05-01 20:34:00', '2024-06-06 20:34:00', 1, 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', '[{\"cau_hoi\":\"dadadad\",\"cau_tra_loi\":[\"adad\",\"adad\",\"adadad\",\"adadad\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"dadad\",\"cau_tra_loi\":[\"adad\",\"adad\",\"adada\",\"dad\"],\"dap_an_dung\":[0]}]', NULL, '2024-05-01 06:34:29', '2024-06-02 23:13:02', NULL),
(11, NULL, 'adada', 'dâdad', '', '2024-05-06 13:16:00', '2024-05-08 13:16:00', 0, NULL, NULL, '207CT123456', '2024-05-04 23:16:27', '2024-05-04 23:22:42', '2024-05-04 23:22:42'),
(12, NULL, 'aaaaaaa', 'aaaaaaa', '', '2024-05-17 15:25:00', '2024-05-24 15:25:00', 0, NULL, NULL, NULL, '2024-05-17 01:26:01', '2024-05-17 01:26:05', '2024-05-17 01:26:05'),
(13, NULL, 'd123d', 'adadadadd', '', '2024-05-20 12:40:00', '2024-05-23 12:40:00', 0, NULL, '[{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u, kh\\u00e1i ni\\u1ec7m n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 m\\u00f4 t\\u1ea3 th\\u00f4ng tin v\\u1ec1 m\\u1ed9t th\\u1ef1c th\\u1ec3 c\\u1ee5 th\\u1ec3, nh\\u01b0 t\\u00ean, tu\\u1ed5i, \\u0111\\u1ecba ch\\u1ec9, vv.?\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Thu\\u1ed9c t\\u00ednh\",\"B\\u1ea3ng\",\"R\\u00e0ng bu\\u1ed9c\"],\"dap_an_dung\":[1]},{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u quan h\\u1ec7, kh\\u00f3a n\\u00e0o \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 duy nh\\u1ea5t \\u0111\\u1ecbnh danh m\\u1ed9t h\\u00e0ng trong b\\u1ea3ng\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Kh\\u00f3a ngo\\u1ea1i\",\"Kh\\u00f3a thay th\\u1ebf\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"M\\u1ed9t c\\u00e2u h\\u1ecfi kh\\u00e1c v\\u1edbi ch\\u1ec9 2 c\\u00e2u tr\\u1ea3 l\\u1eddi\",\"cau_tra_loi\":[\"\\u0110\\u00e1p \\u00e1n 1\",\"\\u0110\\u00e1p \\u00e1n 2\"],\"dap_an_dung\":[0,1]}]', '207CT123456', '2024-05-19 22:40:46', '2024-06-03 00:06:03', '2024-06-03 00:06:03'),
(14, NULL, 'BT_LTPY', 'Lập trình python cơ bản', 'LTPY', '2024-05-02 23:21:00', '2024-06-07 14:21:00', 1, 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', NULL, NULL, '2024-05-27 02:54:14', '2024-06-02 23:13:14', NULL),
(15, NULL, 'BT_LTLN', 'Lập trình Linux', '', '2024-05-02 23:21:02', '2024-06-07 14:21:02', 0, 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', '[{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u, kh\\u00e1i ni\\u1ec7m n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 m\\u00f4 t\\u1ea3 th\\u00f4ng tin v\\u1ec1 m\\u1ed9t th\\u1ef1c th\\u1ec3 c\\u1ee5 th\\u1ec3, nh\\u01b0 t\\u00ean, tu\\u1ed5i, \\u0111\\u1ecba ch\\u1ec9, vv.?\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Thu\\u1ed9c t\\u00ednh\",\"B\\u1ea3ng\",\"R\\u00e0ng bu\\u1ed9c\"],\"dap_an_dung\":[1]},{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u quan h\\u1ec7, kh\\u00f3a n\\u00e0o \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 duy nh\\u1ea5t \\u0111\\u1ecbnh danh m\\u1ed9t h\\u00e0ng trong b\\u1ea3ng\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Kh\\u00f3a ngo\\u1ea1i\",\"Kh\\u00f3a thay th\\u1ebf\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"M\\u1ed9t c\\u00e2u h\\u1ecfi kh\\u00e1c v\\u1edbi ch\\u1ec9 2 c\\u00e2u tr\\u1ea3 l\\u1eddi\",\"cau_tra_loi\":[\"\\u0110\\u00e1p \\u00e1n 1\",\"\\u0110\\u00e1p \\u00e1n 2\"],\"dap_an_dung\":[0,1]}]', NULL, '2024-05-27 02:54:14', '2024-06-17 06:33:57', NULL),
(17, NULL, 'BT_LTPYNC', 'Lập trình python nâng cao', '', '2024-05-02 23:21:00', '2024-06-07 14:21:00', 0, 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', NULL, '207CT123456', '2024-05-27 06:08:06', '2024-05-27 06:09:59', '2024-05-27 06:09:59'),
(18, NULL, 'BT_LTPYNC', 'Lập trình python nâng cao', '', '2024-05-02 23:21:00', '2024-06-07 14:21:00', 0, 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', NULL, '207CT123456', '2024-05-27 06:10:30', '2024-05-27 06:12:56', '2024-05-27 06:12:56'),
(19, NULL, 'BT_LTPYNC', 'Lập trình python nâng cao', '', '2024-05-02 23:21:00', '2024-06-07 14:21:00', 0, 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', NULL, '207CT123456', '2024-05-27 06:14:46', '2024-05-27 06:16:07', '2024-05-27 06:16:07'),
(20, NULL, 'BT_LTPYNC', 'Lập trình python nâng cao', '', '2024-05-02 23:21:00', '2024-06-07 14:21:00', 0, 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', NULL, '207CT123456', '2024-05-27 06:16:13', '2024-05-27 06:16:50', '2024-05-27 06:16:50'),
(21, NULL, 'BT_LTPYNC', 'Lập trình python nâng cao', '', '2024-05-02 23:21:00', '2024-06-07 14:21:00', 0, 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', NULL, '207CT123456', '2024-05-27 06:16:58', '2024-05-27 06:18:39', '2024-05-27 06:18:39'),
(22, NULL, 'BT_LTPYNC', 'Lập trình python nâng cao', '', '2024-05-02 23:21:00', '2024-06-07 14:21:00', 0, 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', NULL, '207CT123456', '2024-05-27 06:19:04', '2024-05-27 06:19:34', '2024-05-27 06:19:34'),
(23, NULL, 'BT_LTPYNC', 'Lập trình python nâng cao', 'LTPTNC', '2024-05-02 23:21:00', '2024-06-07 14:21:00', 1, 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', NULL, '207CT123456', '2024-05-27 06:19:43', '2024-06-09 03:43:50', '2024-06-09 03:43:50'),
(24, NULL, 'BT_LNXXX', 'Linuxxx', '', '2024-06-03 12:39:00', '2024-06-19 12:39:00', 0, 'adadadaaddadaad', NULL, NULL, '2024-06-01 22:39:17', '2024-06-01 22:41:54', '2024-06-01 22:41:54'),
(25, NULL, 'dddd', 'adadadadad', '', '2024-06-04 12:40:00', '2024-06-05 12:40:00', 0, 'dâda', NULL, NULL, '2024-06-01 22:40:27', '2024-06-01 22:41:58', '2024-06-01 22:41:58'),
(26, NULL, 'aaaaaaaa', 'aaaaaaaa', '', '2024-06-03 12:42:00', '2024-06-05 12:42:00', 0, 'aaaaaaa', NULL, NULL, '2024-06-01 22:42:14', '2024-06-01 22:45:17', '2024-06-01 22:45:17'),
(27, NULL, 'aaaa', 'aaaaaaa', '', '2024-06-03 12:45:00', '2024-06-05 12:45:00', 0, 'aaaa', NULL, NULL, '2024-06-01 22:45:31', '2024-06-01 22:49:33', '2024-06-01 22:49:33'),
(28, NULL, 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaa', '', '2024-06-03 12:52:00', '2024-06-12 12:52:00', 0, 'aaaaaaaaaaaaaaaaaaa', NULL, NULL, '2024-06-01 22:52:24', '2024-06-03 00:06:09', '2024-06-03 00:06:09'),
(29, NULL, 'BT_CSDL', 'Bài thi Cơ sở dữ liệu', '', '2024-06-03 13:04:00', '2024-06-12 13:04:00', 0, 'aaaaaaaaa', NULL, NULL, '2024-06-01 23:05:01', '2024-06-03 00:06:33', '2024-06-03 00:06:33'),
(30, NULL, 'ffffffffffffff', 'fffffffffffffffff', '', '2024-06-04 13:16:00', '2024-06-20 13:16:00', 0, NULL, NULL, NULL, '2024-06-01 23:16:16', '2024-06-03 00:06:19', '2024-06-03 00:06:19'),
(31, NULL, 'ffffffffffffffffffffffffffffffffffff', 'eeeeeeeeeeeeeeeeeeee', '', '2024-06-17 13:16:00', '2024-06-26 13:16:00', 0, NULL, NULL, NULL, '2024-06-01 23:16:41', '2024-06-03 00:06:24', '2024-06-03 00:06:24'),
(32, NULL, 'BT_LTPYNC', 'Lập trình python nâng cao', '', '2024-05-02 23:21:00', '2024-06-07 14:21:00', 0, 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', NULL, NULL, '2024-06-01 23:27:49', '2024-06-01 23:27:49', NULL),
(33, NULL, 'BT_LN', 'Bài thi Linux', 'LN', '2024-06-03 12:40:00', '2024-06-12 12:41:00', 2, NULL, NULL, NULL, '2024-06-03 22:41:08', '2024-06-04 02:44:54', '2024-06-04 02:44:54'),
(34, NULL, 'BT_CSDL', 'ddddd', 'CSLT1', '2024-06-05 16:10:00', '2024-06-14 16:10:00', 2, NULL, NULL, NULL, '2024-06-04 02:11:28', '2024-06-04 02:12:10', '2024-06-04 02:12:10'),
(35, NULL, 'BT_LN', 'Bài thi Linux', 'LN', '2024-06-06 16:46:00', '2024-06-14 16:46:00', 2, NULL, NULL, NULL, '2024-06-04 02:46:38', '2024-06-04 02:46:38', NULL),
(36, '111LTLN111', 'BT_LN01', 'Bài thi Linuxx', 'LN', '2024-06-06 13:46:00', '2024-06-07 13:46:00', 1, NULL, NULL, NULL, '2024-06-04 23:47:03', '2024-06-14 22:25:53', NULL),
(37, NULL, 'BT_LN01', 'Bài thi Linuxx', 'LN', '2024-06-05 15:14:00', '2024-06-14 15:14:00', 2, NULL, NULL, NULL, '2024-06-05 01:15:00', '2024-06-05 01:15:25', NULL),
(38, '111LTLN111', 'BT_CSDL1', 'Bài thi Cơ sở dữ liệu', 'CSDL', '2024-06-10 17:36:00', '2024-06-13 17:36:00', 1, NULL, NULL, '207CT123456', '2024-06-09 03:36:53', '2024-06-09 03:42:54', '2024-06-09 03:42:54'),
(39, '111LTLN111', 'BT_LN5', 'Bài thi Linux', 'LN', '2024-06-09 17:38:00', '2024-06-14 17:38:00', 1, NULL, NULL, '207CT123456', '2024-06-09 03:38:20', '2024-06-09 03:39:40', '2024-06-09 03:39:40'),
(40, '111LTLN111', 'BT_LN5', 'Bài thi Linux', 'LN', '2024-06-09 17:38:00', '2024-06-14 17:38:00', 1, NULL, NULL, '207CT123456', '2024-06-09 03:39:34', '2024-06-09 03:40:59', '2024-06-09 03:40:59'),
(41, 'LHP_CSDL', 'BT_CSDL2', 'Bài thi Cơ sở dữ liệu', 'CSDL', '2024-06-09 17:44:00', '2024-06-11 17:44:00', 1, NULL, NULL, '207CT123456', '2024-06-09 03:44:08', '2024-06-14 22:25:35', NULL),
(42, '111LTLN111', 'BT_LN3', 'Bài thi Linux', 'LN', '2024-06-10 18:41:00', '2024-06-13 18:41:00', 1, NULL, '[{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u, kh\\u00e1i ni\\u1ec7m n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 m\\u00f4 t\\u1ea3 th\\u00f4ng tin v\\u1ec1 m\\u1ed9t th\\u1ef1c th\\u1ec3 c\\u1ee5 th\\u1ec3, nh\\u01b0 t\\u00ean, tu\\u1ed5i, \\u0111\\u1ecba ch\\u1ec9, vv.?\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Thu\\u1ed9c t\\u00ednh\",\"B\\u1ea3ng\",\"R\\u00e0ng bu\\u1ed9c\"],\"dap_an_dung\":[1]},{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u quan h\\u1ec7, kh\\u00f3a n\\u00e0o \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 duy nh\\u1ea5t \\u0111\\u1ecbnh danh m\\u1ed9t h\\u00e0ng trong b\\u1ea3ng\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Kh\\u00f3a ngo\\u1ea1i\",\"Kh\\u00f3a thay th\\u1ebf\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"M\\u1ed9t c\\u00e2u h\\u1ecfi kh\\u00e1c v\\u1edbi ch\\u1ec9 2 c\\u00e2u tr\\u1ea3 l\\u1eddi\",\"cau_tra_loi\":[\"\\u0110\\u00e1p \\u00e1n 1\",\"\\u0110\\u00e1p \\u00e1n 2\"],\"dap_an_dung\":[0,1]}]', '207CT123456', '2024-06-09 04:41:46', '2024-06-17 19:37:25', NULL),
(43, 'LHP_LTLN', 'BT_LTLN', 'Lập trình Linux', 'LN', '2024-05-02 23:21:02', '2024-06-07 14:21:02', 1, 'Thí sinh chỉ được dùng một thiết bị. Không được sử dụng tài liệu trong quá trình làm bài. Phải làm bài bằng VLU THI.', NULL, NULL, '2024-06-15 05:34:34', '2024-06-15 05:34:34', NULL),
(44, 'LHP_LTLN', 'adadadad', 'dadadadadad', 'LTLN', '2024-06-18 21:16:00', '2024-06-20 21:17:00', 1, NULL, '[{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u, kh\\u00e1i ni\\u1ec7m n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 m\\u00f4 t\\u1ea3 th\\u00f4ng tin v\\u1ec1 m\\u1ed9t th\\u1ef1c th\\u1ec3 c\\u1ee5 th\\u1ec3, nh\\u01b0 t\\u00ean, tu\\u1ed5i, \\u0111\\u1ecba ch\\u1ec9, vv.?\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Thu\\u1ed9c t\\u00ednh\",\"B\\u1ea3ng\",\"R\\u00e0ng bu\\u1ed9c\"],\"dap_an_dung\":[1]},{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u quan h\\u1ec7, kh\\u00f3a n\\u00e0o \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 duy nh\\u1ea5t \\u0111\\u1ecbnh danh m\\u1ed9t h\\u00e0ng trong b\\u1ea3ng\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Kh\\u00f3a ngo\\u1ea1i\",\"Kh\\u00f3a thay th\\u1ebf\"],\"dap_an_dung\":[0]},{\"cau_hoi\":\"M\\u1ed9t c\\u00e2u h\\u1ecfi kh\\u00e1c v\\u1edbi ch\\u1ec9 2 c\\u00e2u tr\\u1ea3 l\\u1eddi\",\"cau_tra_loi\":[\"\\u0110\\u00e1p \\u00e1n 1\",\"\\u0110\\u00e1p \\u00e1n 2\"],\"dap_an_dung\":[0,1]}]', '207CT123456', '2024-06-17 07:17:02', '2024-06-17 07:32:08', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giang_vien`
--

CREATE TABLE `giang_vien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_giang_vien` varchar(255) DEFAULT NULL,
  `ten_giang_vien` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `ma_khoa` varchar(255) DEFAULT NULL,
  `ma_nganh` varchar(255) DEFAULT NULL,
  `cac_mon_giang_day` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `phan_cong` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giang_vien`
--

INSERT INTO `giang_vien` (`id`, `ma_giang_vien`, `ten_giang_vien`, `so_dien_thoai`, `email`, `ngay_sinh`, `ma_khoa`, `ma_nganh`, `cac_mon_giang_day`, `phan_cong`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'q', 'q', 'q', 'q', '2002-03-04', 'CNTT', 'CNTT452', '[{\"thu_tu\":1,\"ma_mon\":\"CSLT1\"},{\"thu_tu\":2,\"ma_mon\":\"CSDL\"}]', NULL, NULL, '2024-03-24 23:40:25', '2024-03-24 23:40:25'),
(2, 'a', 'a', 'a', 'a', '2013-05-26', 'a', 'a', NULL, NULL, '2024-03-20 00:55:50', '2024-03-20 01:17:54', '2024-03-20 01:17:54'),
(3, '2304526', 'Pham Duy dd', '05540265489', 'duy@gmail.com', '2014-02-05', 'CNTT', 'CNTT15', '[{\"thu_tu\":1,\"ma_mon\":\"CSLT1\"},{\"thu_tu\":2,\"ma_mon\":\"CSLT1\"}]', NULL, '2024-03-20 03:23:34', '2024-05-04 22:50:48', '2024-05-04 22:50:48'),
(4, '2304526', 'Pham Duy', '055402654898', 'duy@gmail.com', '2014-02-05', 'CNTT', 'CNTT15', '[{\"thu_tu\":1,\"ma_mon\":\"LTPY\"},{\"thu_tu\":2,\"ma_mon\":\"LTJS\"},{\"thu_tu\":3,\"ma_mon\":\"CSDL\"}]', NULL, '2024-03-23 00:43:49', '2024-05-04 22:50:51', '2024-05-04 22:50:51'),
(5, '2304526', 'Pham Duy', 'a', 'duy@gmail.com', '2014-02-05', 'MI', 'CNTT1', NULL, NULL, '2024-03-23 00:48:11', '2024-05-04 22:50:53', '2024-05-04 22:50:53'),
(6, '2304526', 'a', '055402654898', 'duy@gmail.com', '2002-07-17', 'CNTT', 'CNTT15', NULL, NULL, '2024-03-23 00:55:13', '2024-05-04 22:50:57', '2024-05-04 22:50:57'),
(7, '2304526', 'Pham Duy', '0554026548', 'duy@gmail.com', '2014-02-05', 'DL', 'CNPM', NULL, NULL, '2024-03-23 00:55:54', '2024-05-04 22:51:00', '2024-05-04 22:51:00'),
(8, '123456', 'Pham Duy hehe', '111111111111111111', 'duy3@gmail.com', '2013-05-26', 'CNTT', NULL, NULL, NULL, '2024-03-24 23:03:04', '2024-05-04 22:51:02', '2024-05-04 22:51:02'),
(9, '1234566', 'Pham Duy hehet', '12345678979', 'duy07@gmail.com', '2013-05-26', 'CNTT', 'CNPM', NULL, NULL, '2024-03-24 23:04:55', '2024-05-04 22:51:04', '2024-05-04 22:51:04'),
(10, '1234569', 'Pham Duyq', '774415', 'duy01@gmail.com', '2014-02-05', 'CNTT', NULL, 'null', NULL, '2024-03-24 23:08:09', '2024-05-04 22:51:06', '2024-05-04 22:51:06'),
(11, '78221', 'Pham Duye', '99999999', 'duy36@gmail.com', '2014-02-05', 'CNTT', NULL, 'null', NULL, '2024-03-24 23:13:35', '2024-05-04 22:51:09', '2024-05-04 22:51:09'),
(12, '!@@#$$', 'Pham Duyv', '45894665486', 'duy000@gmail.com', '2013-05-26', 'CNTT', NULL, NULL, NULL, '2024-03-24 23:30:43', '2024-04-21 22:31:02', '2024-04-21 22:31:02'),
(13, 'a', 'a', '0833299959', 'duy6@gmail.com', '2014-02-05', 'CNTT', NULL, NULL, NULL, '2024-03-24 23:40:43', '2024-03-24 23:55:25', '2024-03-24 23:55:25'),
(14, 'q', 'q', 'q', 'q', '2014-02-05', 'CNTT', NULL, NULL, NULL, '2024-03-24 23:41:46', '2024-03-24 23:51:48', '2024-03-24 23:51:48'),
(15, 's', 's', 's', 's', '2014-02-05', 'CNTT', NULL, NULL, NULL, '2024-03-24 23:48:00', '2024-04-21 22:31:05', '2024-04-21 22:31:05'),
(16, 'ư', 'ư', 'ww', 'ư', '2014-02-05', 'CNTT', NULL, 'null', NULL, '2024-03-24 23:51:04', '2024-04-21 22:31:08', '2024-04-21 22:31:08'),
(17, 'q', 'q', 'q', 'q', '2014-02-05', 'CNTT', NULL, NULL, NULL, '2024-03-24 23:51:55', '2024-04-21 22:31:13', '2024-04-21 22:31:13'),
(18, 'a', 'a', 'a', 'a', '2014-02-05', 'CNTT', NULL, NULL, NULL, '2024-03-24 23:55:30', '2024-04-21 22:32:17', '2024-04-21 22:32:17'),
(19, '207CT68618', 'Pham Duy', '0445789641', 'duy99@gmail.com', '2013-05-26', 'CNTT', NULL, NULL, NULL, '2024-03-25 00:28:22', '2024-04-21 22:32:19', '2024-04-21 22:32:19'),
(20, '12345', 'sdasdadad', '01234567891', 'duy111@gmail.com', '2014-02-05', 'CNTT', 'CNPM', NULL, NULL, '2024-04-18 02:49:58', '2024-04-21 22:32:23', '2024-04-21 22:32:23'),
(21, '207CT123456', 'Nguyễn Văn A', '05540265499', 'vanA@gmail.com', '1997-01-15', 'CNTT', 'CNPM', '[{\"thu_tu\":1,\"ma_mon\":\"CSDL\"}]', '[{\"ma_lop_hoc_phan\":\"111LTLN111\",\"ma_bai_thi\":\"BT_LN3\",\"lan_thi\":\"1\",\"thoi_gian_bat_dau\":\"2024-06-10 18:41:00\",\"thoi_gian_ket_thuc\":\"2024-06-14 18:41:00\"},{\"ma_lop_hoc_phan\":\"LHP_CSDL\",\"ma_bai_thi\":\"BT_CSDL\",\"lan_thi\":\"1\",\"thoi_gian_bat_dau\":\"2024-06-14 23:21:00\",\"thoi_gian_ket_thuc\":\"2024-06-24 14:21:00\"}]', '2024-04-21 22:35:37', '2024-06-21 23:23:52', NULL),
(22, '23045267', 'a', '11111111111', 'a@gmail.com', '2024-04-16', 'CNTT', 'CNPM', NULL, NULL, '2024-04-21 22:36:17', '2024-05-04 22:51:12', '2024-05-04 22:51:12'),
(23, '207GV47455', 'Trần Văn B', '01234525688', 'vanB@vanlanguni.edu.vn', '1992-02-05', 'CNTT', 'CNPM', '[{\"thu_tu\":1,\"ma_mon\":\"CSLT1\"},{\"thu_tu\":2,\"ma_mon\":\"CSDL\"}]', '[]', '2024-05-04 22:53:22', '2024-06-13 23:57:07', NULL),
(24, '201CT123456', 'Nguyễn Văn d', '01234525879', 'nguyenvanB@vanlangui.vn', '1988-06-15', 'CNTT', 'CNPM', NULL, NULL, '2024-05-17 01:22:23', '2024-05-17 01:22:46', '2024-05-17 01:22:46'),
(25, 'GV001', 'Nguyễn Văn A', '0901234567', 'nva@example.com', '2000-01-01', 'CNTT', 'CNPM', NULL, NULL, '2024-05-27 01:07:21', '2024-05-27 01:07:21', NULL),
(26, 'GV002', 'Trần Thị B', '0902345678', 'ttb@example.com', '2000-01-02', 'CNTT', 'CNPM', NULL, NULL, '2024-05-27 01:07:21', '2024-05-27 01:07:21', NULL),
(27, 'GV003', 'Lê Văn C', '0903456789', 'lvc@example.com', '2000-01-03', 'CNTT', 'CNPM', NULL, NULL, '2024-05-27 01:07:22', '2024-05-27 01:07:22', NULL),
(28, 'Guest76', 'Trâng Quang Thạch', NULL, 'thach@gmail.com', NULL, NULL, NULL, NULL, NULL, '2024-05-27 01:51:45', '2024-05-27 01:56:55', '2024-05-27 01:56:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ket_qua`
--

CREATE TABLE `ket_qua` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_bai_thi` varchar(255) NOT NULL,
  `ten_bai_thi` varchar(255) NOT NULL,
  `ma_sinh_vien` varchar(255) NOT NULL,
  `diem` longtext NOT NULL,
  `so_cau_tra_loi_dung` longtext NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ket_qua`
--

INSERT INTO `ket_qua` (`id`, `ma_bai_thi`, `ten_bai_thi`, `ma_sinh_vien`, `diem`, `so_cau_tra_loi_dung`, `state`, `created_at`, `updated_at`, `deleted_at`) VALUES
(59, 'BT_CSDL', 'Bài thi Cơ sở dữ liệu', '207CT68611', '[{\"lan_thi\":\"1\",\"ma_lop_hoc_phan\":\"LHP_CSDL\",\"diem\":9.44}]', '[{\"lan_thi\":\"1\",\"ma_lop_hoc_phan\":\"LHP_CSDL\",\"cauTraLoi\":[{\"cauHoi\":{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u, kh\\u00e1i ni\\u1ec7m n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 m\\u00f4 t\\u1ea3 th\\u00f4ng tin v\\u1ec1 m\\u1ed9t th\\u1ef1c th\\u1ec3 c\\u1ee5 th\\u1ec3, nh\\u01b0 t\\u00ean, tu\\u1ed5i, \\u0111\\u1ecba ch\\u1ec9, vv.?\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Thu\\u1ed9c t\\u00ednh\",\"B\\u1ea3ng\",\"R\\u00e0ng bu\\u1ed9c\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"Kh\\u00f3a ch\\u00ednh\"],\"dapAnChon\":[\"Kh\\u00f3a ch\\u00ednh\"],\"dungSai\":true},{\"cauHoi\":{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u quan h\\u1ec7, kh\\u00f3a n\\u00e0o \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 duy nh\\u1ea5t \\u0111\\u1ecbnh danh m\\u1ed9t h\\u00e0ng trong b\\u1ea3ng\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Kh\\u00f3a ngo\\u1ea1i\",\"Kh\\u00f3a thay th\\u1ebf\",\"Kh\\u00f3a \\u1ee9ng d\\u1ee5ng\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"Kh\\u00f3a ch\\u00ednh\"],\"dapAnChon\":[\"Kh\\u00f3a ch\\u00ednh\"],\"dungSai\":true},{\"cauHoi\":{\"cau_hoi\":\"Trong m\\u00f4 h\\u00ecnh ER (Entity-Relationship), m\\u1ed1i quan h\\u1ec7 \\\"M\\u1ed9t-\\u0111\\u1ebfn-Nhi\\u1ec1u\\\" \\u0111\\u01b0\\u1ee3c bi\\u1ec3u di\\u1ec5n b\\u1eb1ng c\\u00e1ch n\\u00e0o?\",\"cau_tra_loi\":[\"H\\u00ecnh tam gi\\u00e1c\",\"H\\u00ecnh ch\\u1eef nh\\u1eadt\",\"H\\u00ecnh oval\",\"H\\u00ecnh tr\\u00f2n\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"H\\u00ecnh tam gi\\u00e1c\"],\"dapAnChon\":[\"H\\u00ecnh tam gi\\u00e1c\"],\"dungSai\":true},{\"cauHoi\":{\"cau_hoi\":\"Trong SQL, c\\u00e2u l\\u1ec7nh n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 th\\u00eam m\\u1ed9t h\\u00e0ng v\\u00e0o b\\u1ea3ng?\",\"cau_tra_loi\":[\"INSERT INTO\",\"ADD ROW\",\"CREATE ROW\",\"UPDATE ROW\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"INSERT INTO\"],\"dapAnChon\":[\"INSERT INTO\"],\"dungSai\":true},{\"cauHoi\":{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u, r\\u00e0ng bu\\u1ed9c UNIQUE \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 l\\u00e0m g\\u00ec?\",\"cau_tra_loi\":[\"\\u0110\\u1ea3m b\\u1ea3o kh\\u00f4ng c\\u00f3 gi\\u00e1 tr\\u1ecb tr\\u00f9ng l\\u1eb7p trong m\\u1ed9t c\\u1ed9t\",\"X\\u00e1c \\u0111\\u1ecbnh m\\u1ed1i quan h\\u1ec7 gi\\u1eefa c\\u00e1c b\\u1ea3ng\",\"X\\u00e1c \\u0111\\u1ecbnh kh\\u00f3a ngo\\u1ea1i\",\"X\\u00e1c \\u0111\\u1ecbnh ki\\u1ec3u d\\u1eef li\\u1ec7u cho m\\u1ed9t c\\u1ed9t\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"\\u0110\\u1ea3m b\\u1ea3o kh\\u00f4ng c\\u00f3 gi\\u00e1 tr\\u1ecb tr\\u00f9ng l\\u1eb7p trong m\\u1ed9t c\\u1ed9t\"],\"dapAnChon\":[\"\\u0110\\u1ea3m b\\u1ea3o kh\\u00f4ng c\\u00f3 gi\\u00e1 tr\\u1ecb tr\\u00f9ng l\\u1eb7p trong m\\u1ed9t c\\u1ed9t\"],\"dungSai\":true},{\"cauHoi\":{\"cau_hoi\":\"Trong SQL, c\\u00e2u l\\u1ec7nh n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 x\\u00f3a m\\u1ed9t b\\u1ea3ng?\",\"cau_tra_loi\":[\"DELETE TABLE\",\"REMOVE TABLE\",\"DROP TABLE\",\"ERASE TABLE\"],\"dap_an_dung\":[1]},\"dapAnDung\":[\"REMOVE TABLE\"],\"dapAnChon\":[\"DELETE TABLE\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"adaaddad\",\"cau_tra_loi\":[\"adada\",\"dada\",\"d\\u00e2d\",\"ada\"],\"dap_an_dung\":[0,1]},\"dapAnDung\":[\"adada\",\"dada\"],\"dapAnChon\":[\"adada\",\"d\\u00e2d\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"adadadada\",\"cau_tra_loi\":[\"d\\u00e2dadad\",\"adadadada\",\"d\\u00e2dadada\",\"d\\u00e2dadad\"],\"dap_an_dung\":[1]},\"dapAnDung\":[\"adadadada\"],\"dapAnChon\":[\"adadadada\"],\"dungSai\":true},{\"cauHoi\":{\"cau_hoi\":\"adadadad\",\"cau_tra_loi\":[\"adadada\",\"dadad\",\"adada\",\"adadadadada\"],\"dap_an_dung\":[3]},\"dapAnDung\":[\"adadadadada\"],\"dapAnChon\":[\"adadadadada\"],\"dungSai\":true}],\"so_cau_dung\":7,\"diem\":8.33}]', 'Public', '2024-06-14 23:33:49', '2024-06-17 19:46:13', NULL),
(62, 'BT_CSDL', 'Bài thi Cơ sở dữ liệu', 'Guest47', '[{\"lan_thi\":\"1\",\"ma_lop_hoc_phan\":\"LHP_CSDL\",\"diem\":3.33}]', '[{\"lan_thi\":\"1\",\"ma_lop_hoc_phan\":\"LHP_CSDL\",\"cauTraLoi\":[{\"cauHoi\":{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u, kh\\u00e1i ni\\u1ec7m n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 m\\u00f4 t\\u1ea3 th\\u00f4ng tin v\\u1ec1 m\\u1ed9t th\\u1ef1c th\\u1ec3 c\\u1ee5 th\\u1ec3, nh\\u01b0 t\\u00ean, tu\\u1ed5i, \\u0111\\u1ecba ch\\u1ec9, vv.?\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Thu\\u1ed9c t\\u00ednh\",\"B\\u1ea3ng\",\"R\\u00e0ng bu\\u1ed9c\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"Kh\\u00f3a ch\\u00ednh\"],\"dapAnChon\":[\"Kh\\u00f3a ch\\u00ednh\"],\"dungSai\":true},{\"cauHoi\":{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u quan h\\u1ec7, kh\\u00f3a n\\u00e0o \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 duy nh\\u1ea5t \\u0111\\u1ecbnh danh m\\u1ed9t h\\u00e0ng trong b\\u1ea3ng\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Kh\\u00f3a ngo\\u1ea1i\",\"Kh\\u00f3a thay th\\u1ebf\",\"Kh\\u00f3a \\u1ee9ng d\\u1ee5ng\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"Kh\\u00f3a ch\\u00ednh\"],\"dapAnChon\":[\"Kh\\u00f3a ch\\u00ednh\"],\"dungSai\":true},{\"cauHoi\":{\"cau_hoi\":\"Trong m\\u00f4 h\\u00ecnh ER (Entity-Relationship), m\\u1ed1i quan h\\u1ec7 \\\"M\\u1ed9t-\\u0111\\u1ebfn-Nhi\\u1ec1u\\\" \\u0111\\u01b0\\u1ee3c bi\\u1ec3u di\\u1ec5n b\\u1eb1ng c\\u00e1ch n\\u00e0o?\",\"cau_tra_loi\":[\"H\\u00ecnh tam gi\\u00e1c\",\"H\\u00ecnh ch\\u1eef nh\\u1eadt\",\"H\\u00ecnh oval\",\"H\\u00ecnh tr\\u00f2n\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"H\\u00ecnh tam gi\\u00e1c\"],\"dapAnChon\":[\"H\\u00ecnh tam gi\\u00e1c\"],\"dungSai\":true},{\"cauHoi\":{\"cau_hoi\":\"Trong SQL, c\\u00e2u l\\u1ec7nh n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 th\\u00eam m\\u1ed9t h\\u00e0ng v\\u00e0o b\\u1ea3ng?\",\"cau_tra_loi\":[\"INSERT INTO\",\"ADD ROW\",\"CREATE ROW\",\"UPDATE ROW\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"INSERT INTO\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u, r\\u00e0ng bu\\u1ed9c UNIQUE \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 l\\u00e0m g\\u00ec?\",\"cau_tra_loi\":[\"\\u0110\\u1ea3m b\\u1ea3o kh\\u00f4ng c\\u00f3 gi\\u00e1 tr\\u1ecb tr\\u00f9ng l\\u1eb7p trong m\\u1ed9t c\\u1ed9t\",\"X\\u00e1c \\u0111\\u1ecbnh m\\u1ed1i quan h\\u1ec7 gi\\u1eefa c\\u00e1c b\\u1ea3ng\",\"X\\u00e1c \\u0111\\u1ecbnh kh\\u00f3a ngo\\u1ea1i\",\"X\\u00e1c \\u0111\\u1ecbnh ki\\u1ec3u d\\u1eef li\\u1ec7u cho m\\u1ed9t c\\u1ed9t\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"\\u0110\\u1ea3m b\\u1ea3o kh\\u00f4ng c\\u00f3 gi\\u00e1 tr\\u1ecb tr\\u00f9ng l\\u1eb7p trong m\\u1ed9t c\\u1ed9t\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"Trong SQL, c\\u00e2u l\\u1ec7nh n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 x\\u00f3a m\\u1ed9t b\\u1ea3ng?\",\"cau_tra_loi\":[\"DELETE TABLE\",\"REMOVE TABLE\",\"DROP TABLE\",\"ERASE TABLE\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"DELETE TABLE\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"adaaddad\",\"cau_tra_loi\":[\"adada\",\"dada\",\"d\\u00e2d\",\"ada\"],\"dap_an_dung\":[0,1]},\"dapAnDung\":[\"adada\",\"dada\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"adadadada\",\"cau_tra_loi\":[\"d\\u00e2dadad\",\"adadadada\",\"d\\u00e2dadada\",\"d\\u00e2dadad\"],\"dap_an_dung\":[1]},\"dapAnDung\":[\"adadadada\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"adadadad\",\"cau_tra_loi\":[\"adadada\",\"dadad\",\"adada\",\"adadadadada\"],\"dap_an_dung\":[3]},\"dapAnDung\":[\"adadadadada\"],\"dungSai\":false}],\"so_cau_dung\":3,\"diem\":2.22}]', 'Public', '2024-06-15 01:09:16', '2024-06-17 19:46:13', NULL),
(63, 'BT_CSDL', 'Bài thi Cơ sở dữ liệu', '207CT68618', '[{\"lan_thi\":\"1\",\"ma_lop_hoc_phan\":\"LHP_CSDL\",\"diem\":0}]', '[{\"lan_thi\":\"1\",\"ma_lop_hoc_phan\":\"LHP_CSDL\",\"cauTraLoi\":[{\"cauHoi\":{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u, kh\\u00e1i ni\\u1ec7m n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 m\\u00f4 t\\u1ea3 th\\u00f4ng tin v\\u1ec1 m\\u1ed9t th\\u1ef1c th\\u1ec3 c\\u1ee5 th\\u1ec3, nh\\u01b0 t\\u00ean, tu\\u1ed5i, \\u0111\\u1ecba ch\\u1ec9, vv.?\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Thu\\u1ed9c t\\u00ednh\",\"B\\u1ea3ng\",\"R\\u00e0ng bu\\u1ed9c\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"Kh\\u00f3a ch\\u00ednh\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u quan h\\u1ec7, kh\\u00f3a n\\u00e0o \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 duy nh\\u1ea5t \\u0111\\u1ecbnh danh m\\u1ed9t h\\u00e0ng trong b\\u1ea3ng\",\"cau_tra_loi\":[\"Kh\\u00f3a ch\\u00ednh\",\"Kh\\u00f3a ngo\\u1ea1i\",\"Kh\\u00f3a thay th\\u1ebf\",\"Kh\\u00f3a \\u1ee9ng d\\u1ee5ng\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"Kh\\u00f3a ch\\u00ednh\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"Trong m\\u00f4 h\\u00ecnh ER (Entity-Relationship), m\\u1ed1i quan h\\u1ec7 \\\"M\\u1ed9t-\\u0111\\u1ebfn-Nhi\\u1ec1u\\\" \\u0111\\u01b0\\u1ee3c bi\\u1ec3u di\\u1ec5n b\\u1eb1ng c\\u00e1ch n\\u00e0o?\",\"cau_tra_loi\":[\"H\\u00ecnh tam gi\\u00e1c\",\"H\\u00ecnh ch\\u1eef nh\\u1eadt\",\"H\\u00ecnh oval\",\"H\\u00ecnh tr\\u00f2n\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"H\\u00ecnh tam gi\\u00e1c\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"Trong SQL, c\\u00e2u l\\u1ec7nh n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 th\\u00eam m\\u1ed9t h\\u00e0ng v\\u00e0o b\\u1ea3ng?\",\"cau_tra_loi\":[\"INSERT INTO\",\"ADD ROW\",\"CREATE ROW\",\"UPDATE ROW\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"INSERT INTO\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"Trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u, r\\u00e0ng bu\\u1ed9c UNIQUE \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng \\u0111\\u1ec3 l\\u00e0m g\\u00ec?\",\"cau_tra_loi\":[\"\\u0110\\u1ea3m b\\u1ea3o kh\\u00f4ng c\\u00f3 gi\\u00e1 tr\\u1ecb tr\\u00f9ng l\\u1eb7p trong m\\u1ed9t c\\u1ed9t\",\"X\\u00e1c \\u0111\\u1ecbnh m\\u1ed1i quan h\\u1ec7 gi\\u1eefa c\\u00e1c b\\u1ea3ng\",\"X\\u00e1c \\u0111\\u1ecbnh kh\\u00f3a ngo\\u1ea1i\",\"X\\u00e1c \\u0111\\u1ecbnh ki\\u1ec3u d\\u1eef li\\u1ec7u cho m\\u1ed9t c\\u1ed9t\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"\\u0110\\u1ea3m b\\u1ea3o kh\\u00f4ng c\\u00f3 gi\\u00e1 tr\\u1ecb tr\\u00f9ng l\\u1eb7p trong m\\u1ed9t c\\u1ed9t\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"Trong SQL, c\\u00e2u l\\u1ec7nh n\\u00e0o d\\u00f9ng \\u0111\\u1ec3 x\\u00f3a m\\u1ed9t b\\u1ea3ng?\",\"cau_tra_loi\":[\"DELETE TABLE\",\"REMOVE TABLE\",\"DROP TABLE\",\"ERASE TABLE\"],\"dap_an_dung\":[0]},\"dapAnDung\":[\"DELETE TABLE\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"adaaddad\",\"cau_tra_loi\":[\"adada\",\"dada\",\"d\\u00e2d\",\"ada\"],\"dap_an_dung\":[0,1]},\"dapAnDung\":[\"adada\",\"dada\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"adadadada\",\"cau_tra_loi\":[\"d\\u00e2dadad\",\"adadadada\",\"d\\u00e2dadada\",\"d\\u00e2dadad\"],\"dap_an_dung\":[1]},\"dapAnDung\":[\"adadadada\"],\"dungSai\":false},{\"cauHoi\":{\"cau_hoi\":\"adadadad\",\"cau_tra_loi\":[\"adadada\",\"dadad\",\"adada\",\"adadadadada\"],\"dap_an_dung\":[3]},\"dapAnDung\":[\"adadadadada\"],\"dungSai\":false}],\"so_cau_dung\":0}]', NULL, '2024-06-21 23:25:23', '2024-06-21 23:25:23', NULL);

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
(6, 'adadda', 'ddadadd', '2024-05-17 01:50:19', '2024-05-17 01:50:30', '2024-05-17 01:50:30'),
(7, 'PR', 'Quan hệ công chúng', '2024-05-27 02:26:29', '2024-05-27 02:26:29', NULL);

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
(10, '111LTLN111', 'Linux cơ bản', 'LN', '2024-06-05 14:30:00', '2024-06-19 14:30:00', '[{\"ma_sinh_vien\":\"207CT68618\"},{\"ma_sinh_vien\":\"207CT68611\"},{\"ma_sinh_vien\":\"Guest47\"}]', '[{\"ma_giang_vien\":\"207CT123456\"}]', '[{\"ma_bai_thi\":\"BT_LN\",\"lan_thi\":1},{\"ma_bai_thi\":\"BT_LN\",\"lan_thi\":2},{\"ma_bai_thi\":\"BT_LN01\",\"lan_thi\":1},{\"ma_bai_thi\":\"BT_LN01\",\"lan_thi\":2},{\"ma_bai_thi\":\"BT_LN3\",\"lan_thi\":\"1\"}]', '2024-06-04 00:31:01', '2024-06-17 19:39:13', NULL),
(11, 'LHP_CSDL', 'Lớp Cơ sở dũ liệu', 'CSDL', '2024-06-09 16:54:00', '2024-06-15 16:54:00', NULL, NULL, NULL, '2024-06-09 02:54:12', '2024-06-09 03:08:25', '2024-06-09 03:08:25'),
(12, 'LHP_PTNC', 'Python nâng cao', 'LTPTNC', '2024-06-09 16:55:00', '2024-06-13 16:55:00', NULL, NULL, NULL, '2024-06-09 02:55:36', '2024-06-09 03:08:28', '2024-06-09 03:08:28'),
(13, 'LHP_CSDL', 'Cơ sở dữ liệu', 'CSDL', '2024-06-09 17:08:00', '2024-06-27 17:08:00', '[{\"ma_sinh_vien\":\"207CT68611\"},{\"ma_sinh_vien\":\"Guest47\"},{\"ma_sinh_vien\":\"207CT68618\"}]', '[{\"ma_giang_vien\":\"207CT123456\"}]', '[{\"ma_bai_thi\":\"BT_CSDL\",\"lan_thi\":1}]', '2024-06-09 03:08:49', '2024-06-21 23:10:58', NULL),
(14, '265CSDL86111', 'Cơ sở dữ liệu', 'CSLT1', '2024-06-14 13:20:00', '2024-06-15 13:20:00', NULL, NULL, NULL, '2024-06-12 23:20:05', '2024-06-12 23:20:05', NULL),
(15, 'LHP_LTPYCB', 'Lập trình python cơ bản', 'LTPYCB', '2024-05-02 23:21:00', '2024-06-07 14:21:00', '[{\"ma_sinh_vien\":\"207CT68618\"},{\"ma_sinh_vien\":\"207CT68641\"},{\"ma_sinh_vien\":\"207CT67641\"},{\"ma_sinh_vien\":\"207CT68611\"},{\"ma_sinh_vien\":\"207CT54641\"}]', '[{\"ma_giang_vien\":\"207CT123456\"}]', '[{\"ma_bai_thi\":\"BT_LTPY\"}]', '2024-06-15 05:34:46', '2024-06-15 05:34:46', NULL),
(16, 'LHP_LTLN', 'Lập trình Linux', 'LTLN', '2024-05-02 23:21:02', '2024-06-07 14:21:02', '[{\"ma_sinh_vien\":\"207CT68618\"},{\"ma_sinh_vien\":\"207CT68641\"},{\"ma_sinh_vien\":\"207CT67641\"},{\"ma_sinh_vien\":\"207CT68611\"},{\"ma_sinh_vien\":\"207CT54641\"}]', '[{\"ma_giang_vien\":\"207CT123456\"}]', '[{\"ma_bai_thi\":\"BT_LTLN\"},{\"ma_bai_thi\":\"adadadad\",\"lan_thi\":\"1\"}]', '2024-06-15 05:34:46', '2024-06-17 07:17:02', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(6, 'LN', 'Lập trình Linux', '2024-04-05 22:34:26', '2024-04-05 22:34:26', NULL),
(7, 'CNTT', 'Công nghệ thông tin', '2024-05-27 02:16:16', '2024-05-27 02:16:16', NULL),
(8, 'LTPTNC', 'Lập trình python nâng cao', '2024-05-27 02:16:16', '2024-05-27 02:16:16', NULL),
(9, 'LTWNC', 'Lập trình web nâng cao', '2024-05-27 02:16:16', '2024-05-27 02:16:16', NULL);

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
(5, 'TTNT', 'Trí tuệ nhân tạo AI', 'CNTT', '2024-05-04 22:54:20', '2024-05-04 22:54:20', NULL),
(6, 'ANM', 'An ninh mạng máy tính', 'CNTT', '2024-05-27 02:39:26', '2024-05-27 02:39:26', NULL);

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
(9, 'Phạm Lê Minh Duy', 'duy00007@gmail.com', 'Sinh viên', '$2y$12$J0KLzufSH2TgUO9kLWpU1.xOcL55OK5eG2HTZkgOVNDuKYdkabtkG', NULL, '2024-04-18 03:09:07', '2024-05-27 01:40:04', NULL),
(10, 'Nguyễn Văn A', 'vanA@gmail.com', 'Giảng viên', '$2y$12$B4nCEnTKEgUJ7HQdxM0IsOWusA3h6TXvWVkwf7JCUWv6qJLJpdhCm', NULL, '2024-04-18 03:09:33', '2024-04-18 03:09:33', NULL),
(11, 'Phạm Lê Minh Duy', 'minhduy00007@gmail.com', 'Sinh viên', '$2y$12$4irvX6Ly9s6/lAjFvS7okucM3Ylz0bVs4KV7jpAFZkEPSImUpVD5C', NULL, '2024-04-18 05:34:01', '2024-04-18 05:34:01', NULL),
(12, 'Trần Công Minh', 'minh@gmail.com', 'Sinh viên', '$2y$12$duNIpBfR4Tb1Igjk5F8j6ukqmzBRcNnGos.5eXvnQ/vCJcgqB/NKW', NULL, '2024-04-21 22:39:36', '2024-05-27 01:43:30', NULL),
(13, 'Hoàng Vĩnh Tiến', 'tien@gmail.com', 'Sinh viên', '$2y$12$vkY7InV0/S3Rh1dgG6WsUOaTDLVmsC4Su3MztyubFF8jh2Gohbm0K', NULL, '2024-04-21 22:39:53', '2024-04-21 22:39:53', NULL),
(14, 'Nguyễn Minh Huy', 'huy@gmail.com', 'Giảng viên', '$2y$12$nauzYp/itex88XvSUl75Du/jRxIrijy6N6FdbQm7BDEb0Lk0nIKIy', NULL, '2024-04-21 22:40:15', '2024-05-27 01:45:39', NULL),
(15, 'Bùi Tuần Kiệt', 'kiet@gmail.com', 'Sinh viên', '$2y$12$zO1yfe.Bj73nmGMqp9We1eM6RhDJpYk9YaHi8wuoysd51qCN.lNAe', NULL, '2024-04-21 22:40:40', '2024-05-17 00:43:48', '2024-05-17 00:43:48'),
(16, 'Trần Đỗ Đăng Khoa', 'khoa@gmail.com', 'Sinh viên', '$2y$12$Meco5bH/sshgr9ctEepMRuEhPEQuUtYmg.aUAfsgixpjDio3XoyNK', NULL, '2024-04-21 22:41:19', '2024-05-17 01:12:51', '2024-05-17 01:12:51'),
(17, 'Trâng Quang Thạch', 'thach@gmail.com', 'Sinh viên', '$2y$12$5CXWCE5XJ6gLwWO9MlFNhO72cwNcUQJvIwOE0OG/K91JwUWnTsst2', NULL, '2024-04-21 22:42:04', '2024-05-27 01:56:55', NULL),
(18, 'Phạm Văn Quý', 'quy@gmail.com', 'Sinh viên', '$2y$12$1SvcSj/rkilkXioAzm2.xOAzrbi25lui1HmjINZ8zy2gqEpQydi8O', NULL, '2024-04-21 22:42:32', '2024-05-17 01:12:16', '2024-05-17 01:12:16'),
(19, 'Phạm Lê Minh Duy', 'duy.207CT68618@vanlanguni.vn', 'Sinh viên', NULL, '[{\"device_ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/126.0.0.0 Safari\\/537.36\",\"session_id\":\"6ob8IKXvKsYGs2z1NA8lC3KkcH7eOXi9i6G0SviS\"}]', '2024-05-01 01:03:00', '2024-06-21 23:25:10', NULL),
(20, 'Trần Văn B', 'vanB@vanlanguni.vn', 'Giảng viên', '$2y$12$D3OqIWOt/xfJN8Lil3y5zOk3T/5w8Tn8pwukkOfl3r.ox7ePMIlpW', NULL, '2024-05-04 22:55:27', '2024-06-03 00:37:56', '2024-06-03 00:37:56'),
(21, 'AdminHai', 'admin2@vanlanguni.vn', 'Admin', '$2y$12$eiNjRPzcf9.7XhjzPje2SOkJfJUpIhoLZ2lixSNkoMQRaUuIYK.GG', NULL, '2024-05-17 00:22:23', '2024-06-03 00:35:00', NULL),
(22, 'aaaa', 'a@gmail.com', 'Giảng viên', '$2y$12$ooX9ZBpgXDO7Q/N2R4.Kyu4fde4QIvknoYkw29vw09bIlH11EbZI6', NULL, '2024-05-17 01:15:49', '2024-05-17 01:17:21', '2024-05-17 01:17:21'),
(23, 'Phạm Minh Duy', 'duy.207CT68617@vanlanguni.vn', 'Sinh viên', NULL, NULL, '2024-05-17 01:19:19', '2024-06-03 00:39:06', NULL),
(24, '207CT68653 - Trần Công Minh - K26T-IT19', 'minh.207ct68653@vanlanguni.vn', 'Sinh viên', NULL, NULL, '2024-05-18 03:20:52', '2024-06-03 00:18:45', '2024-06-03 00:18:45'),
(25, 'ddddddd', 'dd@gmail.com', 'Sinh viên', '$2y$12$C0bgK1f.koOVnu7q1.zoP.WOI75lHsyfd8QUXNx6BDYw3WVMc90oS', NULL, '2024-05-26 22:31:22', '2024-05-26 22:32:43', '2024-05-26 22:32:43'),
(26, 'Nguyễn Văn A', 'nva@example.com', 'Sinh viên', NULL, NULL, '2024-05-27 02:00:02', '2024-06-03 00:15:56', '2024-06-03 00:15:56'),
(27, 'Trần Thị B', 'ttb@example.com', 'Giảng viên', NULL, NULL, '2024-05-27 02:00:02', '2024-06-03 00:12:40', '2024-06-03 00:12:40'),
(28, 'Lê Văn C', 'lvc@example.com', 'Chưa phân quyền', NULL, NULL, '2024-05-27 02:00:02', '2024-06-03 00:12:20', '2024-06-03 00:12:20'),
(29, 'aaaaa', 'aaaaaa@gmail.com', 'Giảng viên', '$2y$12$OMaFUlibFeD4jUKAH/lfxexI/nTvOKMwEbMVno6a3tzZuHpGtiqH.', NULL, '2024-06-03 00:20:56', '2024-06-03 00:21:04', '2024-06-03 00:21:04'),
(30, 'aaaaaaaaa', 'aaaaaa@gmail.com', 'Giảng viên', '$2y$12$2GfDW9XqOc76/Z/R.Yg91OB7jsey6ol8VRunuOK8N5lOtMvJVnAMC', NULL, '2024-06-03 00:21:56', '2024-06-03 00:22:05', '2024-06-03 00:22:05'),
(31, 'aaaaaaaaa', 'aaaaaa@gmail.com', 'Giảng viên', '$2y$12$tM0RlNUxrxiEdvT/R1LL4u4HEDZZasTq2jqeACjMH4IGvMTIvpz1K', NULL, '2024-06-03 00:23:15', '2024-06-03 00:28:32', '2024-06-03 00:28:32'),
(32, 'aaaaaaaaa', 'aaaaaa@gmail.com', 'Giảng viên', '$2y$12$pNgRwa13d9hwcc0T.hwTtOpEt50XmH.OKfa0vd.qiT1KkuN8Bs0E2', NULL, '2024-06-03 00:28:42', '2024-06-03 00:28:58', '2024-06-03 00:28:58'),
(33, 'aaaaaaaaa', 'aaaaaa@gmail.com', 'Giảng viên', '$2y$12$KF7ZROoMbeU.uThGEJZiHOCocYnmzvf9xDkJmu7R.Y6Te.FzsXiGi', NULL, '2024-06-03 00:32:18', '2024-06-03 00:33:13', '2024-06-03 00:33:13'),
(34, 'aaaaaaaaa', 'aaaaaa@gmail.com', 'Giảng viên', '$2y$12$R/ZhoVhl2.JoCZD78XjgDuH2DYR4o7t4vNq6T3ZPji7I2fceh/Rhe', NULL, '2024-06-03 00:34:09', '2024-06-03 00:34:17', '2024-06-03 00:34:17'),
(35, 'Nguyễn Văn G', 'nva@example.com', 'Sinh viên', NULL, NULL, '2024-06-15 05:24:25', '2024-06-15 05:24:25', NULL),
(36, 'Trần Thị B', 'ttb@example.com', 'Giảng viên', NULL, NULL, '2024-06-15 05:24:25', '2024-06-15 05:24:25', NULL),
(37, 'Lê Văn C', 'lvc@example.com', 'Chưa phân quyền', NULL, NULL, '2024-06-15 05:24:25', '2024-06-15 05:24:25', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2j8IBuluOoYNs5j5K8vCCuDPkOP7Wj03y0MQpMfc', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo2OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoxMTk6Imh0dHA6Ly9jYmU2LTEtNTMtNTEtMTY2Lm5ncm9rLWZyZWUuYXBwL3Npbmgtdmllbi9xdWFuLWx5L3F1YW4tbHktbGFtLWJhaS10aGktdHJhYy1uZ2hpZW0tc2luaC12aWVuLzYvTEhQX0NTREwvQlRfQ1NETC8xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IlkwaVdQZHRVRWhLekRZTkY4V3pkVEZENUlYTWVRTkNsRWNIUnpCU28iO3M6MTU6Im1pY3Jvc29mdF90b2tlbiI7czoyMTkwOiJleUowZVhBaU9pSktWMVFpTENKdWIyNWpaU0k2SWpkblYxQlJSM2xSYWxabldVSlBObVJWUlhVNVQwc3hjVkpYV1dsRE9IaFNVVFY1ZUV4Uk56Qm9OV01pTENKaGJHY2lPaUpTVXpJMU5pSXNJbmcxZENJNkluRTNVREZPZG5oMVIxRjNSRTR5VkdGcFRXOTJhbG80WVZwM2N5SXNJbXRwWkNJNkluRTNVREZPZG5oMVIxRjNSRTR5VkdGcFRXOTJhbG80WVZwM2N5SjkuZXlKaGRXUWlPaUl3TURBd01EQXdNeTB3TURBd0xUQXdNREF0WXpBd01DMHdNREF3TURBd01EQXdNREFpTENKcGMzTWlPaUpvZEhSd2N6b3ZMM04wY3k1M2FXNWtiM2R6TG01bGRDOHpNREV4WVRVMFlpMHdZVFZrTFRRNU1qa3RZbVl3TWkxaE1EQTNPRGM0Tnpkak5tRXZJaXdpYVdGMElqb3hOekU1TURNM01qRXdMQ0p1WW1ZaU9qRTNNVGt3TXpjeU1UQXNJbVY0Y0NJNk1UY3hPVEEwTVRFM01pd2lZV05qZENJNk1Dd2lZV055SWpvaU1TSXNJbUZwYnlJNklrRldVVUZ4THpoWVFVRkJRVmxaTnpONVJVY3ZWbmhxV1VsTGRYaGFRM0JEVlROWlVuWmFkVkZTU2xsMWJFZFFOSEUzWVVKVWN6bFljRVlyU0RWd1RtbFBRVzByUWxGMGFXUmxUVEJvU2pReWJGbHNTemxVYm5kc2VVUmhMMnBDSzFSck9HbEliVXRoYUZkclRqaE9WelpyUlUxTFUwTnpQU0lzSW1GdGNpSTZXeUp3ZDJRaUxDSnRabUVpWFN3aVlYQndYMlJwYzNCc1lYbHVZVzFsSWpvaVpHVnRiMTlzYjJkcGJpSXNJbUZ3Y0dsa0lqb2lObVkxTmpFM1pHTXROems1WmkwME9UZGxMV0kyTkRndE1UZGlNbVl4WTJNMk5XUTRJaXdpWVhCd2FXUmhZM0lpT2lJeElpd2labUZ0YVd4NVgyNWhiV1VpT2lKRWRYa2dMU0JMTWpaVUxVbFVNVGtpTENKbmFYWmxibDl1WVcxbElqb2lNakEzUTFRMk9EWXhPQ0F0SUZCbzRicWhiU0JNdzZvZ1RXbHVhQ0lzSW1sa2RIbHdJam9pZFhObGNpSXNJbWx3WVdSa2NpSTZJakV1TlRNdU5URXVNVFkySWl3aWJtRnRaU0k2SWpJd04wTlVOamcyTVRnZ0xTQlFhT0c2b1cwZ1RNT3FJRTFwYm1nZ1JIVjVJQzBnU3pJMlZDMUpWREU1SWl3aWIybGtJam9pT0RrelpqVTJNMk10WVRGbE9TMDBPRFpqTFRsa09ETXROekV3WXpkbU5EYzVZVGRrSWl3aWIyNXdjbVZ0WDNOcFpDSTZJbE10TVMwMUxUSXhMVE0xTXpZNU56Y3hPQzB5T1RJeE56QXdNVEEwTFRjNU9UZ3pPVEE1TFRFME9URTBPQ0lzSW5Cc1lYUm1Jam9pTXlJc0luQjFhV1FpT2lJeE1EQXpNakF3TUVWRFFqRXlSVGMwSWl3aWNtZ2lPaUl3TGtGV1VVRlRObFZTVFVZd1MwdFZiVjlCY1VGSWFEUmtPR0ZuVFVGQlFVRkJRVUZCUVhkQlFVRkJRVUZCUVVGRGFVRkRPQzRpTENKelkzQWlPaUp2Y0dWdWFXUWdjSEp2Wm1sc1pTQmxiV0ZwYkNJc0luTjFZaUk2SWt0RVgwbE5ZblJ3Y0VadVgxZE1ZMVZZV0dSa1RVUkxTM0ZMVW1OMldEVXhVMGxMUjNodE9YVkxRemdpTENKMFpXNWhiblJmY21WbmFXOXVYM05qYjNCbElqb2lRVk1pTENKMGFXUWlPaUl6TURFeFlUVTBZaTB3WVRWa0xUUTVNamt0WW1Zd01pMWhNREEzT0RjNE56ZGpObUVpTENKMWJtbHhkV1ZmYm1GdFpTSTZJbVIxZVM0eU1EZGpkRFk0TmpFNFFIWmhibXhoYm1kMWJta3VkbTRpTENKMWNHNGlPaUprZFhrdU1qQTNZM1EyT0RZeE9FQjJZVzVzWVc1bmRXNXBMblp1SWl3aWRYUnBJam9pUzB0RVMyNVhWMWgxUlVOMlFUVTBkRlV3VFVwQlFTSXNJblpsY2lJNklqRXVNQ0lzSW5kcFpITWlPbHNpWWpjNVptSm1OR1F0TTJWbU9TMDBOamc1TFRneE5ETXROelppTVRrMFpUZzFOVEE1SWwwc0luaHRjMTlwWkhKbGJDSTZJakVnTkNJc0luaHRjMTl6ZENJNmV5SnpkV0lpT2lJelFrODJiVVYxT0RsMGRFSjFXbWxJYWpORGVYaERkbVZ4UVRsVlVHMUJPVjl5WVc5emFIRlhjbGxqSW4wc0luaHRjMTkwWTJSMElqb3hNemN3TlRZNE9URTVmUS5lUzFuNFBkRzd2ZGx2bkpndU8zUmNfdUJ1cjY4aFdidzdfZjZrX0xqVDFiekJKSVY0VXBpWGtXd3pPY0p0U3ZrYUFrQ3FYUTdQQVdsQ0kzWXJOSFYwXzVnRGNjb1lxRGd1RUVwcFpVSVE3cVNSbEZiY2ktUUwyam1qdFNlRGlBbUxIR1NGbnowX3U1X2pHN2xqT2dIRnltVzV0MDlZeHIwbzZPUkw1RzlGUnlqWDl6bFJJSVBPM3lhNnR0MzhWV1Q4SmNmbHcyalpDVUJzSllEUkhfTU9qYXA0eFk0Z1lVT0VkMWZnQ0R2azJDRkdTSEVxb1B1bkZPNXB0ZFNQSU1IVEt4bFVNQi1WV1I5VHNKMzFULTRGZ2JZc3RxVUQzdDQ0dFFURWJ2UFc5VlFjUnM2M3ZsczBGOW1NM3VWdkEyUDF5T1J6OTVyQzZYNjFtcnpSelN2a3ciO3M6NDoidXNlciI7YToxNTp7czozOiJhdWQiO3M6MzY6IjZmNTYxN2RjLTc5OWYtNDk3ZS1iNjQ4LTE3YjJmMWNjNjVkOCI7czozOiJpc3MiO3M6NzU6Imh0dHBzOi8vbG9naW4ubWljcm9zb2Z0b25saW5lLmNvbS8zMDExYTU0Yi0wYTVkLTQ5MjktYmYwMi1hMDA3ODc4NzdjNmEvdjIuMCI7czozOiJpYXQiO2k6MTcxOTAzNzIxMDtzOjM6Im5iZiI7aToxNzE5MDM3MjEwO3M6MzoiZXhwIjtpOjE3MTkwNDExMTA7czozOiJhaW8iO3M6MTQwOiJBV1FBbS84WEFBQUFQWVpvTnZmcUdNbzNOT1RlcGJsY05RZXAvTDJta0tuNXN3SnAyeS8yTEwzeUZ3ZlZlcGpHa2t2NmNzL2ZDUTNNbUlFOHJRVHU1OEUvaE85a2ZKQ1g4clk2QkwvbEhVc0E1UmdLc1FFajlPOUUrdGRGZW13SGplSnJ6eUd3S0dJQyI7czo0OiJuYW1lIjtzOjQ0OiIyMDdDVDY4NjE4IC0gUGjhuqFtIEzDqiBNaW5oIER1eSAtIEsyNlQtSVQxOSI7czo1OiJub25jZSI7czo0MDoiemJKb2xiTzIzejN5UjQxVmRLUVFMc2xjZzFEdnBUYWNZQUZkeEt2YyI7czozOiJvaWQiO3M6MzY6Ijg5M2Y1NjNjLWExZTktNDg2Yy05ZDgzLTcxMGM3ZjQ3OWE3ZCI7czoxODoicHJlZmVycmVkX3VzZXJuYW1lIjtzOjI4OiJkdXkuMjA3Y3Q2ODYxOEB2YW5sYW5ndW5pLnZuIjtzOjI6InJoIjtzOjU0OiIwLkFWUUFTNlVSTUYwS0tVbV9BcUFIaDRkOGF0d1hWbS1mZVg1SnRrZ1hzdkhNWmRpaUFDOC4iO3M6Mzoic3ViIjtzOjQzOiIzQk82bUV1ODl0dEJ1WmlIajNDeXhDdmVxQTlVUG1BOV9yYW9zaHFXclljIjtzOjM6InRpZCI7czozNjoiMzAxMWE1NGItMGE1ZC00OTI5LWJmMDItYTAwNzg3ODc3YzZhIjtzOjM6InV0aSI7czoyMjoiS0tES25XV1h1RUN2QTU0dFUwTUpBQSI7czozOiJ2ZXIiO3M6MzoiMi4wIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTk7fQ==', 1719037540),
('MYMGO90rvzZr223dyCRryicxn1d52gbuuRRw4gE7', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid3ZqUEhXMmN1R2FTRVJSUUd2YnRiWWpzaE1XR1NxUzJhSHBQVmdteSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9naWFuZy12aWVuL3F1YW4tbHkvYmFuZy10aGVvLWRvaS8yMS9MSFBfQ1NETC9CVF9DU0RMLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDt9', 1719037534),
('yxnOBc4or3nPhmJpc4m9u4UPnxesdydge3UYHaeO', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVnBzaWU4NWlIZzY3YUNpRzZDTEkweXJrQXRwNlQxMTVxck5YZ21hQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU1OiJodHRwOi8vY2JlNi0xLTUzLTUxLTE2Ni5uZ3Jvay1mcmVlLmFwcC9kYW5nLW5oYXAtdmFuLWxhbmcvZHV5LjIwN2N0Njg2MThAdmFubGFuZ3VuaS52bi8yMDdDVDY4NjE4JTIwLSUyMFBoJUUxJUJBJUExbSUyMEwlQzMlQUElMjBNaW5oJTIwRHV5JTIwLSUyMEsyNlQtSVQxOSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTU6Im1pY3Jvc29mdF90b2tlbiI7czoyMjIzOiJleUowZVhBaU9pSktWMVFpTENKdWIyNWpaU0k2SWxoNlRVVm1UamRyTVRkdVRIQm1kMko2TkRkM2FETjBhVlJHYkRWWFVreE9iREpXTkdsRGVGVk9kRzhpTENKaGJHY2lPaUpTVXpJMU5pSXNJbmcxZENJNkluRTNVREZPZG5oMVIxRjNSRTR5VkdGcFRXOTJhbG80WVZwM2N5SXNJbXRwWkNJNkluRTNVREZPZG5oMVIxRjNSRTR5VkdGcFRXOTJhbG80WVZwM2N5SjkuZXlKaGRXUWlPaUl3TURBd01EQXdNeTB3TURBd0xUQXdNREF0WXpBd01DMHdNREF3TURBd01EQXdNREFpTENKcGMzTWlPaUpvZEhSd2N6b3ZMM04wY3k1M2FXNWtiM2R6TG01bGRDOHpNREV4WVRVMFlpMHdZVFZrTFRRNU1qa3RZbVl3TWkxaE1EQTNPRGM0Tnpkak5tRXZJaXdpYVdGMElqb3hOekU1TURNM01UazBMQ0p1WW1ZaU9qRTNNVGt3TXpjeE9UUXNJbVY0Y0NJNk1UY3hPVEEwTWpZNE1pd2lZV05qZENJNk1Dd2lZV055SWpvaU1TSXNJbUZwYnlJNklrRldVVUZ4THpoWVFVRkJRVVJMVW5ObmRtRnFaVkpaYmpVd1J6TlFlRkZJZDFGek1sWnVPRWR5T0dwSWNscDRRbk5vWmpCd2IzbEJXbk4zYXpaVldIRlFWa2szUWtWM1lVZDBRWE5pVGlzNVVTOVRjR2xHWlVwRGFGSk9kRVZRWXpOUFQwTmxkR3MyVFZwNllrTnNNelpqVUZSME9UVlpQU0lzSW1GdGNpSTZXeUp3ZDJRaUxDSnRabUVpWFN3aVlYQndYMlJwYzNCc1lYbHVZVzFsSWpvaVpHVnRiMTlzYjJkcGJpSXNJbUZ3Y0dsa0lqb2lObVkxTmpFM1pHTXROems1WmkwME9UZGxMV0kyTkRndE1UZGlNbVl4WTJNMk5XUTRJaXdpWVhCd2FXUmhZM0lpT2lJeElpd2labUZ0YVd4NVgyNWhiV1VpT2lKRWRYa2dMU0JMTWpaVUxVbFVNVGtpTENKbmFYWmxibDl1WVcxbElqb2lNakEzUTFRMk9EWXhPQ0F0SUZCbzRicWhiU0JNdzZvZ1RXbHVhQ0lzSW1sa2RIbHdJam9pZFhObGNpSXNJbWx3WVdSa2NpSTZJakV1TlRNdU5URXVNVFkySWl3aWJtRnRaU0k2SWpJd04wTlVOamcyTVRnZ0xTQlFhT0c2b1cwZ1RNT3FJRTFwYm1nZ1JIVjVJQzBnU3pJMlZDMUpWREU1SWl3aWIybGtJam9pT0RrelpqVTJNMk10WVRGbE9TMDBPRFpqTFRsa09ETXROekV3WXpkbU5EYzVZVGRrSWl3aWIyNXdjbVZ0WDNOcFpDSTZJbE10TVMwMUxUSXhMVE0xTXpZNU56Y3hPQzB5T1RJeE56QXdNVEEwTFRjNU9UZ3pPVEE1TFRFME9URTBPQ0lzSW5Cc1lYUm1Jam9pTXlJc0luQjFhV1FpT2lJeE1EQXpNakF3TUVWRFFqRXlSVGMwSWl3aWNtZ2lPaUl3TGtGV1VVRlRObFZTVFVZd1MwdFZiVjlCY1VGSWFEUmtPR0ZuVFVGQlFVRkJRVUZCUVhkQlFVRkJRVUZCUVVGRGFVRkRPQzRpTENKelkzQWlPaUp2Y0dWdWFXUWdjSEp2Wm1sc1pTQmxiV0ZwYkNJc0luTnBaMjVwYmw5emRHRjBaU0k2V3lKcmJYTnBJbDBzSW5OMVlpSTZJa3RFWDBsTlluUndjRVp1WDFkTVkxVllXR1JrVFVSTFMzRkxVbU4yV0RVeFUwbExSM2h0T1hWTFF6Z2lMQ0owWlc1aGJuUmZjbVZuYVc5dVgzTmpiM0JsSWpvaVFWTWlMQ0owYVdRaU9pSXpNREV4WVRVMFlpMHdZVFZrTFRRNU1qa3RZbVl3TWkxaE1EQTNPRGM0Tnpkak5tRWlMQ0oxYm1seGRXVmZibUZ0WlNJNkltUjFlUzR5TURkamREWTROakU0UUhaaGJteGhibWQxYm1rdWRtNGlMQ0oxY0c0aU9pSmtkWGt1TWpBM1kzUTJPRFl4T0VCMllXNXNZVzVuZFc1cExuWnVJaXdpZFhScElqb2lja1ZwVEhoV2NGWkxhM0U0ZWpoV1pFeHpZMmRCUVNJc0luWmxjaUk2SWpFdU1DSXNJbmRwWkhNaU9sc2lZamM1Wm1KbU5HUXRNMlZtT1MwME5qZzVMVGd4TkRNdE56WmlNVGswWlRnMU5UQTVJbDBzSW5odGMxOXBaSEpsYkNJNklqRWdNaklpTENKNGJYTmZjM1FpT25zaWMzVmlJam9pTTBKUE5tMUZkVGc1ZEhSQ2RWcHBTR296UTNsNFEzWmxjVUU1VlZCdFFUbGZjbUZ2YzJoeFYzSlpZeUo5TENKNGJYTmZkR05rZENJNk1UTTNNRFUyT0RreE9YMC4xdDJCR1pyVjhYQVN2UXdWUzVYSkthVE9oR2I5bTFheWgtUV8zaVlydzVOQ2JaZGs4aXlLT2h6OTBHaGFaRFVvQ1dOY1JrdlM3Mng1V3dISzZ5YUZiUVE5TWZkc0oxMk1tSzMzRDhPTHhlUnRhQkRtZTl4SUljN2twZjhQU1hJRzQzWi0zNHMyZURZeF90V3JfM2dubjZVeE9CcFE4czNaUWFETmpWRG5oY204T0VpMzllc3VKa2dIY3lXMFlZQ29iTzJGNldSZG9FM25YVDZINWpyZ05iVFhhbzFaUVphM1JONWlydmZlUVQ0RXd5aFJhQ3NWbm1wZHZmWnk1cndLMHV0U1c3bkRHckU0LURsTUpMSjRWWGlTVjdsbkpQN2pfbUEzekVlbkdvOGo2cTRHTmlFM3BiR3ZnTWZhbU1lUUt4bzJJSndjMjFQWXpYUEdlZl9MUlEiO3M6NDoidXNlciI7YToxNTp7czozOiJhdWQiO3M6MzY6IjZmNTYxN2RjLTc5OWYtNDk3ZS1iNjQ4LTE3YjJmMWNjNjVkOCI7czozOiJpc3MiO3M6NzU6Imh0dHBzOi8vbG9naW4ubWljcm9zb2Z0b25saW5lLmNvbS8zMDExYTU0Yi0wYTVkLTQ5MjktYmYwMi1hMDA3ODc4NzdjNmEvdjIuMCI7czozOiJpYXQiO2k6MTcxOTAzNzE5NDtzOjM6Im5iZiI7aToxNzE5MDM3MTk0O3M6MzoiZXhwIjtpOjE3MTkwNDEwOTQ7czozOiJhaW8iO3M6MTQwOiJBV1FBbS84WEFBQUExZlpob0taSW5jUGJZb21ia1JKb0FHeWJ5NnBFSFRyWldQaDNpWUZRMkplSHZCbGU0dnl0dHMzV0M0YWREdXVwK05BQXp6Wk9SMk0rWUVncGZoQTNUMkdycWhNaVIzSERCNVpLdmxrb0NRc1JLdjN5S2RFaWcvcXNBWnhpUEFaSyI7czo0OiJuYW1lIjtzOjQ0OiIyMDdDVDY4NjE4IC0gUGjhuqFtIEzDqiBNaW5oIER1eSAtIEsyNlQtSVQxOSI7czo1OiJub25jZSI7czo0MDoiT05ocEgzSTNlSThnODVTdzZ6SEJoTDVlZ3NFcldvdlJuUVBMREx1NCI7czozOiJvaWQiO3M6MzY6Ijg5M2Y1NjNjLWExZTktNDg2Yy05ZDgzLTcxMGM3ZjQ3OWE3ZCI7czoxODoicHJlZmVycmVkX3VzZXJuYW1lIjtzOjI4OiJkdXkuMjA3Y3Q2ODYxOEB2YW5sYW5ndW5pLnZuIjtzOjI6InJoIjtzOjU0OiIwLkFWUUFTNlVSTUYwS0tVbV9BcUFIaDRkOGF0d1hWbS1mZVg1SnRrZ1hzdkhNWmRpaUFDOC4iO3M6Mzoic3ViIjtzOjQzOiIzQk82bUV1ODl0dEJ1WmlIajNDeXhDdmVxQTlVUG1BOV9yYW9zaHFXclljIjtzOjM6InRpZCI7czozNjoiMzAxMWE1NGItMGE1ZC00OTI5LWJmMDItYTAwNzg3ODc3YzZhIjtzOjM6InV0aSI7czoyMjoickVpTHhWcFZLa3E4ejhWZExzY2dBQSI7czozOiJ2ZXIiO3M6MzoiMi4wIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTk7fQ==', 1719037494);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinh_vien`
--

CREATE TABLE `sinh_vien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_sinh_vien` varchar(255) DEFAULT NULL,
  `ten_sinh_vien` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `ma_khoa` varchar(255) DEFAULT NULL,
  `ma_nganh` varchar(255) DEFAULT NULL,
  `bai_thi` longtext DEFAULT NULL,
  `state` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinh_vien`
--

INSERT INTO `sinh_vien` (`id`, `ma_sinh_vien`, `ten_sinh_vien`, `so_dien_thoai`, `email`, `ngay_sinh`, `ma_khoa`, `ma_nganh`, `bai_thi`, `state`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '207CT68618', 'Phạm Lê Minh Duy2', '0833299959', 'duy123@gmail.com', '2002-07-17', 'MI', 'CNTT15', NULL, NULL, '2024-03-20 21:25:34', '2024-03-27 21:03:19', '2024-03-27 21:03:19'),
(2, '207CT68617', 'Phạm Lê Minh Duy2', '055402654898', 'duy@gmail.com', '2014-02-05', 'CNTT', 'CNTT1', NULL, NULL, '2024-03-24 22:27:14', '2024-03-27 21:03:17', '2024-03-27 21:03:17'),
(3, '207CT68618', 'Phạm Lê Minh Duy', '055402654898', 'duy.207CT68618@vanlanguni.vn', '2013-05-26', 'CNTT', 'CNTT1', NULL, NULL, '2024-03-24 22:32:53', '2024-03-27 21:03:15', '2024-03-27 21:03:15'),
(4, '207CT11248', 'Duy', '01542354215', 'duy6@gmail.com', '2014-02-05', 'CNTT', 'CNTT1', NULL, NULL, '2024-03-27 21:01:56', '2024-03-27 21:03:13', '2024-03-27 21:03:13'),
(5, '207CT68618', 'Hoàng Vĩnh Huy', '0833299959', 'duy@gmail.com', '2002-07-17', 'CNTT', 'CNPM', NULL, NULL, '2024-03-27 21:05:12', '2024-05-04 22:57:18', '2024-05-04 22:57:18'),
(6, '207CT68618', 'Phạm Lê Minh Duy', '0833299958', 'duy.207CT68618@vanlanguni.vn', '2014-02-05', 'CNTT', 'CNPM', NULL, '[{\"ma_lop_hoc_phan\":\"LHP_CSDL\",\"lan_thi\":\"1\",\"ma_bai_thi\":\"BT_CSDL\",\"state\":\"Ch\\u01b0a l\\u00e0m\"}]', '2024-03-27 21:11:07', '2024-06-21 23:25:34', NULL),
(7, '207CT68641', 'Phạm Lê Minh Huy', '0833295626', 'duyxau@gmail.com', '2014-02-05', 'CNTT', 'CNPM', NULL, NULL, '2024-03-30 01:53:07', '2024-03-30 01:53:07', NULL),
(8, '207CT67641', 'Trần Công Minh', '0833274159', 'duy123dan@gmail.com', '2002-07-17', 'CNTT', 'CNPM', NULL, NULL, '2024-03-30 01:53:33', '2024-03-30 01:55:21', NULL),
(9, '207CT54641', 'Phạm Lê Minh Dj', '0833234959', 'duydit3@gmail.com', '2002-07-17', 'CNTT', 'CNPM', NULL, NULL, '2024-03-30 01:54:08', '2024-03-30 01:54:08', NULL),
(10, '207CT68611', 'Phạm Lê Minh Duy', '0833299951', 'minhduy00007@gmail.com', '2024-04-08', 'CNTT', 'CNPM', NULL, '[{\"ma_lop_hoc_phan\":\"LHP_CSDL\",\"lan_thi\":\"1\",\"ma_bai_thi\":\"BT_CSDL\",\"state\":\"\\u0110\\u00e3 n\\u1ed9p\"}]', '2024-04-18 05:50:08', '2024-06-14 23:33:49', NULL),
(11, '207CT68653', 'Trần Công Minh', NULL, 'minh.207ct68653@vanlanguni.vn', NULL, NULL, NULL, NULL, NULL, '2024-05-26 22:30:40', '2024-05-26 22:30:40', NULL),
(12, 'SV001', 'Nguyễn Văn A', '0901234567', 'nva@example.com', '2000-01-01', 'CNTT', 'CNPM', NULL, NULL, '2024-05-27 00:19:36', '2024-05-27 00:19:36', NULL),
(13, 'SV002', 'Trần Thị B', '0902345678', 'ttb@example.com', '2000-01-02', 'CNTT', 'CNPM', NULL, NULL, '2024-05-27 00:19:36', '2024-05-27 00:19:36', NULL),
(14, 'SV003', 'Lê Văn C', '0903456789', 'lvc@example.com', '2000-01-03', 'CNTT', 'CNPM', NULL, NULL, '2024-05-27 00:19:36', '2024-05-27 00:19:36', NULL),
(15, 'Guest12', 'Phạm Lê Minh Duy', NULL, 'duy00007@gmail.com', NULL, NULL, NULL, NULL, NULL, '2024-05-27 01:36:41', '2024-05-27 01:36:41', NULL),
(16, 'Guest98', 'Trần Công Minh', NULL, 'minh@gmail.com', NULL, NULL, NULL, NULL, NULL, '2024-05-27 01:37:50', '2024-05-27 01:37:50', NULL),
(17, 'Guest66', 'Trâng Quang Thạch', NULL, 'thach@gmail.com', NULL, NULL, NULL, NULL, NULL, '2024-05-27 01:51:38', '2024-05-27 01:56:35', '2024-05-27 01:56:35'),
(18, 'Guest54', 'Trâng Quang Thạch', NULL, 'thach@gmail.com', NULL, NULL, NULL, NULL, NULL, '2024-05-27 01:56:55', '2024-05-27 01:56:55', NULL),
(19, 'Guest44', 'Phạm Minh Duyq', NULL, 'duy.207CT68617@vanlanguni.vn', NULL, NULL, NULL, NULL, NULL, '2024-06-03 00:38:59', '2024-06-03 00:38:59', NULL),
(20, 'Guest47', 'Hoàng Vĩnh Tiến', NULL, 'tien@gmail.com', NULL, NULL, NULL, NULL, '[{\"ma_lop_hoc_phan\":\"LHP_CSDL\",\"lan_thi\":\"1\",\"ma_bai_thi\":\"BT_CSDL\",\"state\":\"\\u0110\\u00e3 n\\u1ed9p\"}]', '2024-06-05 23:07:30', '2024-06-15 01:09:16', NULL);

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
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
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
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `giang_vien`
--
ALTER TABLE `giang_vien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `ket_qua`
--
ALTER TABLE `ket_qua`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `lop_hoc_phan`
--
ALTER TABLE `lop_hoc_phan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nganh`
--
ALTER TABLE `nganh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
