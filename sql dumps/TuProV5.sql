-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2018 at 05:11 PM
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
DROP PROCEDURE IF EXISTS `SP_createCourse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_createCourse` (IN `courseID` VARCHAR(9), IN `description` VARCHAR(40))  NO SQL
INSERT INTO course
(course.courseCode, course.description)
VALUES (courseID, description)$$

DROP PROCEDURE IF EXISTS `SP_createInstructor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_createInstructor` (IN `id` INT(7), IN `password` VARCHAR(255), IN `adminid` INT(7), IN `fname` VARCHAR(30), IN `lname` VARCHAR(30))  NO SQL
INSERT INTO instructor
(instructor.instructorId, instructor.password, instructor.addedBy, instructor.firstName, instructor.lastName)
VALUES 
(id, password, adminid, fname, lname)$$

DROP PROCEDURE IF EXISTS `SP_createStudent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_createStudent` (IN `id` INT(7), IN `password` VARCHAR(255), IN `admin` INT(7), IN `fname` VARCHAR(30), IN `lname` VARCHAR(30))  NO SQL
INSERT INTO student
(student.studentId, student.password, student.addedBy, student.firstName, student.lastName) VALUES
(id, password, admin, fname, lname)$$

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

DROP PROCEDURE IF EXISTS `SP_getAdminID`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getAdminID` (IN `ID` INT)  NO SQL
SELECT admin.adminId from admin where admin.adminId = ID$$

DROP PROCEDURE IF EXISTS `SP_getAdminLastName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getAdminLastName` (IN `id` INT)  NO SQL
SELECT admin.lastName FROM admin WHERE admin.adminId = id$$

DROP PROCEDURE IF EXISTS `SP_getAllCourses`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getAllCourses` ()  NO SQL
SELECT course.courseCode, course.description from course WHERE course.active = 1$$

DROP PROCEDURE IF EXISTS `SP_getContent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getContent` (IN `courseID` VARCHAR(10))  NO SQL
SELECT content.path, content.type, content.description  FROM content WHERE content.courseCode = courseID$$

DROP PROCEDURE IF EXISTS `SP_getCourseName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getCourseName` (IN `corID` INT)  NO SQL
SELECT course.description from course WHERE course.courseCode = corID$$

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

DROP PROCEDURE IF EXISTS `SP_GetStudentFirstName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetStudentFirstName` (IN `id` INT)  NO SQL
SELECT student.firstName from student WHERE student.studentId = id$$

DROP PROCEDURE IF EXISTS `SP_getStudentID`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getStudentID` (IN `studentid` VARCHAR(255))  NO SQL
SELECT student.studentId FROM student WHERE student.studentId = studentid$$

DROP PROCEDURE IF EXISTS `SP_getStudentLastName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getStudentLastName` (IN `id` INT)  NO SQL
SELECT student.lastName from student WHERE student.studentId = id$$

DROP PROCEDURE IF EXISTS `SP_insertContent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertContent` (IN `courseID` VARCHAR(10), IN `vType` VARCHAR(255), IN `vDesc` VARCHAR(255), IN `vFilename` VARCHAR(255))  NO SQL
INSERT INTO CONTENT (courseCode, type, description, path)
VALUES (courseID, vType, vDesc, vFilename)$$

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
-- Dumping data for table `admin`
--

REPLACE INTO `admin` (`adminId`, `password`, `firstName`, `lastName`) VALUES
(1, 'pass', 'jed', 'palm');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `contentId` int(11) NOT NULL AUTO_INCREMENT,
  `uploadDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `courseCode` varchar(9) NOT NULL,
  `type` varchar(15) NOT NULL,
  `description` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`contentId`),
  KEY `courseId` (`courseCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `courseCode` varchar(9) NOT NULL,
  `description` varchar(40) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`courseCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

REPLACE INTO `course` (`courseCode`, `description`, `active`) VALUES
('52', 'testcor1', 1),
('55', 'testcor2', 1);

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
-- Dumping data for table `instructor`
--

REPLACE INTO `instructor` (`instructorId`, `password`, `addedBy`, `firstName`, `lastName`) VALUES
(54321, 'password', 1, 'test', 'instructor');

-- --------------------------------------------------------

--
-- Table structure for table `instructormap`
--

DROP TABLE IF EXISTS `instructormap`;
CREATE TABLE IF NOT EXISTS `instructormap` (
  `instructorMapId` int(11) NOT NULL AUTO_INCREMENT,
  `instructorId` int(7) NOT NULL,
  `courseCode` varchar(9) NOT NULL,
  PRIMARY KEY (`instructorMapId`),
  KEY `instructorId` (`instructorId`),
  KEY `courseId` (`courseCode`),
  KEY `courseCode` (`courseCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Dumping data for table `student`
--

REPLACE INTO `student` (`studentId`, `password`, `addedBy`, `firstName`, `lastName`) VALUES
(12345, 'password', 1, 'aaaaa', 'bbbbb');

-- --------------------------------------------------------

--
-- Table structure for table `studentmap`
--

DROP TABLE IF EXISTS `studentmap`;
CREATE TABLE IF NOT EXISTS `studentmap` (
  `studentMapId` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(7) NOT NULL,
  `courseCode` varchar(9) NOT NULL,
  PRIMARY KEY (`studentMapId`),
  KEY `studentId` (`studentId`),
  KEY `courseId` (`courseCode`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentmap`
--

REPLACE INTO `studentmap` (`studentMapId`, `studentId`, `courseCode`) VALUES
(4, 12345, '52');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `admin` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructormap`
--
ALTER TABLE `instructormap`
  ADD CONSTRAINT `instructormap_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instructormap_ibfk_2` FOREIGN KEY (`instructorId`) REFERENCES `instructor` (`instructorId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `admin` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentmap`
--
ALTER TABLE `studentmap`
  ADD CONSTRAINT `studentmap_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentmap_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
