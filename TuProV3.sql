-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 01, 2018 at 02:15 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tupro`
--
CREATE DATABASE IF NOT EXISTS `tupro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tupro`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `SP_fetchAdminPassword`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_fetchAdminPassword` (IN `ID` INT(7))  NO SQL
SELECT admin.password from admin WHERE admin.adminId = ID$$

DROP PROCEDURE IF EXISTS `SP_fetchInstructorPW`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_fetchInstructorPW` (IN `id` INT(8))  NO SQL
SELECT instructor.password FROM instructor WHERE instructor.instructorId = id$$

DROP PROCEDURE IF EXISTS `SP_fetchStudentPassword`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_fetchStudentPassword` (IN `sid` INT(7))  NO SQL
SELECT student.password FROM student WHERE student.studentId = sid$$

DROP PROCEDURE IF EXISTS `SP_getAdminFirstName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getAdminFirstName` (IN `id` INT)  NO SQL
SELECT admin.firstName from admin WHERE admin.adminId = id$$

DROP PROCEDURE IF EXISTS `SP_getAdminLastName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getAdminLastName` (IN `id` INT)  NO SQL
SELECT admin.lastName FROM admin WHERE admin.adminId = id$$

DROP PROCEDURE IF EXISTS `SP_getAllCourses`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getAllCourses` ()  NO SQL
SELECT * from course$$

DROP PROCEDURE IF EXISTS `SP_GetFacultyID`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetFacultyID` (IN `fid` INT(8))  SELECT instructor.instructorId from instructor WHERE instructor.instructorId = fid$$

DROP PROCEDURE IF EXISTS `SP_getInstructorCourses`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getInstructorCourses` (IN `id` INT)  NO SQL
SELECT instructormap.courseCode from instructormap where instructormap.instructorId = id$$

DROP PROCEDURE IF EXISTS `SP_getInstructorFirstName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getInstructorFirstName` (IN `id` INT)  NO SQL
SELECT instructor.firstName from instructor where instructor.instructorId = id$$

DROP PROCEDURE IF EXISTS `SP_getInstructorLastName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getInstructorLastName` (IN `id` INT)  NO SQL
SELECT instructor.lastName from instructor WHERE instructor.instructorId = id$$

DROP PROCEDURE IF EXISTS `SP_getStudentCourses`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getStudentCourses` (IN `id` INT)  NO SQL
SELECT studentmap.courseCode from studentmap WHERE studentmap.studentId = id$$

DROP PROCEDURE IF EXISTS `SP_GetStudentFirst`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetStudentFirst` (IN `id` INT)  NO SQL
SELECT student.firstName from student WHERE student.studentId = id$$

DROP PROCEDURE IF EXISTS `SP_getStudentID`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getStudentID` (IN `studentid` VARCHAR(255))  NO SQL
SELECT student.studentId FROM student WHERE student.studentId = studentid$$

DROP PROCEDURE IF EXISTS `SP_getStudentLastName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getStudentLastName` (IN `id` INT)  NO SQL
SELECT student.lastName from student WHERE student.studentId = id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(7) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `admin`
--

TRUNCATE TABLE `admin`;
--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `password`, `firstName`, `lastName`) VALUES
(1, 'pass', 'jed', 'palm');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `contentId` int(11) NOT NULL AUTO_INCREMENT,
  `uploadDate` timestamp NOT NULL,
  `courseCode` char(9) NOT NULL,
  `type` varchar(15) NOT NULL,
  `description` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`contentId`),
  KEY `courseId` (`courseCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `content`
--

TRUNCATE TABLE `content`;
-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `courseCode` char(9) NOT NULL,
  `description` varchar(40) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`courseCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `course`
--

TRUNCATE TABLE `course`;
-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

DROP TABLE IF EXISTS `instructor`;
CREATE TABLE IF NOT EXISTS `instructor` (
  `instructorId` int(7) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addedBy` int(7) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  PRIMARY KEY (`instructorId`),
  KEY `addedBy` (`addedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Instructor Information';

--
-- Truncate table before insert `instructor`
--

TRUNCATE TABLE `instructor`;
--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructorId`, `password`, `addedBy`, `firstName`, `lastName`) VALUES
(54321, 'password', 1, 'test', 'instructor');

-- --------------------------------------------------------

--
-- Table structure for table `instructormap`
--

DROP TABLE IF EXISTS `instructormap`;
CREATE TABLE IF NOT EXISTS `instructormap` (
  `instructorMapId` int(11) NOT NULL AUTO_INCREMENT,
  `instructorId` int(7) NOT NULL,
  `courseCode` char(9) NOT NULL,
  PRIMARY KEY (`instructorMapId`),
  KEY `instructorId` (`instructorId`),
  KEY `courseId` (`courseCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `instructormap`
--

TRUNCATE TABLE `instructormap`;
-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `studentId` int(7) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addedBy` int(7) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  PRIMARY KEY (`studentId`),
  KEY `addedBy` (`addedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `student`
--

TRUNCATE TABLE `student`;
--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentId`, `password`, `addedBy`, `firstName`, `lastName`) VALUES
(12345, 'password', 1, 'aaaaa', 'bbbbb');

-- --------------------------------------------------------

--
-- Table structure for table `studentmap`
--

DROP TABLE IF EXISTS `studentmap`;
CREATE TABLE IF NOT EXISTS `studentmap` (
  `studentMapId` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(7) NOT NULL,
  `courseCode` char(9) NOT NULL,
  PRIMARY KEY (`studentMapId`),
  KEY `studentId` (`studentId`),
  KEY `courseId` (`courseCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `studentmap`
--

TRUNCATE TABLE `studentmap`;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `admin` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructormap`
--
ALTER TABLE `instructormap`
  ADD CONSTRAINT `instructormap_ibfk_1` FOREIGN KEY (`instructorId`) REFERENCES `instructor` (`instructorId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instructormap_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `admin` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentmap`
--
ALTER TABLE `studentmap`
  ADD CONSTRAINT `studentmap_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentmap_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
