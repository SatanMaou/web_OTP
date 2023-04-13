-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2022 lúc 05:30 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `otp_yte`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `medical_information`
--

CREATE TABLE `medical_information` (
  `ID` int(11) NOT NULL,
  `MaYTE` varchar(200) NOT NULL,
  `medical_record` varchar(200) NOT NULL,
  `time` date NOT NULL,
  `pathPDF` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `medical_information`
--

INSERT INTO `medical_information` (`ID`, `MaYTE`, `medical_record`, `time`, `pathPDF`) VALUES
(1, 'minh', 'stress', '2015-12-09', ''),
(2, 'ok', 'thieu ngu', '2022-12-03', 'BaiTap2.pdf'),
(3, 'ok', 'kiet suc', '2022-12-03', 'test.pdf'),
(4, 'minh', 'dau nhuc', '2022-12-01', ''),
(5, 'ok', 'stress', '2022-12-02', 'linux_5.pdf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `otp`
--

CREATE TABLE `otp` (
  `MaYTE` varchar(200) NOT NULL,
  `MaOTP` int(11) NOT NULL,
  `sdt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `otp`
--

INSERT INTO `otp` (`MaYTE`, `MaOTP`, `sdt`) VALUES
('minh', 9779, '0389389209'),
('ok', 1267, '0907082637'),
('Oknguyen', 6705, '0678954321'),
('toan', 7582, '0123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `security`
--

CREATE TABLE `security` (
  `ApiKey` text NOT NULL,
  `SecretKey` text NOT NULL,
  `Brandname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `security`
--

INSERT INTO `security` (`ApiKey`, `SecretKey`, `Brandname`) VALUES
('C671FB9BF15391FA5FFC62A3AC9A34', 'D3C47022E82732DD589C9E2AC56742', 'DKQT.SAIGON');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `medical_information`
--
ALTER TABLE `medical_information`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaYTE` (`MaYTE`);

--
-- Chỉ mục cho bảng `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`MaYTE`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `medical_information`
--
ALTER TABLE `medical_information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `medical_information`
--
ALTER TABLE `medical_information`
  ADD CONSTRAINT `medical_information_ibfk_1` FOREIGN KEY (`MaYTE`) REFERENCES `otp` (`MaYTE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
