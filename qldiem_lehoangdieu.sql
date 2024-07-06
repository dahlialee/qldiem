-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 04:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qldiem_lehoangdieu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diem`
--

CREATE TABLE `tbl_diem` (
  `MaSV` varchar(20) NOT NULL,
  `TenSV` varchar(100) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiemChuyenCan` decimal(10,0) NOT NULL,
  `DiemGiuaKy` decimal(10,0) NOT NULL,
  `DiemCuoiKy` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_diem`
--

INSERT INTO `tbl_diem` (`MaSV`, `TenSV`, `NgaySinh`, `DiemChuyenCan`, `DiemGiuaKy`, `DiemCuoiKy`) VALUES
('72DCTT20106', 'Nguyễn Thị Phương Thảo', '2003-11-27', 10, 10, 10),
('72DCTT20138', 'Lê Hoàng Diệu', '2003-06-27', 8, 8, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_diem`
--
ALTER TABLE `tbl_diem`
  ADD PRIMARY KEY (`MaSV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
