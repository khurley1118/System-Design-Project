-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2018 at 12:03 PM
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
DROP PROCEDURE IF EXISTS `SP_addInstructorToCourse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_addInstructorToCourse` (IN `idNum` INT, IN `CourseCode` VARCHAR(9))  NO SQL
INSERT INTO instructormap
(instructormap.instructorId, instructormap.courseCode)
VALUES
(idNum, CourseCode)$$

DROP PROCEDURE IF EXISTS `SP_addStudentToCourse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_addStudentToCourse` (IN `idNum` INT, IN `CourseCode` VARCHAR(9))  NO SQL
INSERT INTO studentmap
(studentmap.studentId, studentmap.courseCode)
VALUES
(idNum, CourseCode)$$

DROP PROCEDURE IF EXISTS `SP_changeAdminPassword`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_changeAdminPassword` (IN `inId` INT(11), IN `newPass` VARCHAR(255))  MODIFIES SQL DATA
UPDATE admin SET admin.password = newPass where admin.adminId = inId$$

DROP PROCEDURE IF EXISTS `SP_changeInstructorPassword`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_changeInstructorPassword` (IN `inId` INT(11), IN `newPass` VARCHAR(255))  MODIFIES SQL DATA
    DETERMINISTIC
UPDATE instructor SET instructor.password = newPass where instructor.instructorId = inId$$

DROP PROCEDURE IF EXISTS `SP_changeStudentPassword`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_changeStudentPassword` (IN `sid` INT(11), IN `newPass` VARCHAR(255))  MODIFIES SQL DATA
UPDATE student SET student.password = newPass where student.studentId = sid$$

DROP PROCEDURE IF EXISTS `SP_createAdmin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_createAdmin` (IN `adminId` INT(7), IN `password` VARCHAR(255), IN `fname` VARCHAR(30), IN `lname` VARCHAR(30))  MODIFIES SQL DATA
INSERT INTO admin
(admin.adminId, admin.password, admin.firstName, admin.lastName) VALUES
(adminId, password, fname, lname)$$

DROP PROCEDURE IF EXISTS `SP_createAudio`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_createAudio` (IN `courseid` VARCHAR(11), IN `vloc` INT(12), IN `vpath` VARCHAR(50), IN `vdesc` VARCHAR(50))  NO SQL
INSERT into audio (courseCode, locationID, path, description) VALUES (courseid, vloc, vpath, vdesc)$$

DROP PROCEDURE IF EXISTS `SP_createCourse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_createCourse` (IN `courseID` VARCHAR(9), IN `description` VARCHAR(40))  NO SQL
INSERT INTO course
(course.courseCode, course.description)
VALUES (courseID, description)$$

DROP PROCEDURE IF EXISTS `SP_createDoc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_createDoc` (IN `courseID` VARCHAR(11), IN `location` INT(12), IN `vpath` VARCHAR(50), IN `vdescription` VARCHAR(50))  NO SQL
INSERT into documents (courseCode, locationID, path, description) VALUES (courseid, location, vpath, vdescription)$$

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

DROP PROCEDURE IF EXISTS `SP_createVideo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_createVideo` (IN `courseid` VARCHAR(9), IN `location` INT(11), IN `vpath` VARCHAR(100), IN `vdescription` VARCHAR(100))  INSERT into video (courseCode, locationID, path, description) VALUES (courseid, location, vpath, vdescription)$$

DROP PROCEDURE IF EXISTS `SP_deleteOldMessages`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_deleteOldMessages` (IN `time` INT, IN `senderId` INT, IN `recipientId` INT)  NO SQL
delete from chat where ((chat.senderid = senderId AND chat.recipientId = recipientId) OR (chat.senderid = recipientId AND chat.recipientId = senderId)) AND chat.time < time$$

DROP PROCEDURE IF EXISTS `SP_editAdminNames`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_editAdminNames` (IN `id` INT(11), IN `firstName` VARCHAR(255), IN `lastName` VARCHAR(255))  MODIFIES SQL DATA
UPDATE admin SET admin.firstName = firstName, admin.lastName = lastName where admin.adminId = id$$

DROP PROCEDURE IF EXISTS `SP_editInstructorNames`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_editInstructorNames` (IN `id` INT(11), IN `firstName` VARCHAR(255), IN `lastName` VARCHAR(255))  MODIFIES SQL DATA
UPDATE instructor SET instructor.firstName = firstName, instructor.lastName = lastName where instructor.instructorId = id$$

DROP PROCEDURE IF EXISTS `Sp_editStudentNames`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_editStudentNames` (IN `id` INT(11), IN `firstName` VARCHAR(255), IN `lastName` VARCHAR(255))  MODIFIES SQL DATA
UPDATE student SET student.firstName = firstName, student.lastName = lastName where student.studentId = id$$

DROP PROCEDURE IF EXISTS `SP_fetchAdminPassword`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_fetchAdminPassword` (IN `ID` INT(7))  NO SQL
SELECT admin.password from admin WHERE admin.adminId = ID$$

DROP PROCEDURE IF EXISTS `SP_fetchAllInstructorIDs`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_fetchAllInstructorIDs` ()  NO SQL
SELECT instructor.instructorId FROM instructor$$

DROP PROCEDURE IF EXISTS `SP_fetchAllInstructors`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_fetchAllInstructors` ()  NO SQL
select * from instructor$$

DROP PROCEDURE IF EXISTS `SP_fetchAllStudentIDs`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_fetchAllStudentIDs` ()  NO SQL
SELECT student.studentId FROM student$$

DROP PROCEDURE IF EXISTS `SP_fetchInstructorPW`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_fetchInstructorPW` (IN `id` INT(8))  NO SQL
SELECT instructor.password FROM instructor WHERE instructor.instructorId = id$$

DROP PROCEDURE IF EXISTS `SP_fetchStudentPassword`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_fetchStudentPassword` (IN `sid` INT(7))  NO SQL
SELECT student.password FROM student WHERE student.studentId = sid$$

DROP PROCEDURE IF EXISTS `SP_getAdmin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getAdmin` (IN `id` INT)  NO SQL
SELECT admin.adminId, admin.password, admin.firstName, admin.lastName from admin WHERE admin.adminId = id$$

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

DROP PROCEDURE IF EXISTS `SP_getAssignedInstructor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getAssignedInstructor` (IN `id` INT)  NO SQL
SELECT instructormap.courseCode from instructormap where instructormap.instructorId = id$$

DROP PROCEDURE IF EXISTS `SP_getAssignedStudent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getAssignedStudent` (IN `id` INT)  NO SQL
SELECT studentmap.courseCode from studentmap where studentmap.studentId = id$$

DROP PROCEDURE IF EXISTS `SP_getAudio`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getAudio` (IN `path` VARCHAR(200))  NO SQL
SELECT audio.uploadDate, audio.description, audio.fileName FROM audio WHERE audio.path = path$$

DROP PROCEDURE IF EXISTS `SP_getAvatarInstructor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getAvatarInstructor` (IN `userID` INT)  NO SQL
SELECT instructor.avatarPath FROM instructor WHERE instructor.instructorId = userID$$

DROP PROCEDURE IF EXISTS `SP_getAvatarStudent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getAvatarStudent` (IN `userID` INT)  NO SQL
SELECT student.avatarPath FROM student WHERE student.studentId = userID$$

DROP PROCEDURE IF EXISTS `SP_getContent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getContent` (IN `courseID` VARCHAR(10))  NO SQL
SELECT content.path, content.type, content.description  FROM content WHERE content.courseCode = courseID$$

DROP PROCEDURE IF EXISTS `SP_getConversation`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getConversation` (IN `senderId` INT(7), IN `recipientId` INT(7))  NO SQL
SELECT * FROM chat WHERE (chat.senderId = senderId AND chat.recipientId = recipientId) OR (chat.senderId = recipientId And chat.recipientId = senderId)  order by chat.time DESC$$

DROP PROCEDURE IF EXISTS `SP_getCourse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getCourse` (IN `id` INT)  NO SQL
SELECT * from course WHERE course.courseCode = id$$

DROP PROCEDURE IF EXISTS `SP_getCourseName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getCourseName` (IN `corID` INT)  NO SQL
SELECT course.description from course WHERE course.courseCode = corID$$

DROP PROCEDURE IF EXISTS `SP_getCourseWName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getCourseWName` (IN `description` VARCHAR(255))  NO SQL
SELECT * from course WHERE course.description = description AND course.active = 1$$

DROP PROCEDURE IF EXISTS `SP_getCurrentInstructor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getCurrentInstructor` (IN `courseCode` VARCHAR(9))  NO SQL
SELECT instructormap.instructorId FROM instructormap where instructormap.courseCode = courseCode$$

DROP PROCEDURE IF EXISTS `SP_getDocs`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getDocs` (IN `courseID` VARCHAR(11))  NO SQL
SELECT * FROM documents WHERE courseCode = courseID$$

DROP PROCEDURE IF EXISTS `SP_GetFacultyID`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetFacultyID` (IN `fid` INT(8))  SELECT instructor.instructorId from instructor WHERE instructor.instructorId = fid$$

DROP PROCEDURE IF EXISTS `SP_getFolders`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getFolders` (IN `course` VARCHAR(11))  NO SQL
SELECT * FROM location WHERE location.courseCode = course$$

DROP PROCEDURE IF EXISTS `SP_getInstructor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getInstructor` (IN `id` INT)  NO SQL
SELECT instructor.instructorId, instructor.password, instructor.firstName, instructor.lastName from instructor WHERE instructor.instructorId = id$$

DROP PROCEDURE IF EXISTS `SP_getInstructorAvatars`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getInstructorAvatars` ()  NO SQL
SELECT instructor.avatarPath
from instructor$$

DROP PROCEDURE IF EXISTS `SP_getInstructorCourses`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getInstructorCourses` (IN `id` INT)  NO SQL
SELECT instructormap.courseCode from instructormap where instructormap.instructorId = id$$

DROP PROCEDURE IF EXISTS `SP_getInstructorFirstName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getInstructorFirstName` (IN `id` INT)  NO SQL
SELECT instructor.firstName from instructor where instructor.instructorId = id$$

DROP PROCEDURE IF EXISTS `SP_getInstructorLastName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getInstructorLastName` (IN `id` INT)  NO SQL
SELECT instructor.lastName from instructor WHERE instructor.instructorId = id$$

DROP PROCEDURE IF EXISTS `SP_getStudent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getStudent` (IN `id` INT(11))  NO SQL
SELECT student.studentId, student.password, student.firstName, student.lastName from student WHERE student.studentId = id$$

DROP PROCEDURE IF EXISTS `SP_getStudentAvatars`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getStudentAvatars` ()  NO SQL
SELECT student.avatarPath
FROM student$$

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

DROP PROCEDURE IF EXISTS `SP_getText`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getText` (IN `path` VARCHAR(200))  NO SQL
SELECT documents.uploadDate, documents.description, documents.fileName FROM documents WHERE documents.path = path$$

DROP PROCEDURE IF EXISTS `SP_getTicket`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getTicket` (IN `id` INT)  NO SQL
SELECT ticket.description, ticket.firstName, ticket.lastName, ticket.submittedBy, ticket.subDate, ticket.status from ticket where ticket.ticketID = id$$

DROP PROCEDURE IF EXISTS `SP_getTickets`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getTickets` ()  NO SQL
SELECT ticket.ticketID, ticket.status from ticket order by ticket.status DESC$$

DROP PROCEDURE IF EXISTS `SP_getVideo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getVideo` (IN `path` VARCHAR(200))  NO SQL
SELECT video.uploadDate, video.description, video.fileName FROM video WHERE video.path = path$$

DROP PROCEDURE IF EXISTS `SP_insertAudio`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertAudio` (IN `courseCode` INT, IN `uploadDate` DATE, IN `path` VARCHAR(255), IN `description` VARCHAR(255), IN `fileName` VARCHAR(255))  MODIFIES SQL DATA
INSERT INTO audio
(audio.courseCode, audio.uploadDate, audio.path, audio.description, audio.fileName)
VALUES (courseCode, uploadDate, path, description, fileName)$$

DROP PROCEDURE IF EXISTS `SP_insertContent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertContent` (IN `courseID` VARCHAR(10), IN `vType` VARCHAR(255), IN `vDesc` VARCHAR(255), IN `vFilename` VARCHAR(255))  NO SQL
INSERT INTO CONTENT (courseCode, type, description, path)
VALUES (courseID, vType, vDesc, vFilename)$$

DROP PROCEDURE IF EXISTS `SP_insertText`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertText` (IN `courseCode` INT, IN `uploadDate` DATE, IN `path` VARCHAR(255), IN `description` VARCHAR(255), IN `fileName` VARCHAR(255))  MODIFIES SQL DATA
INSERT INTO documents
(documents.courseCode, documents.uploadDate, documents.path, documents.description, documents.fileName)
VALUES (courseCode, uploadDate, path, description, fileName)$$

DROP PROCEDURE IF EXISTS `SP_insertTicket`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertTicket` (IN `descript` VARCHAR(1000), IN `fName` VARCHAR(50), IN `lName` VARCHAR(50), IN `subBy` INT(10) UNSIGNED)  NO SQL
INSERT INTO ticket
(ticket.description, ticket.firstName, ticket.lastName, ticket.submittedBy, ticket.subDate) VALUES
(descript, fName, lName, subBy, CURRENT_DATE)$$

DROP PROCEDURE IF EXISTS `SP_insertVideo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertVideo` (IN `courseCode` INT, IN `uploadDate` DATE, IN `path` VARCHAR(255), IN `description` VARCHAR(255), IN `fileName` VARCHAR(255))  MODIFIES SQL DATA
INSERT INTO video
(video.courseCode, video.uploadDate, video.path, video.description, video.fileName)
VALUES (courseCode, uploadDate, path, description, fileName)$$

DROP PROCEDURE IF EXISTS `SP_RemoveAssignedInstructors`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RemoveAssignedInstructors` (IN `courseCode` INT)  MODIFIES SQL DATA
DELETE FROM instructormap WHERE instructormap.courseCode = courseCode$$

DROP PROCEDURE IF EXISTS `SP_RemoveAssignedStudents`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RemoveAssignedStudents` (IN `courseCode` INT)  MODIFIES SQL DATA
DELETE FROM studentmap WHERE studentmap.courseCode = courseCode$$

DROP PROCEDURE IF EXISTS `SP_RemoveAudioContentWCourseCode`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RemoveAudioContentWCourseCode` (IN `courseCode` INT)  MODIFIES SQL DATA
DELETE FROM audio where audio.courseCode = courseCode$$

DROP PROCEDURE IF EXISTS `SP_removeCourse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_removeCourse` (IN `courseCode` INT)  MODIFIES SQL DATA
UPDATE course SET course.active = 0 where course.courseCode = courseCode$$

DROP PROCEDURE IF EXISTS `SP_RemoveDocumentContentWCourseCode`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RemoveDocumentContentWCourseCode` (IN `courseCode` INT)  MODIFIES SQL DATA
DELETE FROM documents where documents.courseCode = courseCode$$

DROP PROCEDURE IF EXISTS `SP_RemoveLocation`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RemoveLocation` (IN `courseCode` INT)  MODIFIES SQL DATA
DELETE FROM location where location.courseCode = courseCode$$

DROP PROCEDURE IF EXISTS `SP_removeStudentFromCourse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_removeStudentFromCourse` (IN `idNum` INT, IN `courseId` VARCHAR(9))  NO SQL
DELETE FROM studentmap WHERE studentmap.courseCode = courseId AND studentmap.studentId = idNum$$

DROP PROCEDURE IF EXISTS `SP_RemoveVideoContentWCourseCode`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RemoveVideoContentWCourseCode` (IN `courseCode` INT)  MODIFIES SQL DATA
DELETE FROM video where video.courseCode = courseCode$$

DROP PROCEDURE IF EXISTS `SP_resolveTicket`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_resolveTicket` (IN `id` INT(10))  NO SQL
UPDATE ticket
SET ticket.status = 'Resolved'
WHERE ticket.ticketID = id$$

DROP PROCEDURE IF EXISTS `SP_setAvatarInstructor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_setAvatarInstructor` (IN `idNum` INT, IN `path` VARCHAR(255))  NO SQL
UPDATE instructor
SET instructor.avatarPath = path
WHERE instructor.instructorId = idNum$$

DROP PROCEDURE IF EXISTS `SP_setAvatarStudent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_setAvatarStudent` (IN `idNum` INT, IN `path` VARCHAR(255))  NO SQL
UPDATE student
SET student.avatarPath = path
WHERE student.studentId = idNum$$

DROP PROCEDURE IF EXISTS `SP_unassignInstructor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_unassignInstructor` (IN `idNum` INT, IN `courseCode` VARCHAR(9))  NO SQL
DELETE FROM instructormap WHERE instructormap.courseCode = courseCode AND instructormap.instructorId = idNum$$

DROP PROCEDURE IF EXISTS `SP_updateAdminNames`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_updateAdminNames` (IN `id` INT(11), IN `firstName` VARCHAR(255), IN `lastName` VARCHAR(255))  MODIFIES SQL DATA
UPDATE admin SET admin.firstName = firstName, admin.lastName = lastName where admin.adminId = id$$

DROP PROCEDURE IF EXISTS `SP_updateCourse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_updateCourse` (IN `courseCode` INT, IN `description` VARCHAR(255), IN `isActive` BOOLEAN)  MODIFIES SQL DATA
UPDATE course SET course.description = description, course.active = isActive where course.courseCode = courseCode$$

DROP PROCEDURE IF EXISTS `SP_updateCourseDescription`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_updateCourseDescription` (IN `corId` VARCHAR(9), IN `corDesc` VARCHAR(40))  NO SQL
UPDATE course SET course.description = corDesc where course.courseCode = corId$$

DROP PROCEDURE IF EXISTS `SP_updateCurrentInstructor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_updateCurrentInstructor` (IN `idNum` INT, IN `courseCode` VARCHAR(9))  NO SQL
UPDATE instructormap
SET instructormap.instructorId = idNum
WHERE instructormap.courseCode = courseCode$$

DROP PROCEDURE IF EXISTS `SP_updateInstructorNames`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_updateInstructorNames` (IN `id` INT(11), IN `firstName` VARCHAR(255), IN `lastName` VARCHAR(255))  MODIFIES SQL DATA
UPDATE instructor SET instructor.firstName = firstName, instructor.lastName = lastName where instructor.instructorId = id$$

DROP PROCEDURE IF EXISTS `SP_updateStudentNames`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_updateStudentNames` (IN `id` INT(11), IN `firstName` VARCHAR(255), IN `lastName` VARCHAR(255))  MODIFIES SQL DATA
UPDATE student SET student.firstname = firstName, student.lastName = lastName where student.studentId = id$$

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
(1, '$2y$10$W6JFymWSkKBIeWTm7r8lku9Z2/v3EF2zdI1V7P1C0g35BHGZiruJW', 'Paul', 'Richard'),
(2, '$2y$10$z0V5/nDwYtJ1nSztVq1KHuDqmcbS5C5imvmW0x9GIxMpwsCNRs8Q2', 'Brad', 'Butler');

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

DROP TABLE IF EXISTS `audio`;
CREATE TABLE IF NOT EXISTS `audio` (
  `audio_id` int(1) NOT NULL AUTO_INCREMENT,
  `courseCode` varchar(9) NOT NULL,
  `uploadDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `locationID` int(11) DEFAULT NULL,
  `path` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  PRIMARY KEY (`audio_id`),
  KEY `courseCode` (`courseCode`),
  KEY `locationID` (`locationID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `audio`
--

TRUNCATE TABLE `audio`;
-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `time` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `senderId` int(7) NOT NULL,
  `recipientId` int(7) NOT NULL,
  PRIMARY KEY (`time`,`senderId`),
  KEY `senderId` (`senderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `chat`
--

TRUNCATE TABLE `chat`;
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
-- Truncate table before insert `course`
--

TRUNCATE TABLE `course`;
-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `courseCode` varchar(9) NOT NULL,
  `uploadDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `path` varchar(100) NOT NULL,
  `locationID` int(11) DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  PRIMARY KEY (`doc_id`),
  KEY `courseCode` (`courseCode`),
  KEY `location_id` (`locationID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `documents`
--

TRUNCATE TABLE `documents`;
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
  `avatarPath` varchar(255) DEFAULT 'avatars/default.png',
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

INSERT INTO `instructor` (`instructorId`, `password`, `addedBy`, `firstName`, `lastName`, `avatarPath`) VALUES
(14, '$2y$10$R2M.X0KJce.f88huBnLE/uLub3JW/.A1RtWZwwRQWoBB6IPB9vD52', 2, 'Paul', 'Richard', 'avatars/small.png'),
(15, '$2y$10$te5f9FaouvKapphTn1Y3zus7xUp4c5.cjTSGM3oPt9QhwGv28MXqS', 2, 'Bruce', 'McClary', 'avatars/download (2).jpg'),
(16, '$2y$10$lKnUdS6HMPJ9VPBEOyw6Xu27rB99zbBXGanXj0O0HcWeR42CQEbz6', 2, 'Nick', 'Taggart', 'avatars/images.jpg'),
(17, '$2y$10$Q4nAR985pd7LQCIuh0hlzeHW7ekcqc6O1C/etvN0KKFoTPqBmObHa', 2, 'Tracy', 'Gray', 'avatars/images (1).jpg'),
(23, '$2y$10$H/MC/rytR1k.sYqbgp/9Ye8lw198L0KWSOTdLJJsl/Lcg9dAudjnO', 2, 'Tony', 'Parks', 'avatars/download (4).jpg'),
(24, '$2y$10$glwo5tFmqZ6LeWQOlRNYMeAVhwlqzlRv1Foz4eNLi5Ak6RT0apzyW', 2, 'Mallory', 'Flowers', 'avatars/images.jpg'),
(25, '$2y$10$oLjW5L0TZ0E0Cb8XRqYiZOgu3yo63lY15doDCrClcG4u9a4Qt20E2', 2, 'Dan', 'Crabbe', 'avatars/download (3).jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `instructormap`
--

TRUNCATE TABLE `instructormap`;
-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `courseCode` varchar(9) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`location_id`),
  KEY `courseCode` (`courseCode`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `location`
--

TRUNCATE TABLE `location`;
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
  `avatarPath` varchar(255) DEFAULT 'avatars/default.png',
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

INSERT INTO `student` (`studentId`, `password`, `addedBy`, `firstName`, `lastName`, `avatarPath`) VALUES
(1, '$2y$10$6OFdSy28tupiTAAc4tuukuFeAe2/PcwbLd92r1jsdeEgVBN9RyawO', 2, 'Mark', 'Patterson', 'avatars/pingu.png'),
(2, '$2y$10$amqqiV1No7wMaKQ9YEeBS.PSQAZCRn0O7LDIOoVvEcu3yPtjG2VgW', 2, 'Kyle', 'Hurley', 'avatars/images (1).jfif'),
(3, '$2y$10$E6k4u1bka2WH3Q7FbaPvWeCaXAcSWHRtybeYWIItbyESwSjc52gZq', 2, 'Brad', 'Buttler', 'avatars/download (1).png'),
(4, '$2y$10$CnzSt5oKf12ralvceMBel.gSS2cjwoXf/qLiVNSJk9ztlmkOxe8yS', 2, 'Jed', 'Palmater', 'avatars/images (8).jfif'),
(5, '$2y$10$3dUWaYvxllwJKL1.D639Wu67dFd5VG6aVieRDhECYQo60AvX7SiUO', 2, 'Shelby', 'Cleghorn', 'avatars/images (2).jfif'),
(6, '$2y$10$09/XjDU7mV9st9SlE00ffuHBoQa8m2jT6Hnv.umqDM7EELo02Gn7y', 2, 'Chris', 'Picard', 'avatars/download.jfif'),
(7, '$2y$10$YE7vygNGECohVVVHd9xIu.vpilrs8w8nytqrG5pZ/I6tHcENJrT4S', 2, 'Sam', 'Brown', 'avatars/images (5).jfif'),
(8, '$2y$10$W6awzvf65NewfGKF8jEat.9nqGF2BQ4Qi.Hl0GxsIrXfYvnAFDK7W', 2, 'Luke', 'Appleby', 'avatars/download (4).jfif'),
(9, '$2y$10$8i6C/P1PnLYq1qe7cQ2jHunLBjDzd27Pv7AG8.rUdu52rZY8I5ez2', 2, 'Gabriel', 'Rodriguez', 'avatars/images (2).png'),
(10, '$2y$10$f1pDHbqG.0MHRafATAnineAt3.qdgPFPLAoXwZNo.0/2/ZtH/VMQS', 2, 'Brian', 'Nason', 'avatars/download (3).jfif'),
(11, '$2y$10$vWnntkvtc6143Mwmvt7W6OF.VtIPzkAZtpWRCxpwHVAUhKuKqkYq.', 2, 'Matt', 'Jones', 'avatars/images (3).jfif'),
(12, '$2y$10$4/YrTv/e61nw.6ObgcOiSOCWQoyH3jeSBHyQnvPeGqMUInVzJQpgq', 2, 'Peter', 'Groom', 'avatars/images (7).jfif'),
(13, '$2y$10$8yaJkWexRuMR4XGOd.zNQ.tFfZFbGM3TqZwLpcdsq3Jcpvp538I9.', 2, 'Jeff', 'Hooper', 'avatars/download.png'),
(18, '$2y$10$n1g9cYdudex6W9TwJwW4E.UqvaJkJGp/sipGvshp0GQZ3eQIDKV1u', 2, 'Ben', 'Thornley', 'avatars/images (5).png'),
(19, '$2y$10$bCKmjjBV.gIRLyiU1jh78OJxLPdVdkL1N0kH2ESYmbS6tTC4hteIW', 2, 'Matt', 'Heafy', 'avatars/images (4).png'),
(20, '$2y$10$cd/DYN9Q0SHz5OGOQK0aq.qfx7Nm2/YkW4eZoBvmW5okDUN8Y7NAW', 2, 'Nicole', 'Pedrazzoli', 'avatars/download (1).jfif'),
(21, '$2y$10$KboRPOLNIx2.05QMvz6roezlJx3WtIilbDWRg/ET9AQiWrX6q8y3i', 2, 'Ahmad', 'Sahib', 'avatars/download (2).jfif'),
(22, '$2y$10$zy7PXLNRJ3elXGL8j/YMvuvyMVv0TLXFHF9JxWMJ.swSASYrbDxly', 2, 'Christian', 'Monteith', 'avatars/images (4).jfif');

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `studentmap`
--

TRUNCATE TABLE `studentmap`;
-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `ticketID` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(2000) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `submittedBy` int(10) NOT NULL,
  `subDate` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Unresolved',
  PRIMARY KEY (`ticketID`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `ticket`
--

TRUNCATE TABLE `ticket`;
-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `video_id` int(10) NOT NULL AUTO_INCREMENT,
  `courseCode` varchar(9) NOT NULL,
  `uploadDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `locationID` int(11) DEFAULT NULL,
  `path` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  PRIMARY KEY (`video_id`),
  KEY `courseCode` (`courseCode`),
  KEY `locationID` (`locationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `video`
--

TRUNCATE TABLE `video`;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `audio`
--
ALTER TABLE `audio`
  ADD CONSTRAINT `audio_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audio_ibfk_2` FOREIGN KEY (`locationID`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`locationID`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_ibfk_2` FOREIGN KEY (`locationID`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
