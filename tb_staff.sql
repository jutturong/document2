-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2017 at 01:41 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `docdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff`
--

CREATE TABLE IF NOT EXISTS `tb_staff` (
  `id_staff` int(11) NOT NULL AUTO_INCREMENT,
  `prename` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(35) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `position` varchar(70) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_staff`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_staff`
--

INSERT INTO `tb_staff` (`id_staff`, `prename`, `name`, `lastname`, `position`) VALUES
(2, 'นาย', 'ศุภชัย', 'วงศ์ชื่น', 'เจ้าหน้าที่พัฒนาระบบฐานข้อมูลและสารสนเทศ'),
(3, 'นางสาว', 'โยษิตา', 'จันทิมา', 'ผู้ช่วยเลขานุการศูนย์ตะวันฉาย'),
(4, 'นางสาว', 'นันท์นลิน', 'มุ่งมานิตย์มงคล', 'เจ้าหน้าที่บัญชีและการเงิน'),
(5, 'นางสาว', 'นงลักษณ์', 'พรมขอนยาง', 'เจ้าหน้าที่ผู้ช่วยวิัจัยและธุรการ'),
(7, 'นางสาว', 'ชิโนรส', 'สืบไวย', 'เจ้าหน้าที่บริหารงานวิจัย'),
(8, 'นาย', 'จัตุรงค์', 'เจริญฤทธิ์', 'เจ้าหน้าที่สารสนเทศและพัฒนาแอพพลิเคชัน'),
(9, 'นางสาว', 'กนกอร', 'ตั้งจิตเจริญกิจ', 'เจ้าหน้าที่บริหารงานโครงการ'),
(10, 'นาง', 'สมหมาย', 'นามพิลา', 'เจ้าหน้าที่รักษาความสะอาด ชำนาญการพิเศษ'),
(11, 'นางสาว', 'พัชริดา', 'ชูสุข', 'เจ้าหน้าที่ธุรการ\r\n'),
(12, 'นางสาว', 'ฐิตินันท์', 'สุพรรณคุ้ม', 'เจ้าหน้าที่ช่วยเหลือผู้ป่วยและครอบครัว'),
(13, 'นางสาว', 'พัทธ์ชนก', 'เชาวน์ชื่น', 'เจ้าหน้าที่ผู้ช่วยบริหารงานโครงการและบริหารงานวิจัย');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
