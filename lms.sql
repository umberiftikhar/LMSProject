-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 13, 2024 at 09:15 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

DROP TABLE IF EXISTS `achievements`;
CREATE TABLE IF NOT EXISTS `achievements` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `achievement` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `name`, `achievement`, `created_at`) VALUES
(1, 'M.Ismail', 'Where i can get a other study related material? kindly guide..', '2024-04-26 12:28:19'),
(2, 'M.Ismail', 'I have got good grades in all subjects! I m so excited..', '2024-04-26 12:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `content_inquiries`
--

DROP TABLE IF EXISTS `content_inquiries`;
CREATE TABLE IF NOT EXISTS `content_inquiries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `inquiry` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `content_inquiries`
--

INSERT INTO `content_inquiries` (`id`, `name`, `email`, `inquiry`, `created_at`) VALUES
(1, 'Usman', 'Usman@gmail.com', 'just checking that data is submitted into database or not..', '2024-04-26 15:37:41'),
(2, 'Amir', 'Amir@gmail.com', 'checking checking checking checking..', '2024-04-26 15:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `subjects` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `duration` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `subjects`, `duration`) VALUES
(1, 'Bachelor Of Computer Science', 'IT/CS/SE', 'CS101,CS506,CS508', '4-years'),
(6, 'Bachelor Of Information Technology.', 'BSIT, IT Department', 'CS101, CS504, CS604, CS204, CS609', '4-years'),
(4, 'Bachelor of Business Administration', 'A Bachelor of Business Administration (BBA) degree equips students with a diverse skill set that prepares them to excel in business.', 'MGT501, MGT602, MGT304, MGT251', '4-years'),
(7, 'Associate Degree (ADP)', 'Very Well Course', 'MGT101, MGT 604, MGT 611.', '2-Years');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_name` varchar(100) NOT NULL,
  `feedback` text NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `feedback_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `student_name`, `feedback`, `teacher_name`, `feedback_time`) VALUES
(1, 'M.Ismail', 'Dear M.Ismail I wanted to commend you on your recent performance in class Your attentiveness and participation have been exceptional and it\'s evident that you\'ve put in a lot of effort into your studies Additionally your recent assignment showcased a strong understanding of the material and impressive critical thinking skills Keep up the fantastic work.', 'Muhammad Asif', '2024-04-24 11:35:36'),
(2, 'M.Ismail', 'Great effort keep it up! very good excellent good etc ', 'Muhammad Umair', '2024-04-24 13:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'M.Ismail', 'M.Ismail@gmail.com', 'asdjasi adi uas d uaduaos duajsod asd asodia ', '2024-04-26 15:20:45'),
(2, 'M.Ismail', 'M.Ismail@gmail.com', 'asdjasi adi uas d uaduaos duajsod asd asodia ', '2024-04-26 15:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text,
  `score_of_question` int NOT NULL,
  `gain_score` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`, `score_of_question`, `gain_score`) VALUES
(1, 'What is php?', 'PHP (Hypertext Processor) is a general-purpose scripting language and interpreter that is freely available and widely used for web development. The language is used primarily for server-side scripting, although it can also be used for command-line scripting and, to a limited degree, desktop applications.', 5, 5),
(2, 'What is HTML?', 'HyperText Markup Language (HTML) is the set of markup symbols or codes inserted into a file intended for display on the Internet. The markup tells web browsers how to display a web page\'s words and images.', 5, 5),
(16, 'What is Javascript?', 'JavaScript is a scripting language that enables you to create dynamically updating content, control multimedia, animate images, and pretty much everything else', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_system`
--

DROP TABLE IF EXISTS `quiz_system`;
CREATE TABLE IF NOT EXISTS `quiz_system` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quiz` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `correct_ans` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `submitted_ans` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz_system`
--

INSERT INTO `quiz_system` (`id`, `quiz`, `options`, `correct_ans`, `submitted_ans`) VALUES
(1, 'PHP stands for?', 'Hypertext Preprocessor,Processor,Hypertext,Computer System', 'Hypertext Preprocessor', 'Hypertext Preprocessor'),
(2, 'HTML stands for?', 'Markup language,Hypertext Markup Language,Hypertext,Language', 'Hypertext Markup Language', 'Hypertext Markup Language'),
(3, 'SQL stands for?', 'Query Language,Structured Language,Structured query,Structured Query Language', 'Structured Query Language', 'Structured Language'),
(4, 'What is SQL?', 'SQL,MY SQL,SQL MY,M SQL', 'Structured Query Language', 'SQL MY'),
(5, 'What is LMS?', 'Software,Hardware,Website,Web Application', 'Web Application', 'Website');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `name` varchar(50) DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(40) DEFAULT NULL,
  `cnic` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` int DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`name`, `id`, `email`, `cnic`, `phone`, `password`, `user_type`) VALUES
('Ghafoor', 10, 'Ghafoor@gmail.com', '2147483647', '32134567', 0, 'Teacher'),
('Rana Anwar', 11, 'Rana Anwar@gmail.com', '78945615', '321456987', 0, 'Student'),
('Umair', 16, 'Umair@gmail.com', '123456789', '302010405', 0, 'Student'),
('M. Ibrahim', 14, 'M. Ibrahim@gmail.com', '123456', '4569217', 0, 'Teacher'),
('M.Ismail', 15, 'M.Ismail@gmail.com', '156314', '784411', 0, 'Student'),
('Toqeer Ahmad', 36, 'toqeer1212@gmail.com', '314569821', '0321654987', 0, 'Student'),
('Muhammad Haroon', 35, 'haroon1412@gmail.com', '374125687', '0321654789', 0, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `resultid` int NOT NULL AUTO_INCREMENT,
  `StudentID` int NOT NULL,
  `Course` enum('oop','auto','dbstruct','os') NOT NULL,
  `papertype` enum('short','obj','long','assign') NOT NULL,
  `pointsperquestion` int NOT NULL,
  `totalpoints` int NOT NULL,
  `obtainedmarks` int NOT NULL,
  PRIMARY KEY (`resultid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`resultid`, `StudentID`, `Course`, `papertype`, `pointsperquestion`, `totalpoints`, `obtainedmarks`) VALUES
(8, 47942, 'oop', 'assign', 10, 25, 21),
(7, 365648, 'auto', 'long', 5, 20, 18),
(6, 123486, 'dbstruct', 'short', 3, 15, 11),
(5, 456561, 'os', 'obj', 1, 10, 7),
(9, 321456, 'os', 'obj', 1, 5, 4),
(10, 456123, 'os', 'obj', 1, 5, 5),
(11, 321456, 'os', 'obj', 1, 5, 3),
(12, 987456, 'os', 'obj', 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sb_feedback`
--

DROP TABLE IF EXISTS `sb_feedback`;
CREATE TABLE IF NOT EXISTS `sb_feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_name` varchar(100) NOT NULL,
  `feedback` text NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `feedback_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sb_feedback`
--

INSERT INTO `sb_feedback` (`id`, `student_name`, `feedback`, `teacher_name`, `feedback_time`) VALUES
(1, 'M.Ismail', 'Dear M.ismail I wanted to commend you on your recent performance in class Your attentiveness and participation have been exceptional and it\'s evident that you\'ve put in a lot of effort into your studies Additionally your recent assignment showcased a strong understanding of the material and impressive critical thinking skills Keep up the fantastic work. very good excellent great etc.', 'Muhammad Asif', '2024-04-24 11:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `studentcourses`
--

DROP TABLE IF EXISTS `studentcourses`;
CREATE TABLE IF NOT EXISTS `studentcourses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `enroll_id` int DEFAULT NULL,
  `std_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `studentcourses`
--

INSERT INTO `studentcourses` (`id`, `enroll_id`, `std_id`) VALUES
(15, 7, 27),
(14, 1, 25),
(13, 4, 16),
(16, 7, 30),
(12, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `support_requests`
--

DROP TABLE IF EXISTS `support_requests`;
CREATE TABLE IF NOT EXISTS `support_requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `issue` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `support_requests`
--

INSERT INTO `support_requests` (`id`, `name`, `email`, `issue`, `created_at`) VALUES
(1, 'Usman', 'Usman@gmail.com', 'adnajkshdas ajdoais da jioasdjaso', '2024-04-26 15:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `description`, `image`) VALUES
(33, 'M. Uzair', 'Very Good teacher of English.', 'image/teacher 1.jpg'),
(30, 'M. Asif', 'Very Good Teacher Of Mathematics.', 'image/teacher 2.jpg'),
(32, 'M. Umar', 'Very Good Teacher Of Computer Science.', 'image/teacher 3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `email`, `usertype`, `password`) VALUES
(1, 'admin', '123456789', 'admin@gmail.com', 'admin', '1234'),
(25, 'M.Ismail', '784411', 'M.Ismail@gmail.com', 'student', '123'),
(23, 'M. Ibrahim', '123456', 'M. Ibrahim@gmail.com', 'teacher', '123'),
(32, 'Muhammad Haroon', '03216547891', 'haroon1412@gmail.com', 'teacher', '123789'),
(33, 'Toqeer Ahmad', '0321654987', 'toqeer1212@gmail.com', 'student', '321123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
