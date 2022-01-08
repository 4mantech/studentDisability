-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 06:40 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `facultyId` int(11) NOT NULL,
  `departmentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `facultyName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `role` int(1) NOT NULL,
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
(1, '116130462028-8', '8c3b3acde619d3cd5083f0608e7545a8d1202c5dd0a96bfb46ddf292accc8e0e', 'ธนพงศ์', 'เขียวโพธิ์', 0, '0970616129', '1189900258441', '', '2022-01-02', 24, 'เด้');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentdetail`
--
ALTER TABLE `studentdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `fac to dep` FOREIGN KEY (`id`) REFERENCES `departments` (`facultyId`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
