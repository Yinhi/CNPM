-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2021 at 01:17 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cnpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `MDH` varchar(225) collate utf8_unicode_ci NOT NULL,
  `MCTSP` varchar(225) collate utf8_unicode_ci NOT NULL,
  `GIA_BAN` double NOT NULL,
  `SO_LUONG` int(11) NOT NULL,
  `THANH_TIEN` double NOT NULL,
  PRIMARY KEY  (`MDH`,`MCTSP`),
  KEY `MDH` (`MDH`),
  KEY `MCTSP` (`MCTSP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chi_tiet_don_hang`
--


-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_phieu_nhap`
--

CREATE TABLE `chi_tiet_phieu_nhap` (
  `MPN` varchar(225) collate utf8_unicode_ci NOT NULL,
  `MCTSP` varchar(225) collate utf8_unicode_ci NOT NULL,
  `GIA_NHAP` double NOT NULL,
  `SO_LUONG` int(11) NOT NULL,
  `THANH_TIEN` double NOT NULL,
  PRIMARY KEY  (`MPN`,`MCTSP`),
  KEY `MPN` (`MPN`),
  KEY `MCTSP` (`MCTSP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chi_tiet_phieu_nhap`
--


-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_san_pham`
--

CREATE TABLE `chi_tiet_san_pham` (
  `MSP` varchar(225) collate utf8_unicode_ci NOT NULL,
  `MCTSP` varchar(225) collate utf8_unicode_ci NOT NULL,
  `SIZE` varchar(225) collate utf8_unicode_ci NOT NULL,
  `GIA_BAN` double NOT NULL,
  `GIA_NHAP` double NOT NULL,
  `SO_LUONG` int(11) NOT NULL,
  `MAU_SAC` varchar(225) collate utf8_unicode_ci NOT NULL,
  `ANH` varchar(225) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MCTSP`),
  KEY `MSP` (`MSP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chi_tiet_san_pham`
--


-- --------------------------------------------------------

--
-- Table structure for table `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `MCV` varchar(225) collate utf8_unicode_ci NOT NULL,
  `TEN_CHUC_VU` varchar(225) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MCV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuc_vu`
--


-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `MDM` varchar(225) collate utf8_unicode_ci NOT NULL,
  `TEN_DANH_MUC` varchar(225) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MDM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danh_muc`
--


-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `MDH` varchar(225) collate utf8_unicode_ci NOT NULL,
  `MKH` varchar(225) collate utf8_unicode_ci NOT NULL,
  `NGAY_TAO_DON` date NOT NULL,
  `DIA_CHI_GIAO_HANG` varchar(225) collate utf8_unicode_ci NOT NULL,
  `HINH_THUC_THANH_TOAN` varchar(225) collate utf8_unicode_ci NOT NULL,
  `TRANG_THAI` varchar(225) collate utf8_unicode_ci NOT NULL,
  `TONG_SO_LUONG` int(11) NOT NULL,
  `TONG_TIEN` double NOT NULL,
  PRIMARY KEY  (`MDH`),
  KEY `MKH` (`MKH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `don_hang`
--


-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MKH` varchar(225) collate utf8_unicode_ci NOT NULL,
  `TEN` varchar(225) collate utf8_unicode_ci NOT NULL,
  `SDT` varchar(225) collate utf8_unicode_ci NOT NULL,
  `MAT_KHAU` varchar(225) collate utf8_unicode_ci NOT NULL,
  `NGAY_SINH` date NOT NULL,
  `GIOI_TINH` varchar(225) collate utf8_unicode_ci NOT NULL,
  `DIA_CHI` varchar(225) collate utf8_unicode_ci NOT NULL,
  `TRANG_THAI` tinyint(1) NOT NULL,
  PRIMARY KEY  (`MKH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach_hang`
--


-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `MNV` varchar(225) collate utf8_unicode_ci NOT NULL,
  `TEN` varchar(225) collate utf8_unicode_ci NOT NULL,
  `SDT` varchar(225) collate utf8_unicode_ci NOT NULL,
  `MAT_KHAU` varchar(225) collate utf8_unicode_ci NOT NULL,
  `NGAY_SINH` date NOT NULL,
  `GIOI_TINH` varchar(225) collate utf8_unicode_ci NOT NULL,
  `DIA_CHI` varchar(225) collate utf8_unicode_ci NOT NULL,
  `CCCD` varchar(225) collate utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(225) collate utf8_unicode_ci NOT NULL,
  `CHUC_VU` varchar(225) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MNV`),
  KEY `CHUC_VU` (`CHUC_VU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhan_vien`
--


-- --------------------------------------------------------

--
-- Table structure for table `phan_quyen`
--

CREATE TABLE `phan_quyen` (
  `MCV` varchar(225) collate utf8_unicode_ci NOT NULL,
  `QL_NHANVIEN` tinyint(4) NOT NULL,
  `QL_SANPHAM` tinyint(4) NOT NULL,
  `QL_DANHMUC` tinyint(4) NOT NULL,
  `QL_XCC` tinyint(4) NOT NULL,
  `QL_KHUYENMAI` tinyint(4) NOT NULL,
  `QL_TAIKHOAN` tinyint(4) NOT NULL,
  `QL_DONHANG` tinyint(4) NOT NULL,
  `QL_NHAPHANG` tinyint(4) NOT NULL,
  `QL_GIAOHANG` tinyint(4) NOT NULL,
  `THONGKE_DOANHTHU` tinyint(4) NOT NULL,
  PRIMARY KEY  (`MCV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phan_quyen`
--


-- --------------------------------------------------------

--
-- Table structure for table `phieu_nhap`
--

CREATE TABLE `phieu_nhap` (
  `MPN` varchar(225) collate utf8_unicode_ci NOT NULL,
  `MXCC` varchar(225) collate utf8_unicode_ci NOT NULL,
  `NGAY_NHAP_HANG` date NOT NULL,
  `TONG_TIEN` double NOT NULL,
  `TONG_SO_LUONG` int(11) NOT NULL,
  PRIMARY KEY  (`MPN`),
  KEY `MXCC` (`MXCC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieu_nhap`
--


-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `MSP` varchar(225) collate utf8_unicode_ci NOT NULL,
  `MDM` varchar(225) collate utf8_unicode_ci NOT NULL,
  `TEN` varchar(225) collate utf8_unicode_ci NOT NULL,
  `MO_TA` varchar(225) collate utf8_unicode_ci NOT NULL,
  `TONG_SO_LUONG` int(11) NOT NULL,
  PRIMARY KEY  (`MSP`),
  KEY `MDM` (`MDM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `san_pham`
--


-- --------------------------------------------------------

--
-- Table structure for table `xuong_cung_cap`
--

CREATE TABLE `xuong_cung_cap` (
  `MXCC` varchar(225) collate utf8_unicode_ci NOT NULL,
  `TEN` varchar(225) collate utf8_unicode_ci NOT NULL,
  `SDT` varchar(225) collate utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(225) collate utf8_unicode_ci NOT NULL,
  `DIA_CHI` varchar(225) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MXCC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `xuong_cung_cap`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`MCTSP`) REFERENCES `chi_tiet_san_pham` (`MCTSP`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`MDH`) REFERENCES `don_hang` (`MDH`);

--
-- Constraints for table `chi_tiet_phieu_nhap`
--
ALTER TABLE `chi_tiet_phieu_nhap`
  ADD CONSTRAINT `chi_tiet_phieu_nhap_ibfk_2` FOREIGN KEY (`MCTSP`) REFERENCES `chi_tiet_san_pham` (`MCTSP`),
  ADD CONSTRAINT `chi_tiet_phieu_nhap_ibfk_1` FOREIGN KEY (`MPN`) REFERENCES `phieu_nhap` (`MPN`);

--
-- Constraints for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD CONSTRAINT `chi_tiet_san_pham_ibfk_1` FOREIGN KEY (`MSP`) REFERENCES `san_pham` (`MSP`);

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`MKH`) REFERENCES `khach_hang` (`MKH`);

--
-- Constraints for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD CONSTRAINT `nhan_vien_ibfk_1` FOREIGN KEY (`CHUC_VU`) REFERENCES `chuc_vu` (`MCV`);

--
-- Constraints for table `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  ADD CONSTRAINT `phieu_nhap_ibfk_1` FOREIGN KEY (`MXCC`) REFERENCES `xuong_cung_cap` (`MXCC`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`MDM`) REFERENCES `danh_muc` (`MDM`);
