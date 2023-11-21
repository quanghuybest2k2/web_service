-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2022 lúc 05:25 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `restful_api`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi`
--

CREATE TABLE `cauhoi` (
  `id_cauhoi` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cau_a` varchar(200) NOT NULL,
  `cau_b` varchar(200) NOT NULL,
  `cau_c` varchar(200) NOT NULL,
  `cau_d` varchar(200) NOT NULL,
  `cau_dung` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cauhoi`
--

INSERT INTO `cauhoi` (`id_cauhoi`, `title`, `cau_a`, `cau_b`, `cau_c`, `cau_d`, `cau_dung`) VALUES
(1, 'Cầu thủ nào có 7 quả bóng vàng trong sự nghiệp?', 'Lionel Messi', 'Cristiano Ronaldo', 'David Beckham', 'Harry Maguire', 'cau_a'),
(2, 'Sơn Tùng M-TP sinh năm bao nhiêu?', '2002', '1998', '1994', '1996', 'cau_c'),
(3, 'Đoàn Quang Huy sinh năm bao nhiêu?', '2003', '2002', '2001', '2000', 'cau_b'),
(4, 'Gà có mấy ngón chân', '1', '2', '3', '4', 'cau_d');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`id_cauhoi`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `id_cauhoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
