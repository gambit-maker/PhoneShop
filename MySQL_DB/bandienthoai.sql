-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 09:32 AM
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
(53, 39, 3, 1, 15000000);

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
  `SoLuong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dienthoai`
--

INSERT INTO `dienthoai` (`MaDienThoai`, `TenDienThoai`, `MaHang`, `img`, `GiaTien`, `MoTa`, `SoLuong`) VALUES
(1, 'Samsung Galaxy 10', 1, './assets/products/1.png', 12000000, 'Samsung Galaxy Note 10 và Samsung Galaxy Note 10+ là bộ đôi điện thoại thông minh cao cấp, sử dụng hệ điều hành Android; được sản xuất, phát hành và đưa ra thị trường bởi Samsung Electronics bắt đầu v', 13),
(2, 'Redmi Note 6', 2, './assets/products/3.png', 5000000, 'Redmi Note 6 là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích', 6),
(3, 'Redmi Note 7', 2, './assets/products/2.png', 15000000, 'Redmi Note 7 là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích', 12),
(4, 'Redmi Note 5', 2, './assets/products/4.png', 6000000, 'Redmi Note 5 là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích', 3),
(5, 'Redmi Note 4', 2, './assets/products/5.png', 3500000, 'Redmi Note 4 là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích', 9),
(6, 'Redmi Note 8', 2, './assets/products/6.png', 13500000, 'Redmi Note 8 là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích', 10),
(7, 'Redmi Note 9', 2, './assets/products/8.png', 20000000, 'Redmi Note 9 là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích', 8),
(8, 'Redmi Note', 2, './assets/products/10.png', 2500000, 'Redmi Note là dòng điện thoại thông minh được phát hành bởi Redmi, một thương hiệu con của Xiaomi. Hầu hết các biến thể của điện thoại đều có camera cảm biến 48MP [5] Biến thể Redmi Note 7 được tích h', 11),
(9, 'Samsung Galaxy S6', 1, './assets/products/11.png', 12200000, 'Samsung Galaxy S6 series là dòng thiết bị di động cao cấp chạy Android được sản xuất bởi Samsung Electronics. Series bao gồm ban đầu là điện thoại thông minh và thiết bị đầu tiên, Samsung Galaxy S, đư', 10),
(10, 'Samsung Galaxy S7', 1, './assets/products/12.png', 4500000, 'Samsung Galaxy S7 series là dòng thiết bị di động cao cấp chạy Android được sản xuất bởi Samsung Electronics. Series bao gồm ban đầu là điện thoại thông minh và thiết bị đầu tiên, Samsung Galaxy S, đư', 10),
(11, 'Apple iPhone 5', 3, './assets/products/13.png', 13500000, 'Iphone 5 là một điện thoại thông minh được Apple Inc. thiết kế, phát triển và đưa ra thị trường vào ngày 3 tháng 11 năm 2017. Nó được Giám đốc điều hành Tim Cook công bố vào ngày 12 tháng 9 năm 2017, ', 10),
(12, 'Apple iPhone 6', 3, './assets/products/14.png', 7000000, 'Iphone 6 là một điện thoại thông minh được Apple Inc. thiết kế, phát triển và đưa ra thị trường vào ngày 3 tháng 11 năm 2017. Nó được Giám đốc điều hành Tim Cook công bố vào ngày 12 tháng 9 năm 2017, ', 10),
(13, 'Apple iPhone 7', 3, './assets/products/15.png', 900000, 'Iphone 7 là một điện thoại thông minh được Apple Inc. thiết kế, phát triển và đưa ra thị trường vào ngày 3 tháng 11 năm 2017. Nó được Giám đốc điều hành Tim Cook công bố vào ngày 12 tháng 9 năm 2017, ', 10);

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
(39, 2, '2021-01-21', 27200000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MaGioHang` int(10) NOT NULL,
  `MaTaiKhoan` int(10) NOT NULL,
  `MaSanPham` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(3, 'Apple');

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
(4, 'tester3', '123', b'0', '123', '123');

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
  ADD PRIMARY KEY (`MaGioHang`);

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
  MODIFY `MaChiTietDonHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `dienthoai`
--
ALTER TABLE `dienthoai`
  MODIFY `MaDienThoai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGioHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `hang`
--
ALTER TABLE `hang`
  MODIFY `MaHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
