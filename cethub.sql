-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2017 at 03:42 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cethub`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `slug`, `body`, `post_image`, `created_at`) VALUES
(1, 'CONGRATULATIONS TO THE NEW UDM ELECTRONICS ENGINEERS', 'CONGRATULATIONS-TO-THE-NEW-UDM-ELECTRONICS-ENGINEERS', '<p><span style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\">CONGRATULATIONS TO THE NEW ELECTRONICS ENGINEERS AND ELECTRONICS TECHNICIANS WHO PASSED THE APRIL AND OCTOBER 2016 PRC EXAMINATIONS!</span><br></p>', 'APRIL-2016.jpg', '2017-09-28 09:40:18'),
(2, 'CONGRATULATIONS TO THE NEW UDM ELECTRONICS ENGINEERS', 'CONGRATULATIONS-TO-THE-NEW-UDM-ELECTRONICS-ENGINEERS', '<p><span style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\">CONGRATULATIONS TO THE NEW ELECTRONICS ENGINEERS AND ELECTRONICS TECHNICIANS WHO PASSED THE APRIL &nbsp;2017 PRC EXAMINATIONS!</span><br></p>', 'APRIL-2017.jpg', '2017-09-28 09:40:38'),
(3, 'CONGRATULATIONS TO THE NEW UDM CRIMINOLOGISTS', 'CONGRATULATIONS-TO-THE-NEW-UDM-CRIMINOLOGISTS', '<p style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\">THE UDM COMMUNITY AND THE COLLEGE OF CRIMINOLOGY CONGRATULATES THE SUCCESSFUL EXAMINEES!</p><p style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\">MR. JAY-AR M. LARON RANKED 10TH PLACER IN THE JUNE 2017 EXAMINATION.</p><p style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\">UDM PASSING PERCENTAGE IS 96.77%</p><p style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\">&nbsp;</p><p style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\">WE ARE PROUD OF YOU!.</p>', '19958966_1812431565449887_3611566810412302586_n.jpg', '2017-09-28 09:42:03'),
(4, 'CONGRATULATIONS', 'CONGRATULATIONS', '<p style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\">This young man rank 3rd nationwide in Criminology Licensure Examination held last October 2014!</p><p style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\">Be one of them!</p>', '20106770_1722575978043522_2101282058113311831_n.jpg', '2017-09-28 09:52:25'),
(5, 'LIGHTING OF LANTERNS TO MARK ASEAN’S 50TH ANNIVERSARY TUESDAY, AUGUST 08, 2017', 'LIGHTING-OF-LANTERNS-TO-MARK-ASEANS-50TH-ANNIVERSARY-TUESDAY-AUGUST-08-2017', '<p><span style=\"color: rgb(102, 102, 102); font-family: posting-paragraph; font-size: 16px;\">The Universidad de Manila and the City Hall of Manila lead the historical national and simultaneous ASEAN Lantern Lighting, bearing the theme “Under One Light, We Are One ASEAN” last August 8, 2017 at the Plaza Rajah Sulayman Malate, Manila</span><br></p>', '21244851_1543262585696712_1878627723_n.jpg', '2017-09-28 09:53:25'),
(6, 'CONGRATULATIONS TO THE NEW UDM SOCIAL WORKERS', 'CONGRATULATIONS-TO-THE-NEW-UDM-SOCIAL-WORKERS', '<p><span style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\">Congratulations to UDM-CAS for having ranked FOURTH PLACE amomg all participating</span><br style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\"><span style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\">schools, colleges, and universities in the JULY 2017 Social Workers Licensure Examination.</span><br></p>', 'SW.jpg', '2017-09-28 09:54:34'),
(7, 'CONGRATULATIONS TO OUR UDM PHYSICAL THERAPY', 'CONGRATULATIONS-TO-OUR-UDM-PHYSICAL-THERAPY', '<p><span style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\">Congratulations to our UDM Physical Therapy students for passing the Board Exam.</span><br></p>', '20767792_1801397529876242_8237793640996753385_n.jpg', '2017-09-28 09:54:59'),
(8, 'UDM FLAG CEREMONY HOSTING IN MANILA CITY HALL', 'UDM-FLAG-CEREMONY-HOSTING-IN-MANILA-CITY-HALL', '<p style=\"\"><span style=\"\" lucida=\"\" console\",=\"\" \"courier=\"\" new\",=\"\" monospace;=\"\" font-size:=\"\" 12px;=\"\" white-space:=\"\" pre-wrap;\"=\"\">The Universidad de Manila hosted the Manila City Hall employees’ flag raising ceremony headed by Mayor Joseph Estrada last August 29, 2017 at the Freedom Triangle of Manila City Hall. UDM President Atty. Ernesto Maceda, Jr., administrative and academic heads, faculty members, UDM employees and students were present during the activity, joining other employees from the different offices of Manila City Hall.</span></p><p style=\"\"><span style=\"\" lucida=\"\" console\",=\"\" \"courier=\"\" new\",=\"\" monospace;=\"\" font-size:=\"\" 12px;=\"\" white-space:=\"\" pre-wrap;\"=\"\">Atty. Maceda rendered a short message and introduced the production number of UDM students. The production&nbsp; number showcased the achievements of the University and the presentation of succesful UDM graduates such as Mr. Kenneth John Montegrande, a succesful businessman, Senior Police Inspector Roldan Manulit of Bulacan and Atty. Ramil Commendador.<br></span><br></p>', '21244573_883029765189302_1007919881_n.jpg', '2017-09-28 09:55:41'),
(10, 'UDM IS NOW OFFICIALLY AN INSTITUTIONAL MEMBER OF ROYAL INSTITUTION SINGAPORE', 'UDM-IS-NOW-OFFICIALLY-AN-INSTITUTIONAL-MEMBER-OF-ROYAL-INSTITUTION-SINGAPORE', '<p><span style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 12px;\">Part of the University Week Celebration is the Unveiling of UDM Organizational Chart</span><br></p>', '21751512_1081760548620886_8288164035123893427_n.jpg', '2017-09-28 10:03:03'),
(11, 'SCHEDULE OF ENROLLMENT FOR 2ND SEMESTER, SY 2017-18', 'SCHEDULE-OF-ENROLLMENT-FOR-2ND-SEMESTER-SY-2017-18', '<p></p><h2 style=\"\">ENROLLMENT FOR SECOND SEMESTER, SY 2017-18</h2><div style=\"\">OCTOBER 23, 2017<span style=\"white-space: pre;\">	</span>2ND YEAR</div><div style=\"\">OCTOBER 24-25, 2017<span style=\"white-space: pre;\">	</span>3RD YEAR</div><div style=\"\">OCTOBER 26-27, 2017<span style=\"white-space: pre;\">	</span>4TH &amp; 5TH YEAR</div><div style=\"\">OCTOBER 30-31, 2017<span style=\"white-space: pre;\">	</span>CL/GS</div><div style=\"\">NOVEMBER 2-3, 2017<span style=\"white-space: pre;\">	</span>SHS</div><div style=\"\">NOVEMBER 6, 2017<span style=\"white-space: pre;\">	</span>CLASSES START</div><div style=\"\">NOVEMBER 6-10, 2017<span style=\"white-space: pre;\">	</span>ADD/DROP/CHANGE OF SUBJECT</div><p></p>', 'logo.png', '2017-09-28 10:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `chat_log`
--

CREATE TABLE `chat_log` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `units` varchar(1) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_id`, `course_title`, `course_code`, `units`, `schedule`, `room`, `instructor`, `section_id`, `sem_id`) VALUES
(1, 0, 'Advanced Business English with Fundamentals of Reasearch', 'ENG 013', '3', '', '', '', 3, 1),
(2, 0, 'Philippine Literature', 'ENG 014', '3', '', '', '', 3, 1),
(3, 0, 'Masining na Pagpapahayag', 'FIL 013', '3', '', '', '', 3, 1),
(4, 0, 'Andres Bonifacio and the Katipunan Movement', 'SOC 015', '3', '', '', '', 3, 1),
(5, 0, 'Basic and Applied Statistics', 'MATH 013', '3', '', '', '', 3, 1),
(6, 0, 'Arts Appreciation', 'HUM 014', '3', '', '', '', 3, 1),
(7, 0, 'Introduction to Programming', 'ACS 211', '4', '', '', '', 3, 1),
(8, 0, 'Physics for Computers', 'PHY 011B', '5', '', '', '', 3, 1),
(9, 0, 'Analytic Geometry', 'MTH 014B', '3', '', '', '', 3, 1),
(10, 0, 'Physical Education 3', 'PE 013', '2', '', '', '', 3, 1),
(11, 0, 'Data Communication & Basic Network Concepts', 'ACS 311', '3', '', '', '', 8, 1),
(12, 0, 'DataBase Management Systems 2', 'ACS 312', '3', '', '', '', 8, 1),
(13, 0, 'Multimedia Technology I', 'ACS 313', '3', '', '', '', 8, 1),
(14, 0, 'Object Oriented Programming', 'ACS 314', '3', '', '', '', 8, 1),
(15, 0, 'System Analysis & Design', 'ACS 315', '3', '', '', '', 8, 1),
(16, 0, 'Computer systems Organization & Assembly Language', 'ACS 316', '3', '', '', '', 8, 1),
(17, 0, 'Web Application Design I', 'ACS 317', '3', '', '', '', 8, 1),
(18, 0, 'Business Process I (Fund of Business process)', 'BPO 101', '3', '', '', '', 8, 1),
(19, 0, 'Data Communication & Basic Network Concepts', 'ACS 311', '3', '', '', '', 9, 1),
(20, 0, 'DataBase Management Systems 2', 'ACS 312', '3', '', '', '', 9, 1),
(21, 0, 'Multimedia Technology I', 'ACS 313', '3', '', '', '', 9, 1),
(22, 0, 'Object Oriented Programming', 'ACS 314', '3', '', '', '', 9, 1),
(23, 0, 'System Analysis & Design', 'ACS 315', '3', '', '', '', 9, 1),
(24, 0, 'Computer systems Organization & Assembly Language', 'ACS 316', '3', '', '', '', 9, 1),
(25, 0, 'Web Application Design I', 'ACS 317', '3', '', '', '', 9, 1),
(26, 0, 'Business Process I (Fund of Business process)', 'BPO 101', '3', '', '', '', 9, 1),
(27, 0, 'Microprocessor Systems', 'CPE 444', '4', '', '', '', 14, 1),
(28, 0, 'E-Commerce', 'BIT 311', '3', '', '', '', 14, 1),
(29, 0, 'Operating Systems', 'CPE 424B', '3', '', '', '', 14, 1),
(30, 0, 'Basic Accounting', 'ACS 411', '3', '', '', '', 14, 1),
(31, 0, 'Network Security and Management', 'BIT 414', '3', '', '', '', 14, 1),
(32, 0, 'Software Engineering', 'CPE 423', '3', '', '', '', 14, 1),
(33, 0, 'Internship1 (250 Hours)', 'BIT 416', '6', '', '', '', 14, 1),
(34, 0, 'Microprocessor Systems', 'CPE 444', '4', '', '', '', 15, 1),
(35, 0, 'E-Commerce', 'BIT 311', '3', '', '', '', 15, 1),
(36, 0, 'Operating Systems', 'CPE 424B', '3', '', '', '', 15, 1),
(37, 0, 'Basic Accounting', 'ACS 411', '3', '', '', '', 15, 1),
(38, 0, 'Network Security and Management', 'BIT 414', '3', '', '', '', 15, 1),
(39, 0, 'Software Engineering', 'CPE 423', '3', '', '', '', 15, 1),
(40, 0, 'Internship1 (250 Hours)', 'BIT 416', '6', '', '', '', 15, 1),
(41, 0, 'World Literature', 'ENG 015', '3', 'MTH 7:00-8:30', '302', '17', 3, 2),
(42, 0, 'Speech and Oral Communication', 'ENG 016', '3', 'TF 7:00-8:30', '303', '17', 3, 2),
(43, 0, 'Multimedia Criticism', 'ENG 017', '3', 'WS 7:00-8:30', '304', '17', 3, 2),
(44, 0, 'Personal Financial Management', 'MAN 011', '3', '', '', '', 3, 2),
(45, 0, 'Life, Works and Writings of Rizal', 'SOC 016', '3', '', '', '', 3, 2),
(46, 0, 'Economics, taxation, Land Reform and Cooperatives', 'SOC 017', '3', '', '', '', 3, 2),
(47, 0, 'Data Structure & Algorithm Analysis', 'ACS 221', '3', '', '', '', 3, 2),
(48, 0, 'Business Communication', 'BCO 101', '3', '', '', '', 3, 2),
(49, 0, 'Service Culture', 'ACS 222', '3', '', '', '', 3, 2),
(50, 0, 'Digital & Logic Circuits', 'SCU 101', '3', '', '', '', 3, 2),
(51, 0, 'Physical Fitness IV', 'PE 014', '2', 'S 7:00-8:00', '', '16', 3, 2),
(52, 0, 'Advanced Computer Networking', 'ACS 321', '3', '', '', '', 8, 2),
(53, 0, 'Computer Architecture', 'BIT 321', '3', '', '', '', 8, 2),
(54, 0, 'Project Management', 'BIT 322', '3', '', '', '', 8, 2),
(55, 0, 'Web Application Design 2', 'ACS 323', '3', '', '', '', 8, 2),
(56, 0, 'Multimedia Technology 2 (3D software)', 'BIT 323', '3', '', '', '', 8, 2),
(57, 0, 'Business Process2 (Fund.of Business Process Outsourcing 2)', 'BPO 102', '3', '', '', '', 8, 2),
(58, 0, 'Principles of Critical Thinking', 'STH 101', '3', '', '', '', 8, 2),
(59, 0, 'Network Technologies', 'BIT 324', '3', '', '', '', 8, 2),
(60, 0, 'Advanced Computer Networking', 'ACS 321', '3', '', '', '', 9, 2),
(61, 0, 'Computer Architecture', 'BIT 321', '3', '', '', '', 9, 2),
(62, 0, 'Project Management', 'BIT 322', '3', '', '', '', 9, 2),
(63, 0, 'Web Application Design 2', 'ACS 323', '3', '', '', '', 9, 2),
(64, 0, 'Multimedia Technology 2 (3D software)', 'BIT 323', '3', '', '', '', 9, 2),
(65, 0, 'Business Process2 (Fund.of Business Process Outsourcing 2)', 'BPO 102', '3', '', '', '', 9, 2),
(66, 0, 'Principles of Critical Thinking', 'STH 101', '3', '', '', '', 9, 2),
(67, 0, 'Network Technologies', 'BIT 324', '3', '', '', '', 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_log`
--

CREATE TABLE `course_log` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `grade` float DEFAULT NULL,
  `npe` varchar(4) NOT NULL,
  `ope` varchar(4) NOT NULL,
  `le` varchar(2) NOT NULL,
  `remarks` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_log`
--

INSERT INTO `course_log` (`id`, `course`, `student`, `grade`, `npe`, `ope`, `le`, `remarks`) VALUES
(1, 41, 14, 96, '3.75', '1.25', 'A', 'PASSED'),
(2, 41, 2, 95, '3.75', '1.25', 'A', 'PASSED'),
(3, 41, 15, 75, '2.00', '3.00', 'C-', 'PASSED'),
(4, 42, 14, 0, '', '', '', ''),
(5, 42, 2, 90, '3.25', '1.75', 'B+', 'PASSED'),
(6, 42, 15, 0, '', '', '', ''),
(7, 43, 14, 0, '', '', '', ''),
(8, 43, 2, 89, '3.25', '1.75', 'B+', 'PASSED'),
(9, 43, 15, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ref_course`
--

CREATE TABLE `ref_course` (
  `id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `units` varchar(1) DEFAULT NULL,
  `course` varchar(255) NOT NULL,
  `year_level` int(11) NOT NULL,
  `sem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_course`
--

INSERT INTO `ref_course` (`id`, `course_title`, `course_code`, `units`, `course`, `year_level`, `sem`) VALUES
(1, 'Advanced Business English with Fundamentals of Reasearch', 'ENG 013', '3', 'IT', 2, '1st'),
(2, 'Philippine Literature', 'ENG 014', '3', 'IT', 2, '1st'),
(3, 'Masining na Pagpapahayag', 'FIL 013', '3', 'IT', 2, '1st'),
(4, 'Andres Bonifacio and the Katipunan Movement', 'SOC 015', '3', 'IT', 2, '1st'),
(5, 'Basic and Applied Statistics', 'MATH 013', '3', 'IT', 2, '1st'),
(6, 'Arts Appreciation', 'HUM 014', '3', 'IT', 2, '1st'),
(7, 'Introduction to Programming', 'ACS 211', '4', 'IT', 2, '1st'),
(8, 'Physics for Computers', 'PHY 011B', '5', 'IT', 2, '1st'),
(9, 'Analytic Geometry', 'MTH 014B', '3', 'IT', 2, '1st'),
(10, 'Physical Education 3', 'PE 013', '2', 'IT', 2, '1st'),
(11, 'World Literature', 'ENG 015', '3', 'IT', 2, '2nd'),
(12, 'Speech and Oral Communication', 'ENG 016', '3', 'IT', 2, '2nd'),
(13, 'Multimedia Criticism', 'ENG 017', '3', 'IT', 2, '2nd'),
(14, 'Personal Financial Management', 'MAN 011', '3', 'IT', 2, '2nd'),
(15, 'Life, Works and Writings of Rizal', 'SOC 016', '3', 'IT', 2, '2nd'),
(16, 'Economics, taxation, Land Reform and Cooperatives', 'SOC 017', '3', 'IT', 2, '2nd'),
(17, 'Data Structure & Algorithm Analysis', 'ACS 221', '3', 'IT', 2, '2nd'),
(18, 'Business Communication', 'BCO 101', '3', 'IT', 2, '2nd'),
(19, 'Service Culture', 'ACS 222', '3', 'IT', 2, '2nd'),
(20, 'Digital & Logic Circuits', 'SCU 101', '3', 'IT', 2, '2nd'),
(21, 'Physical Fitness IV', 'PE 014', '2', 'IT', 2, '2nd'),
(22, 'Database Management Systems I', 'ACS 221', '3', 'IT', 2, 'summer'),
(23, 'Interface Design and Vector Graphic using AUTOCAD', 'ACS 224', '3', 'IT', 2, 'summer'),
(24, 'Web Programming/Basic Web Design', 'ACS 225', '3', 'IT', 2, 'summer'),
(25, 'Data Communication & Basic Network Concepts', 'ACS 311', '3', 'IT', 3, '1st'),
(26, 'DataBase Management Systems 2', 'ACS 312', '3', 'IT', 3, '1st'),
(27, 'Multimedia Technology I', 'ACS 313', '3', 'IT', 3, '1st'),
(28, 'Object Oriented Programming', 'ACS 314', '3', 'IT', 3, '1st'),
(29, 'System Analysis & Design', 'ACS 315', '3', 'IT', 3, '1st'),
(30, 'Computer systems Organization & Assembly Language', 'ACS 316', '3', 'IT', 3, '1st'),
(31, 'Web Application Design I', 'ACS 317', '3', 'IT', 3, '1st'),
(32, 'Business Process I (Fund of Business process)', 'BPO 101', '3', 'IT', 3, '1st'),
(33, 'Advanced Computer Networking', 'ACS 321', '3', 'IT', 3, '2nd'),
(34, 'Computer Architecture', 'BIT 321', '3', 'IT', 3, '2nd'),
(35, 'Project Management', 'BIT 322', '3', 'IT', 3, '2nd'),
(36, 'Web Application Design 2', 'ACS 323', '3', 'IT', 3, '2nd'),
(37, 'Multimedia Technology 2 (3D software)', 'BIT 323', '3', 'IT', 3, '2nd'),
(38, 'Business Process2 (Fund.of Business Process Outsourcing 2)', 'BPO 102', '3', 'IT', 3, '2nd'),
(39, 'Principles of Critical Thinking', 'STH 101', '3', 'IT', 3, '2nd'),
(40, 'Network Technologies', 'BIT 324', '3', 'IT', 3, '2nd'),
(41, 'Microprocessor Systems', 'CPE 444', '4', 'IT', 4, '1st'),
(42, 'E-Commerce', 'BIT 311', '3', 'IT', 4, '1st'),
(43, 'Operating Systems', 'CPE 424B', '3', 'IT', 4, '1st'),
(44, 'Basic Accounting', 'ACS 411', '3', 'IT', 4, '1st'),
(45, 'Network Security and Management', 'BIT 414', '3', 'IT', 4, '1st'),
(46, 'Software Engineering', 'CPE 423', '3', 'IT', 4, '1st'),
(47, 'Internship1 (250 Hours)', 'BIT 416', '6', 'IT', 4, '1st');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `year_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `year_level`) VALUES
(1, 'EK21', 2),
(2, 'CO21', 2),
(3, 'IT21', 2),
(4, 'EK31', 3),
(5, 'EK32', 3),
(6, 'CO31', 3),
(7, 'CO32', 3),
(8, 'IT31', 3),
(9, 'IT32', 3),
(10, 'EK41', 4),
(11, 'EK42', 4),
(12, 'CO41', 4),
(13, 'CO42', 4),
(14, 'IT41', 4),
(15, 'IT42', 4),
(16, 'EK51', 5),
(17, 'CO51', 5);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `sem_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `sem_name`) VALUES
(1, 'SY2016-2017 1st Semester'),
(2, 'SY2016-2017 2nd Semester');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `id/student_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` int(1) NOT NULL DEFAULT '1',
  `year_entered` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'noimage.jpg',
  `course` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fname`, `mname`, `lname`, `id/student_no`, `password`, `usertype`, `year_entered`, `address`, `birthday`, `email`, `phone`, `user_image`, `course`) VALUES
(1, 'admin', 'Admin', '', 'Marvs', 'ADMIN01', 'admin', 3, 0, '', '', '', '', 'YBt4tOS3.png', 'admin'),
(2, '14-1249', 'Marvic', 'P', 'Garcia', '14-UC-25-1249-63', 'cethub', 1, 0, NULL, NULL, NULL, NULL, 'noimage.jpg', NULL),
(12, '14-0001', 'Melvin', 'M', 'Jubay', '14-UC-01-0001-63', 'cethub', 1, 0, NULL, NULL, NULL, NULL, 'noimage.jpg', NULL),
(13, '14-0002', 'Melvin', 'M', 'Mananquil', '14-UC-01-0002-63', 'cethub', 1, 0, NULL, NULL, NULL, NULL, 'noimage.jpg', NULL),
(14, '14-0003', 'Jasril Dane', 'M', 'Caliwag', '14-UC-01-0003-63', 'cethub', 1, 0, NULL, NULL, NULL, NULL, 'noimage.jpg', NULL),
(15, '14-0004', 'Jomari', 'B', 'Iñola', '14-UC-01-0004-63', 'cethub', 1, 0, NULL, NULL, NULL, NULL, 'noimage.jpg', NULL),
(16, 'FAC0001', 'Richard', '', 'Gutierrez', 'FAC0001', 'cethub', 2, 0, NULL, NULL, NULL, NULL, 'noimage.jpg', 'faculty'),
(17, 'FAC0002', 'Angel', '', 'Locsin', 'FAC0002', 'cethub', 2, 0, NULL, NULL, NULL, NULL, 'noimage.jpg', 'faculty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_log`
--
ALTER TABLE `chat_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_log`
--
ALTER TABLE `course_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_course`
--
ALTER TABLE `ref_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`),
  ADD UNIQUE KEY `section_id` (`section_id`),
  ADD UNIQUE KEY `section_name` (`section_name`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`),
  ADD UNIQUE KEY `sem_id` (`sem_id`),
  ADD UNIQUE KEY `sem_name` (`sem_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `student_no` (`id/student_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `chat_log`
--
ALTER TABLE `chat_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `course_log`
--
ALTER TABLE `course_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ref_course`
--
ALTER TABLE `ref_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
