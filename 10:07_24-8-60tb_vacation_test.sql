-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2017 at 10:05 AM
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
-- Table structure for table `tb_vacation_test`
--

CREATE TABLE IF NOT EXISTS `tb_vacation_test` (
  `id_vacation` int(11) NOT NULL AUTO_INCREMENT,
  `write` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_write` date NOT NULL,
  `subject` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `study` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prename` int(10) NOT NULL,
  `first_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `position` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `affiliation` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `work` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cumulative` int(5) NOT NULL,
  `rest` int(5) NOT NULL,
  `total` int(5) NOT NULL,
  `current` int(5) NOT NULL,
  `keep` int(5) NOT NULL,
  `wishes` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_begin` date NOT NULL,
  `end_date` date NOT NULL,
  `house_number` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `road` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `district` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `province` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel_address` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `leave` int(10) NOT NULL,
  `leave_thistime` int(10) NOT NULL,
  `date_total_leave` int(10) NOT NULL,
  `sign` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `presign` int(2) NOT NULL,
  `name_sign` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastname_sign` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `allowed` int(2) NOT NULL,
  `name_inspector` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastname_inspector` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name_commander` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastname_commander` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `position_inspector` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `position_commander` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_inspector` date NOT NULL,
  `date_commander` date NOT NULL,
  `allow_manager` int(3) NOT NULL,
  `first_name2` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_name2` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_position` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_date` date NOT NULL,
  `type_person` int(2) NOT NULL,
  `id_staff` int(5) NOT NULL,
  `date_rec` date NOT NULL,
  PRIMARY KEY (`id_vacation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `tb_vacation_test`
--

INSERT INTO `tb_vacation_test` (`id_vacation`, `write`, `date_write`, `subject`, `study`, `prename`, `first_name`, `last_name`, `position`, `affiliation`, `work`, `tel`, `cumulative`, `rest`, `total`, `current`, `keep`, `wishes`, `date_begin`, `end_date`, `house_number`, `road`, `district`, `city`, `province`, `tel_address`, `leave`, `leave_thistime`, `date_total_leave`, `sign`, `presign`, `name_sign`, `lastname_sign`, `allowed`, `name_inspector`, `lastname_inspector`, `name_commander`, `lastname_commander`, `position_inspector`, `position_commander`, `date_inspector`, `date_commander`, `allow_manager`, `first_name2`, `last_name2`, `last_position`, `last_date`, `type_person`, `id_staff`, `date_rec`) VALUES
(11, 'ศูนย์ตะวันฉายฯ', '2017-05-19', 'ขอลาพักผ่อนประจำปี', 'รองผู้อำนวยการฝ่ายบริหาร ศูนย์ตะวันฉาย', 1, 'จัตุรงค์', 'เจริญฤทธิ์', 'เจ้าหน้าที่สารสนเทศและพัฒนาแอพพลิเคชัน', '-', '-', '043363123', 0, 10, 6, 4, 6, '1', '2017-05-19', '2017-05-19', '25/1', 'มิตรภาพ', 'เมือง', 'เมือง', 'ขอนแก่น', '0541234567', 3, 1, 4, 'นายจัตุรงค์        เจริญฤทธิ์', 1, 'จัตุรงค์', 'เจริญฤทธิ์', 1, 'สุธีรา', 'ประดับวงศ์', 'สุธีรา', 'ประดับวงศ์', 'หัวหน้างาน', 'กรรมการและเลขานุการ', '2017-05-19', '2017-05-19', 1, 'รศ.พญ.นิรมล', 'พัจนสุนทร', 'รองผู้อำนวยการฝ่ายบริหาร', '2017-05-19', 5, 8, '0000-00-00'),
(12, 'ศูนย์ตะวันฉายฯ', '2017-07-03', 'ขอลาพักผ่อนประจำปี', 'รองผู้อำนวยการฝ่ายบริหาร ศูนย์ตะวันฉาย', 3, 'โยษิตา', 'จันทิมา', 'ผู้ช่วยเลขานุการศูนย์ตะวันฉาย', 'ศูนย์ตะวันฉาย', 'มูลนิธิตะวันฉายฯ', '043363123', 0, 10, 0, 4, 6, '', '2017-07-05', '2017-07-05', '7', 'อำมาตย์', 'ในเมือง', 'เมือง', 'ขอนแก่น', '0939744993', 0, 0, 0, 'นางสาวโยษิตา        จันทิมา', 3, 'โยษิตา', 'จันทิมา', 0, '', '', 'สุธีรา', 'ประดับวงษ์', '', 'กรรมการและเลขานุการ', '0000-00-00', '0000-00-00', 0, 'รศ.พญ.นิรมล', 'พัจนสุนทร', 'รองผู้อำนวยการฝ่ายบริหาร', '0000-00-00', 5, 3, '0000-00-00'),
(13, 'ศูนย์ตะวันฉายฯ', '2017-07-06', 'ขอลาพักผ่อนประจำปี', 'รองผู้อำนวยการฝ่ายบริหาร ศูนย์ตะวันฉาย', 3, 'พัทธ์ชนก', 'เชาวน์ชื่น', 'เจ้าหน้าที่ผู้ช่วยบริหารงานโครงการและบริหารงานวิจัย', 'ศูนย์ตะวันฉาย', '', '043363123', 0, 10, 0, 0, 0, '1', '2017-07-14', '2017-07-14', '227/53', 'หลังศูนย์ราชการ', 'ในเมือง', 'เมือง', 'ขอนแก่น', '0900242226', 0, 1, 1, 'นางสาวพัทธ์ชนก        เชาวน์ชื่น', 3, 'พัทธ์ชนก', 'เชาวน์ชื่น', 1, '', '', 'สุธีรา', 'ประดับวงษ์', '', 'กรรมการและเลขานุการ', '2017-07-06', '2017-07-06', 1, 'รศ.พญ.นิรมล', 'พัจนสุนทร', 'รองผู้อำนวยการฝ่ายบริหาร', '2017-07-06', 5, 13, '0000-00-00'),
(16, 'ศูนย์ตะวันฉายฯ', '2017-07-06', 'ขอลาพักผ่อนประจำปี', 'รองผู้อำนวยการฝ่ายบริหาร ศูนย์ตะวันฉาย', 3, 'กนกอร', 'ตั้งจิตเจริญกิจ', 'เจ้าหน้าที่บริหารงานโครงการ', 'ศูนย์วิจัยผู้ป่วยปากแหว่งเพดานโหว่', '', '043363123', 0, 10, 10, 2, 8, '1', '2017-07-07', '2017-07-07', '48/28', 'มิตรภาพ', 'ในเมือง', 'เมือง', 'ขอนแก่น', '0814911875', 2, 1, 3, 'นางสาวกนกอร        ตั้งจิตเจริญกิจ', 3, 'กนกอร', 'ตั้งจิตเจริญกิจ', 1, 'นงลักษณ์', 'พรมขอนยาง', 'สุธีรา', 'ประดับวงษ์', 'เจ้าหน้าที่ผู้ช่วยวิัจัยและธุรการ', 'กรรมการและเลขานุการ', '2017-07-06', '2017-07-06', 1, 'รศ.พญ.นิรมล', 'พัจนสุนทร', 'รองผู้อำนวยการฝ่ายบริหาร', '0000-00-00', 5, 9, '0000-00-00'),
(17, 'ศูนย์ตะวันฉายฯ', '2017-07-07', 'ขอลาพักผ่อนประจำปี', 'รองผู้อำนวยการฝ่ายบริหาร ศูนย์ตะวันฉาย', 3, 'นันท์นลิน', 'มุ่งมานิตย์มงคล', 'เจ้าหน้าที่บัญชีและการเงิน', 'ศูนย์ตะวันฉาย', '', '043363123', 0, 10, 0, 0, 0, '1', '2017-07-20', '2017-07-20', '345/84', 'ศรีจันทร์', 'บ้านเป็ด', 'เมืองขอนแก่น', 'ขอนแก่น', '082-0437525', 0, 0, 0, '', 3, 'นันท์นลิน', 'มุ่งมานิตย์มงคล', 1, 'นงลักษณ์', 'พรมขอนยาง', 'สุธีรา', 'ประดับวงษ์', 'เจ้าหน้าที่ผู้ช่วยวิัจัยและธุรการ', 'กรรมการและเลขานุการ', '0000-00-00', '0000-00-00', 1, 'รศ.พญ.นิรมล', 'พัจนสุนทร', 'รองผู้อำนวยการฝ่ายบริหาร', '0000-00-00', 5, 0, '0000-00-00'),
(18, 'ศูนย์ตะวันฉายฯ', '2017-07-31', 'ขอลาพักผ่อนประจำปี', 'รองผู้อำนวยการฝ่ายบริหาร ศูนย์ตะวันฉาย', 3, 'กนกอร', 'ตั้งจิตเจริญกิจ', 'เจ้าหน้าที่บริหารงานโครงการ', 'ศูนย์วิจัยผู้ป่วยปากแหว่งเพดานโหว่ฯ', '-', '043363123', 0, 10, 7, 3, 7, 'ครึ่ง', '2017-08-01', '2017-08-01', '48/28', 'มิตรภาพ', 'ในเมือง', 'เมือง', 'ขอนแก่น', '0814911875', 0, 0, 0, 'นางสาวกนกอร        ตั้งจิตเจริญกิจ', 3, 'กนกอร', 'ตั้งจิตเจริญกิจ', 0, 'นงลักษณ์', 'พรมขอนยาง', 'สุธีรา', 'ประดับวงษ์', 'เจ้าหน้าที่ผู้ช่วยวิัจัยและธุรการ', 'กรรมการและเลขานุการ', '0000-00-00', '0000-00-00', 0, 'รศ.พญ.นิรมล', 'พัจนสุนทร', 'รองผู้อำนวยการฝ่ายบริหาร', '0000-00-00', 5, 9, '0000-00-00'),
(19, 'ศูนย์ตะวันฉายฯ', '2017-08-01', 'ขอลาพักผ่อนประจำปี', 'รองผู้อำนวยการฝ่ายบริหาร ศูนย์ตะวันฉาย', 3, 'ชิโนรส', 'สืบไวย', 'เจ้าหน้าที่บริหารงานวิจัย', 'ศูนย์วิจัยผู้ป่วยปากแหว่ง เพดานโหว่ และความพิการแต่กำเนิดของศีรษะและใบหน้า มหาวิ', '', '043363123', 1, 10, 0, 0, 0, '', '2017-08-04', '2017-08-04', '199/219', 'หนองไผ่-โกทา', 'ตำบลศิลา', 'อำเภอเมืองขอนแก่น', 'ขอนแก่น', '0868593335', 0, 0, 0, 'นางสาวชิโนรส        สืบไวย', 3, 'ชิโนรส', 'สืบไวย', 0, 'นงลักษณ์', 'พรมขอนยาง', 'สุธีรา', 'ประดับวงษ์', 'เจ้าหน้าที่ผู้ช่วยวิจัยและธุรการ', 'กรรมการและเลขานุการ', '2017-08-01', '0000-00-00', 0, 'รศ.พญ.นิรมล', 'พัจนสุนทร', 'รองผู้อำนวยการฝ่ายบริหาร', '0000-00-00', 5, 7, '0000-00-00'),
(20, 'ศูนย์ตะวันฉายฯ', '2017-08-02', 'ขอลาพักผ่อนประจำปี', 'รองผู้อำนวยการฝ่ายบริหาร ศูนย์ตะวันฉาย', 3, 'นงลักษณ์', 'พรมขอนยาง', 'เจ้าหน้าที่ผู้ช่วยวิัจัยและธุรการ', 'ศูนย์วิจัยผู้ป่วยปากแหว่ง เพดานโหว่ฯ', 'ศูนย์ตะวันฉาย', '043363123', 0, 10, 10, 4, 6, '1', '2017-08-15', '2017-08-15', '5', '', 'โคกสูง', 'อุบลรัตน์', 'ขอนแก่น', '085-4648160', 4, 1, 5, 'นางสาวนงลักษณ์        พรมขอนยาง', 0, 'นงลักษณ์', 'พรมขอนยาง', 0, 'นงลักษณ์', 'พรมขอนยาง', 'สุธีรา', 'ประดับวงษ์', 'เจ้าหน้าที่ผู้ช่วยวิัจัยและธุรการ', 'กรรมการและเลขานุการ', '2017-08-15', '0000-00-00', 0, 'รศ.พญ.นิรมล', 'พัจนสุนทร', 'รองผู้อำนวยการฝ่ายบริหาร', '0000-00-00', 5, 5, '0000-00-00'),
(55, 'ศูนย์ตะวันฉายฯ', '2017-08-24', 'ขอลาพักผ่อนประจำปี', 'รองผู้อำนวยการฝ่ายบริหาร ศูนย์ตะวันฉาย', 1, 'จัตุรงค์', 'เจริญฤทธิ์', 'เจ้าหน้าที่สารสนเทศและพัฒนาแอพพลิเคชัน', '-', '-', '043363123', 0, 10, 10, 6, 4, '2', '2017-08-31', '2017-09-01', '590/4', 'มิตรภาพ', 'ศิลา', 'เมือง', 'ขอนแก่น', '0868539079', 4, 2, 6, 'จัตุรงค์   เจริญฤทธิ์', 1, 'จัตุรงค์', 'เจริญฤทธิ์', 0, 'นงลักษณ์', 'พรมขอนยาง', 'สุธีรา', 'ประดับวงษ์', 'เจ้าหน้าที่ผู้ช่วยวิัจัยและธุรการ', 'กรรมการและเลขานุการ', '0000-00-00', '0000-00-00', 0, 'รศ.พญ.นิรมล', 'พัจนสุนทร', 'รองผู้อำนวยการฝ่ายบริหาร', '0000-00-00', 0, 0, '2017-08-24'),
(56, 'ศูนย์ตะวันฉายฯ', '2017-08-24', 'ขอลาพักผ่อนประจำปี', 'รองผู้อำนวยการฝ่ายบริหาร ศูนย์ตะวันฉาย', 1, 'จัตุรงค์', 'เจริญฤทธิ์', 'เจ้าหน้าที่สารสนเทศและพัฒนาแอพพลิเคชัน', '-', '-', '043363123', 0, 10, 10, 7, 3, '1', '2017-09-04', '2017-09-04', '590/4', 'มิตรภาพ', 'ศิลา', 'เมือง', 'ขอนแก่น', '0868539079', 6, 1, 7, 'จัตุรงค์   เจริญฤทธิ์', 1, 'จัตุรงค์', 'เจริญฤทธิ์', 0, 'นงลักษณ์', 'พรมขอนยาง', 'สุธีรา', 'ประดับวงษ์', 'เจ้าหน้าที่ผู้ช่วยวิัจัยและธุรการ', 'กรรมการและเลขานุการ', '0000-00-00', '0000-00-00', 0, 'รศ.พญ.นิรมล', 'พัจนสุนทร', 'รองผู้อำนวยการฝ่ายบริหาร', '0000-00-00', 0, 0, '2017-08-24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
