-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 05:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disabilities`
--

-- --------------------------------------------------------

--
-- Table structure for table `articlesslide`
--

CREATE TABLE `articlesslide` (
  `id` int(11) NOT NULL,
  `imagePath` text NOT NULL,
  `imageName` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articlesslide`
--

INSERT INTO `articlesslide` (`id`, `imagePath`, `imageName`, `startDate`, `endDate`) VALUES
(1, 'rm.png', 'HNY2022', '2022-01-01', '2022-01-15'),
(2, 'news3.jpg', 'รับสมัคร นศ', '2022-01-01', '2022-01-10'),
(3, 'eKob.jpg', 'up skill', '2022-01-12', '2022-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `facultyId` int(11) NOT NULL,
  `departmentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `facultyId`, `departmentName`) VALUES
(4, 3, 'สาขาวิชาการตลาด'),
(5, 3, 'สาขาวิชาการจัดการ'),
(6, 3, 'สาขาวิชาการบัญชี'),
(7, 3, 'สาขาวิชาระบบสารสนเทศ'),
(8, 3, 'สาขาวิชาการเงินและเศรษฐศาสตร์'),
(9, 3, 'สาขาวิชาการบริหารธุรกิจระหว่างประเทศ'),
(10, 4, 'สาขาวิชาการออกแบบแฟชั่นและนวัตกรรมเครื่องแต่งกาย'),
(11, 4, 'สาขาวิชาอาหารและโภชนาการ'),
(12, 4, 'สาขาวิชาศิลปประดิษฐ์ในงานคหกรรมศาสตร์'),
(13, 4, 'สาขาวิชาการศึกษาปฐมวัย'),
(14, 2, 'วิศวกรรมโยธา'),
(15, 2, 'วิศวกรรมวัสดุและโลหการ'),
(16, 2, 'วิศวกรรมไฟฟ้า'),
(17, 2, 'วิศวกรรมเครื่องกล'),
(18, 2, 'วิศวกรรมอุตสาหการ'),
(19, 2, 'วิศวกรรมสิ่งทอ'),
(20, 2, 'วิศวกรรมอิเล็กทรอนิกส์และโทรคมนาคม'),
(21, 2, 'วิศวกรรมคอมพิวเตอร์'),
(22, 2, 'วิศวกรรมเคมี'),
(23, 2, 'วิศวกรรมเกษตร'),
(24, 5, 'สาขาวิชาศิลปศึกษา'),
(25, 5, 'สาขาวิชาจิตรกรรม'),
(26, 5, 'สาขาวิชาทัศนศิลป์'),
(27, 5, 'สาขาวิชาศิลปะไทย'),
(28, 5, 'สาขาวิชาออกแบบนิเทศศิลป์'),
(29, 5, 'สาขาวิชาออกแบบผลิตภัณฑ์'),
(30, 5, 'สาขาวิชาออกแบบภายใน'),
(31, 5, 'สาขาวิชานวัตกรรมการออกแบบผลิตภัณฑ์ร่วมสมัย'),
(32, 5, 'สาขาวิชาดนตรีคีตศิลป์ไทยศึกษา'),
(33, 5, 'สาขาวิชาดนตรีคีตศิลป์สากลศึกษา'),
(34, 6, 'การผลิตพืช\r\n'),
(35, 6, 'เทคโนโลยีภูมิทัศน์\r\n'),
(36, 6, 'วิทยาศาสตร์และเทคโนโลยีการอาหาร\r\n'),
(37, 6, 'วิทยาศาสตร์สุขภาพสัตว์\r\n'),
(38, 6, 'วิศวกรรมแปรรูปผลิตผลเกษตร'),
(39, 6, 'สัตวศาสตร์'),
(40, 7, 'สาขาวิชาวิศวกรรมโยธา'),
(41, 7, 'สาขาวิชาวิศวกรรมไฟฟ้า'),
(42, 7, 'สาขาวิชาวิศวกรรมเครื่องกล'),
(43, 7, 'สาขาวิชาวิศวกกรมอุตสาหการ'),
(44, 7, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์'),
(45, 7, 'สาขาวิชาวิศวกรรมอิเล็กทรอนิกส์และระบบอัติโนมัติ'),
(46, 7, 'สาขาวิชาเทคโนโลยีบริหารงานก่อสร้าง'),
(47, 7, 'สาขาวิชาเทคโนโลยีการผลิต (ต่อเนื่อง)'),
(48, 7, 'สาขาวิชาอิเล็กทรอนิกส์อัจฉริยะ (ต่อเนื่อง)'),
(49, 7, 'สาขาวิชาวิศวกรรมเมคคาทรอนิกส์และหุ่นยนต์'),
(50, 7, 'สาขาวิชาเทคโนโลยีดิจิทัลเพื่อการศึกษา'),
(51, 7, 'สาขาวิชาเทคโนโลยีและสื่อสารการศึกษา'),
(52, 7, 'สาขาวิชาเทคโนโลยีสารสนเทศการศึกษา'),
(53, 7, 'สาขาวิชานวัตกรรมการเรียนรู้และเทคโนโลยีสารสนเทศ'),
(55, 10, 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์'),
(56, 10, 'เทคโนโลยีการถ่ายภาพและภาพยนตร์'),
(58, 8, 'สาขาวิชาเทคโนโลยีสถาปัตยกรรมศาสตร์'),
(59, 8, 'สาขาวิชาสถาปัตยกรรมภายใน'),
(63, 10, 'เทคโนโลยีสื่อดิจิทัล'),
(64, 10, 'สาขาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง'),
(65, 10, 'เทคโนโลยีมัลติมีเดีย'),
(66, 10, 'เทคโนโลยีการโฆษณาและประชาสัมพันธ์'),
(68, 9, 'สาขาวิชาคณิตศาสตร์ประยุกต์\r\n'),
(69, 9, 'สาขาวิชาเคมีประยุกต์\r\n'),
(70, 9, 'สาขาวิชาชีววิทยาประยุกต์\r\n'),
(71, 9, 'สาขาวิชาฟิสิกส์ประยุกต์\r\n'),
(72, 9, 'สาขาวิชาวิทยาการคอมพิวเตอร์\r\n'),
(73, 9, 'สาขาวิชาเทคโนโลยีสารสนเทศและการสื่อสารดิจิทัล\r\n'),
(74, 9, 'สาขาวิชาสถิติประยุกต์\r\n'),
(75, 9, 'สาขาวิชาวิทยาศาสตร์และการจัดการเทคโนโลยีอาหาร\r\n'),
(76, 9, 'สาขาวิชาการวิเคราะห์และจัดการข้อมูลขนาดใหญ่'),
(77, 13, 'หลักสูตรพยาบาลศาสตรบัณฑิต\r\n'),
(81, 11, '  สาขาวิชาอุตสาหกรรมการบริการการบิน'),
(82, 11, ' สาขาวิชาการท่องเที่ยว'),
(83, 11, 'สาขาวิชาการจักการการโรงแรม'),
(84, 11, ' สาขาวิชาภาษาอังกฤษเพื่อการสื่อสาร'),
(86, 12, 'การแพทย์แผนไทยประยุกต์บัณฑิต'),
(87, 12, 'สาขาวิชาสุขภาพและความงาม\r\n'),
(88, 12, 'สาขาวิชานวัตกรรมผลิตภัณฑ์สุขภาพ'),
(89, 12, 'สาขาวิชาการแพทย์ทางเลือก (นานาชาติ)');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `documentPath` text NOT NULL,
  `documentName` varchar(255) NOT NULL,
  `documentType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `facultyName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `facultyName`) VALUES
(2, 'คณะวิศวกรรมศาสตร์'),
(3, 'คณะบริหารธุรกิจ'),
(4, 'คณะเทคโนโลยีคหกรรมศาสตร์'),
(5, 'คณะศิลปกรรมศาสตร์'),
(6, 'คณะเทคโนโลยีการเกษตร'),
(7, 'คณะครุศาสตร์อุตสาหกรรม'),
(8, 'คณะสถาปัตยกรรมศาสตร์'),
(9, 'คณะวิทยาศาสตร์และเทคโนโลยี'),
(10, 'คณะเทคโนโลยีสื่อสารมวลชน'),
(11, 'คณะศิลปศาสตร์'),
(12, 'คณะการแพทย์บูรณาการ'),
(13, 'คณะพยาบาลศาสตร์');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetail`
--

CREATE TABLE `studentdetail` (
  `id` int(11) NOT NULL COMMENT 'รหัส',
  `userId` int(11) NOT NULL COMMENT 'รหัสผู้ใช้',
  `departmentId` int(11) NOT NULL COMMENT 'รหัสสาขา',
  `address` text NOT NULL COMMENT 'ที่อยู่',
  `imageProfilePath` text NOT NULL COMMENT 'ตําแหน่งรปู โปรไฟล์',
  `subDistrict` varchar(60) NOT NULL COMMENT 'ตําบล ',
  `district` varchar(60) NOT NULL COMMENT 'อำเภอ',
  `province` varchar(60) NOT NULL COMMENT 'จังหวัด',
  `postalCode` varchar(10) NOT NULL COMMENT 'รหัสไปรษณี ',
  `disabilityId` varchar(255) NOT NULL COMMENT 'รหัสประจําตัวผู้พิการ',
  `disabilityType` varchar(255) NOT NULL COMMENT 'ประเภทผู้พิการ',
  `yearOfEdu` varchar(255) NOT NULL COMMENT 'ชั้นปี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentdetail`
--

INSERT INTO `studentdetail` (`id`, `userId`, `departmentId`, `address`, `imageProfilePath`, `subDistrict`, `district`, `province`, `postalCode`, `disabilityId`, `disabilityType`, `yearOfEdu`) VALUES
(1, 1, 21, 'ซอยนกเขา', 'potae.jpg', 'ในเมือง', 'เมือง', 'ชัยนาท', '17000', '1', 'กล้ามเนื้ออ่อนแรง', '4'),
(2, 2, 4, 'ซอยนกเขาจุ๊กกรู่', 'potae.jpg', 'ชัยนาท', 'เมือง', 'ชัยนาท', '17000', '1161', 'เอ๋อ', '2'),
(3, 3, 19, 'ซอยนกเข๊า', 'potae2.jpg', 'ชัยนาท', 'เมือง', 'ชัยนนาทท', '17000', '112', 'แขนขาด', '1'),
(4, 4, 21, '238 ม.6', 'dae.jpg', 'ชัยนาท', 'เมือง', 'ชัยนาท', '17000', '-', 'ดี', '4'),
(6, 6, 21, '126/2', '', 'ท้ายสำเภา', 'พระพรหม', 'นครศรีธรรมราช', '80000', '2', 'สมองเบลอ', '4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(55) DEFAULT NULL,
  `role` int(1) NOT NULL COMMENT '0แอดมิน1เจ้าหน้าที่2นักศึกษา',
  `phone` varchar(10) DEFAULT NULL,
  `idCardNumber` varchar(50) NOT NULL,
  `idCodeAcdemy` varchar(50) NOT NULL,
  `birthDate` date NOT NULL,
  `age` int(3) NOT NULL,
  `nickName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `password`, `firstName`, `lastName`, `role`, `phone`, `idCardNumber`, `idCodeAcdemy`, `birthDate`, `age`, `nickName`) VALUES
(1, 'admin', '18284863aa8fcb504eea24c9319d2d25d858361c68121b13d2df1059811b66e7', 'อดิศักดิ์', 'มีทอง', 0, '1234', '1234', '', '2022-01-02', 24, 'แอดมินเต้'),
(2, 'staff', '18284863aa8fcb504eea24c9319d2d25d858361c68121b13d2df1059811b66e7', 'เจ้าหน้าที่', '1', 1, '1234', '11', '', '2022-01-09', 1, 'เจ้าหน้าที่'),
(3, 'student', '18284863aa8fcb504eea24c9319d2d25d858361c68121b13d2df1059811b66e7', 'นักศึกษา', 'พิการสมอง', 2, '0', '123', '', '0000-00-00', 0, 'นักศึกษาโปเต้'),
(4, '116130462028-8', '18284863aa8fcb504eea24c9319d2d25d858361c68121b13d2df1059811b66e7', 'ธนพงศ์', 'เขียวโพธิ์', 2, '0970616129', '118990025****', '-', '1998-01-02', 24, 'เด้'),
(6, '1161304620353', '18284863aa8fcb504eea24c9319d2d25d858361c68121b13d2df1059811b66e7', 'กันตพัฒน์', ' สุภาวีระวัฒน์', 2, '0987290448', '1759900******', '1161304620353', '1997-09-12', 0, 'เฟียส'),
(18, '1330', '0e877f88b5e520af08c30409af0fdd9340fc16c7f5366351f2da88264eff307b', '4man', 'tech', 1, '6969', '1169', '1330', '1997-09-12', 0, 'Venice');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articlesslide`
--
ALTER TABLE `articlesslide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fac_id` (`facultyId`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentdetail`
--
ALTER TABLE `studentdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`userId`),
  ADD KEY `fk_dep_id` (`departmentId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articlesslide`
--
ALTER TABLE `articlesslide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `studentdetail`
--
ALTER TABLE `studentdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `fac_id` FOREIGN KEY (`facultyId`) REFERENCES `faculties` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `studentdetail`
--
ALTER TABLE `studentdetail`
  ADD CONSTRAINT `fk_dep_id` FOREIGN KEY (`departmentId`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
