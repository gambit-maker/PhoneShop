-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 03:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bandienthoai`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaChiTietDonHang` int(10) NOT NULL,
  `MaDonHang` int(10) NOT NULL,
  `MaDienThoai` int(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `DonGia` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaChiTietDonHang`, `MaDonHang`, `MaDienThoai`, `SoLuong`, `DonGia`) VALUES
(52, 39, 9, 1, 12200000),
(53, 39, 3, 1, 15000000),
(62, 43, 2, 3, 5000000),
(63, 43, 13, 1, 900000),
(64, 43, 11, 1, 13500000),
(65, 44, 3, 1, 15000000),
(66, 44, 10, 1, 4500000),
(67, 45, 7, 1, 20000000),
(68, 45, 4, 1, 6000000),
(69, 45, 1, 1, 12000000),
(73, 47, 6, 1, 13500000),
(74, 47, 4, 1, 6000000),
(75, 48, 13, 1, 900000),
(76, 48, 5, 4, 3500000),
(77, 48, 12, 2, 7000000),
(78, 49, 2, 3, 5000000),
(79, 49, 4, 2, 6000000),
(80, 49, 11, 2, 13500000),
(81, 50, 1, 2, 12000000),
(82, 50, 5, 2, 3500000),
(83, 50, 2, 1, 5000000),
(84, 50, 11, 2, 13500000),
(85, 51, 7, 2, 20000000),
(86, 51, 8, 1, 2500000),
(89, 53, 12, 1, 7000000),
(90, 53, 7, 1, 20000000),
(94, 57, 1, 9, 12000000),
(95, 57, 5, 7, 3500000),
(96, 57, 9, 1, 12200000),
(97, 57, 13, 1, 900000),
(98, 58, 5, 1, 3500000),
(99, 58, 1, 1, 12000000),
(101, 60, 1, 1, 12000000),
(102, 60, 5, 1, 3500000),
(103, 60, 11, 1, 13500000);

-- --------------------------------------------------------

--
-- Table structure for table `dienthoai`
--

CREATE TABLE `dienthoai` (
  `MaDienThoai` int(10) NOT NULL,
  `TenDienThoai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaHang` int(10) NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GiaTien` int(10) NOT NULL,
  `MoTa` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `DaBan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dienthoai`
--

INSERT INTO `dienthoai` (`MaDienThoai`, `TenDienThoai`, `MaHang`, `img`, `GiaTien`, `MoTa`, `SoLuong`, `DaBan`) VALUES
(1, 'Samsung Galaxy 10', 1, './assets/products/1.png', 12000000, 'Samsung Galaxy Note 10 và Samsung Galaxy Note 10+ là bộ đôi điện thoại thông minh cao cấp, sử dụng hệ điều hành Android; được sản xuất, phát hành và đưa ra thị trường bởi Samsung Electronics bắt đầu v', 100, 10),
(2, 'Redmi Note 6', 2, './assets/products/3.png', 5000000, 'Redmi Note 6 là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích', 0, 10),
(3, 'Redmi Note 7', 2, './assets/products/2.png', 15000000, 'Redmi Note 7 là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích', 0, 1),
(4, 'Redmi Note 5', 2, './assets/products/4.png', 6000000, 'Redmi Note 5 là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích', 0, 10),
(5, 'Redmi Note 4', 2, './assets/products/5.png', 3500000, 'Redmi Note 4 là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích', 19, 11),
(6, 'Redmi Note 8', 2, './assets/products/6.png', 13500000, 'Redmi Note 8 là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích', 31, 0),
(7, 'Redmi Note 9', 2, './assets/products/8.png', 20000000, 'Redmi Note 9 là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích', 44, 0),
(8, 'Redmi Note', 2, './assets/products/10.png', 2500000, 'Redmi Note là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích h', 21, 0),
(9, 'Samsung Galaxy S6', 1, './assets/products/11.png', 12200000, 'Samsung Galaxy S6 series là dòng thiết bị di động cao cấp chạy Android được sản xuất bởi Samsung Electronics. Series bao gồm ban đầu là điện thoại thông minh và thiết bị đầu tiên, Samsung Galaxy S, đư', 70, 0),
(10, 'Samsung Galaxy S7', 1, './assets/products/12.png', 4500000, 'Samsung Galaxy S7 series là dòng thiết bị di động cao cấp chạy Android được sản xuất bởi Samsung Electronics. Series bao gồm ban đầu là điện thoại thông minh và thiết bị đầu tiên, Samsung Galaxy S, đư', 89, 1),
(11, 'Apple iPhone 5', 3, './assets/products/13.png', 13500000, 'Iphone 5 là một điện thoại thông minh được Apple Inc. thiết kế, phát triển và đưa ra thị trường vào ngày 3 tháng 11 năm 2017. Nó được Giám đốc điều hành Tim Cook công bố vào ngày 12 tháng 9 năm 2017, ', 23, 0),
(12, 'Apple iPhone 6', 3, './assets/products/14.png', 7000000, 'Iphone 6 là một điện thoại thông minh được Apple Inc. thiết kế, phát triển và đưa ra thị trường vào ngày 3 tháng 11 năm 2017. Nó được Giám đốc điều hành Tim Cook công bố vào ngày 12 tháng 9 năm 2017, ', 232, 0),
(13, 'Apple iPhone 7', 3, './assets/products/15.png', 900000, 'Iphone 7 là một điện thoại thông minh được Apple Inc. thiết kế, phát triển và đưa ra thị trường vào ngày 3 tháng 11 năm 2017. Nó được Giám đốc điều hành Tim Cook công bố vào ngày 12 tháng 9 năm 2017, ', 100, 0),
(21, 'IPhone 12 ProMax', 8, './assets/products/ip12.png', 30000000, 'Iphone 12 ProMaximum', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(10) NOT NULL,
  `MaKhachHang` int(10) NOT NULL,
  `NgayDat` date NOT NULL,
  `TongTien` int(20) NOT NULL,
  `TrangThai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `MaKhachHang`, `NgayDat`, `TongTien`, `TrangThai`) VALUES
(39, 2, '2021-01-21', 27200000, 3),
(43, 3, '2021-01-23', 29400000, 3),
(44, 3, '2021-01-23', 19500000, 3),
(45, 3, '2021-02-23', 38000000, 3),
(47, 8, '2021-01-23', 19500000, 0),
(48, 9, '2021-01-24', 28900000, 1),
(49, 10, '2021-01-24', 54000000, 1),
(50, 11, '2021-01-24', 63000000, 3),
(51, 2, '2021-01-24', 42500000, 3),
(53, 2, '2021-01-24', 27000000, 3),
(57, 2, '2021-01-24', 145600000, 0),
(58, 2, '2021-01-24', 15500000, 1),
(60, 2, '2021-01-24', 29000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MaGioHang` int(10) NOT NULL,
  `MaTaiKhoan` int(10) NOT NULL,
  `MaSanPham` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`MaGioHang`, `MaTaiKhoan`, `MaSanPham`) VALUES
(223, 10, 2),
(224, 10, 1),
(225, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

CREATE TABLE `hang` (
  `MaHang` int(10) NOT NULL,
  `TenHang` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`MaHang`, `TenHang`) VALUES
(1, 'Samsung'),
(2, 'Redmi'),
(3, 'Apple'),
(5, 'Xiaomia'),
(8, 'IPhone');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(10) NOT NULL,
  `TenDangNhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Admin` bit(1) NOT NULL,
  `DienThoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `TenDangNhap`, `MatKhau`, `Admin`, `DienThoai`, `DiaChi`) VALUES
(1, 'admin', '123', b'1', '0909123456', 'Wasinton BC 150 RalWay'),
(2, 'tester1', '123', b'0', '0791238291', 'Nha trang Khánh hòa, số 30 đương yearsin'),
(3, 'tester2', '123', b'0', '123', '123'),
(5, 'tester123', '123', b'0', '1233', '123'),
(7, 'tester3', '123', b'0', '123', '123'),
(8, 'tester4', '123', b'0', '123', '123'),
(9, 'test5', '123', b'0', '123', '123'),
(10, 'tester6', '123', b'0', '123', '123'),
(11, 'tester7', '123', b'0', '12312312', '123asdasdasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaChiTietDonHang`),
  ADD KEY `fk_MaDienThoai_DienThoai` (`MaDienThoai`),
  ADD KEY `fk_MaDonHang_DonHang` (`MaDonHang`);

--
-- Indexes for table `dienthoai`
--
ALTER TABLE `dienthoai`
  ADD PRIMARY KEY (`MaDienThoai`),
  ADD KEY `fk_MaHang_Hang` (`MaHang`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `fk_DonHang_TaiKhoan` (`MaKhachHang`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGioHang`),
  ADD KEY `fk_giohang_taikhoan` (`MaTaiKhoan`),
  ADD KEY `fk_giohang_sanpham` (`MaSanPham`);

--
-- Indexes for table `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`MaHang`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaChiTietDonHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `dienthoai`
--
ALTER TABLE `dienthoai`
  MODIFY `MaDienThoai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGioHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `hang`
--
ALTER TABLE `hang`
  MODIFY `MaHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_MaDienThoai_DienThoai` FOREIGN KEY (`MaDienThoai`) REFERENCES `dienthoai` (`MaDienThoai`),
  ADD CONSTRAINT `fk_MaDonHang_DonHang` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`) ON DELETE CASCADE;

--
-- Constraints for table `dienthoai`
--
ALTER TABLE `dienthoai`
  ADD CONSTRAINT `fk_MaHang_Hang` FOREIGN KEY (`MaHang`) REFERENCES `hang` (`MaHang`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_DonHang_TaiKhoan` FOREIGN KEY (`MaKhachHang`) REFERENCES `taikhoan` (`MaTaiKhoan`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_giohang_sanpham` FOREIGN KEY (`MaSanPham`) REFERENCES `dienthoai` (`MaDienThoai`),
  ADD CONSTRAINT `fk_giohang_taikhoan` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
