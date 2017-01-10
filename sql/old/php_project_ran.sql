-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2016 at 06:14 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cinemas`
--

DROP TABLE IF EXISTS `cinemas`;
CREATE TABLE `cinemas` (
  `Cinema_ID` int(11) NOT NULL,
  `Cinema_Name` varchar(255) NOT NULL,
  `Cinema_Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cinemas`
--

INSERT INTO `cinemas` (`Cinema_ID`, `Cinema_Name`, `Cinema_Address`) VALUES
(1, 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3'),
(2, 'Cinema2', 'Yorkdale Shopping Centre, 3401 Dufferin Street , c/o Yorkdale Shopping Centre, Toronto, ON, M6A 2T9');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `question_id` int(11) NOT NULL,
  `questions` varchar(255) DEFAULT NULL,
  `answers` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`question_id`, `questions`, `answers`, `category`) VALUES
(1, 'Why Become An Online Member?', 'answer1.txt', 'Membership Question'),
(2, '5 Simple Steps To Buy Tickets Online.', 'answer2.txt', 'Booking Question'),
(3, 'Charges For Booking Tickets Online?', 'answer3.txt', 'Booking Question'),
(4, 'Can I Book Tickets In Advance?', 'answer4.txt', 'Booking Question'),
(5, 'Can I Cancel Tickets Booked Online And Get A Refund?', 'answer5.txt', 'Booking Question');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE `films` (
  `Film_Id` int(11) NOT NULL,
  `Film_Time` date DEFAULT NULL,
  `Film_Name` varchar(50) DEFAULT NULL,
  `Film_Director` varchar(50) DEFAULT NULL,
  `Film_Actor` varchar(50) DEFAULT NULL,
  `Film_pic` varchar(50) DEFAULT NULL,
  `Film_length` varchar(50) DEFAULT NULL,
  `Price_Full` float DEFAULT NULL,
  `Avaliable` char(1) DEFAULT 'Y',
  `film_description` varchar(255) DEFAULT NULL,
  `LANGUAGE` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`Film_Id`, `Film_Time`, `Film_Name`, `Film_Director`, `Film_Actor`, `Film_pic`, `Film_length`, `Price_Full`, `Avaliable`, `film_description`, `LANGUAGE`) VALUES
(1, '2016-02-12', 'Deadpool', 'Tim Miller', 'Ryan Reynolds', 'image/deadpool.jpg', '1h 48m', 14, 'Y', 'film1', 'English'),
(2, '2016-01-29', 'Kung Fu Panda 3', 'Jennifer Yuh Nelson', 'Jack Black', 'image/kongfupanda.jpg', '1h 35m', 15, 'Y', 'film2', 'English'),
(3, '2015-09-05', 'Steve Jobs', 'Danny Boyle', 'Michael Fassbender', 'image/stevejobs.jpg', '2h 02m', 20, 'Y', 'film3', 'English'),
(4, '2015-12-18', 'Star Wars:The Force Awakens', 'J.J. Abrams', 'Daisy Ridley', 'image/starwar.jpg', '2h 16m', 20, 'Y', 'film4', 'English'),
(5, '2016-01-08', 'The Revenant', 'Alejandro González Iñárritu', 'Leonordo DiCaprio', 'image/TheRevenant.jpg', '2h 36m', 15, 'Y', 'film5', 'English'),
(6, '2016-02-16', 'The Mermaid', 'Stephen Chow', 'Deng Chao', 'image/meirenyu.jpg', '1h 40m', 25, 'Y', 'film6', 'CHINESE'),
(7, '2015-09-09', 'Mr. Six', 'Guan Hu', 'Feng Xiaogang', 'image/mrsix.jpg', '2h 16m', 30, 'Y', 'film7', 'CHINESE');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `Order_Id` int(11) NOT NULL,
  `Order_DATE` datetime DEFAULT NULL,
  `Customer_Id` int(11) DEFAULT NULL,
  `Total_Price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `Order_DATE`, `Customer_Id`, `Total_Price`) VALUES
(14, '2016-03-24 07:48:27', 7, '45.2'),
(15, '2016-03-24 07:51:12', 7, '45.2'),
(16, '2016-03-24 08:01:07', 7, '45.2'),
(17, '2016-03-24 08:08:01', 7, '96.05'),
(18, '2016-04-13 06:46:07', 7, '76.84'),
(19, '2016-04-13 06:50:42', 7, '16.95'),
(20, '2016-04-13 08:40:27', 7, '31.64'),
(21, '2016-04-13 08:50:04', 7, '33.9'),
(22, '2016-04-15 02:18:38', 7, '0'),
(23, '2016-04-15 02:20:53', 7, '22.6'),
(24, '2016-04-22 05:07:58', 3, '77.97');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `Reservation_Id` int(11) NOT NULL,
  `Running_films` varchar(255) NOT NULL,
  `Cinema_Name` varchar(255) NOT NULL,
  `Cinema_Address` varchar(255) NOT NULL,
  `Run_Time` datetime NOT NULL,
  `Room_Name` varchar(255) NOT NULL,
  `Room_id` int(11) NOT NULL,
  `Seats_Numbers` varchar(255) NOT NULL,
  `Order_Id` int(11) NOT NULL,
  `Price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`Reservation_Id`, `Running_films`, `Cinema_Name`, `Cinema_Address`, `Run_Time`, `Room_Name`, `Room_id`, `Seats_Numbers`, `Order_Id`, `Price`) VALUES
(5, 'Steve Jobs', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-22 12:30:00', 'ROOM1', 1, 'B1', 16, 20),
(6, 'Steve Jobs', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-22 09:30:00', 'ROOM1', 1, 'A4', 16, 20),
(7, 'Steve Jobs', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-22 09:30:00', 'ROOM1', 1, 'A5', 17, 20),
(8, 'Kung Fu Panda 3', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-02-22 09:30:00', 'ROOM1', 1, 'B3', 17, 15),
(9, 'The Mermaid', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-29 09:30:00', 'ROOM1', 1, 'A3 B5', 17, 50),
(10, 'Steve Jobs', 'Cinema2', 'Yorkdale Shopping Centre, 3401 Dufferin Street , c/o Yorkdale Shopping Centre, Toronto, ON, M6A 2T9', '2016-04-29 13:30:00', 'ROOM1', 3, 'B1 B2', 18, 40),
(11, 'Deadpool', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-30 13:30:00', 'ROOM1', 1, 'B1 B2', 18, 28),
(12, 'The Revenant', 'Cinema2', 'Yorkdale Shopping Centre, 3401 Dufferin Street , c/o Yorkdale Shopping Centre, Toronto, ON, M6A 2T9', '2016-04-30 15:30:00', 'ROOM2', 4, 'A5', 19, 15),
(13, 'Deadpool', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-30 13:30:00', 'ROOM1', 1, 'A4 A5', 20, 28),
(14, 'Mr. Six', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-29 09:30:00', 'ROOM2', 2, 'B1', 21, 33.9),
(15, 'Steve Jobs', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-22 12:30:00', 'ROOM1', 1, 'B2', 23, 22.6),
(16, 'Steve Jobs', 'Cinema2', 'Yorkdale Shopping Centre, 3401 Dufferin Street , c/o Yorkdale Shopping Centre, Toronto, ON, M6A 2T9', '2016-04-29 09:30:00', 'ROOM1', 3, 'B1', 24, 22.6),
(17, 'Kung Fu Panda 3', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-02-22 09:30:00', 'ROOM1', 1, 'B2', 24, 16.95),
(18, 'Steve Jobs', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-22 09:30:00', 'ROOM1', 1, 'A1', 24, 22.6),
(19, 'Deadpool', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-30 19:35:00', 'ROOM1', 1, 'A5', 24, 15.82);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `Room_ID` int(11) NOT NULL,
  `Room_Name` varchar(255) NOT NULL,
  `Cinema_ID` int(11) NOT NULL,
  `available` char(1) DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`Room_ID`, `Room_Name`, `Cinema_ID`, `available`) VALUES
(1, 'ROOM1', 1, 'Y'),
(2, 'ROOM2', 1, 'Y'),
(3, 'ROOM1', 2, 'Y'),
(4, 'ROOM2', 2, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `running_films`
--

DROP TABLE IF EXISTS `running_films`;
CREATE TABLE `running_films` (
  `Room_ID` int(11) NOT NULL,
  `Run_Time` datetime NOT NULL,
  `Film_Id` int(11) NOT NULL,
  `RVST` date NOT NULL,
  `RVET` date NOT NULL,
  `RUNATTIME` date DEFAULT NULL,
  `Avaliable` char(1) DEFAULT 'Y',
  `running_films_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `running_films`
--

INSERT INTO `running_films` (`Room_ID`, `Run_Time`, `Film_Id`, `RVST`, `RVET`, `RUNATTIME`, `Avaliable`, `running_films_id`) VALUES
(1, '2016-02-22 09:30:00', 2, '2016-02-11', '2016-02-18', '2016-02-22', 'Y', 1),
(1, '2016-04-30 09:30:00', 1, '2016-02-03', '2016-03-10', '2016-04-30', 'Y', 2),
(2, '2016-04-30 09:30:00', 3, '2016-02-03', '2016-02-10', '2016-02-20', 'Y', 3),
(1, '2016-04-30 13:30:00', 1, '2016-02-01', '2016-02-01', '2016-02-11', 'Y', 4),
(1, '2016-04-30 19:35:00', 1, '2016-02-01', '2016-02-09', '2016-02-02', 'Y', 7),
(2, '2016-04-30 13:30:00', 3, '2016-03-10', '2016-02-09', '2016-04-30', 'Y', 8),
(2, '2016-04-30 19:30:00', 3, '2016-04-11', '2016-04-14', '2016-04-30', 'Y', 10),
(3, '2016-04-30 09:30:00', 4, '2016-04-30', '2016-03-25', '2016-04-30', 'Y', 11),
(3, '2016-04-30 13:30:00', 4, '2016-03-10', '2016-03-24', '2016-04-30', 'Y', 12),
(3, '2016-04-30 19:30:00', 4, '2016-04-22', '2016-04-22', '2016-04-30', 'Y', 13),
(4, '2016-04-30 09:00:00', 5, '2016-03-24', '2016-04-30', '2016-04-30', 'Y', 14),
(4, '2016-04-30 15:30:00', 5, '2016-04-30', '2016-04-30', '2016-04-30', 'Y', 15),
(4, '2016-04-30 19:30:00', 5, '2016-03-31', '2016-04-24', '2016-04-30', 'Y', 16),
(1, '2016-04-22 12:30:00', 3, '2016-04-22', '2016-04-28', '2016-04-22', 'Y', 17),
(1, '2016-04-22 09:30:00', 3, '2016-04-20', '2016-04-22', '2016-04-22', 'Y', 18),
(3, '2016-04-22 09:30:00', 4, '2016-04-10', '2016-04-20', '2016-04-22', 'Y', 19),
(3, '2016-04-22 13:30:00', 4, '2016-04-15', '2016-04-22', '2016-04-22', 'Y', 20),
(3, '2016-04-29 09:30:00', 3, '2016-03-19', '2016-04-15', '2016-04-29', 'Y', 24),
(3, '2016-04-29 13:30:00', 3, '2016-04-14', '2016-03-22', '2016-04-29', 'Y', 25),
(1, '2016-04-29 09:30:00', 6, '2016-04-23', '2016-04-29', '2016-04-29', 'Y', 28),
(2, '2016-04-29 09:30:00', 7, '2016-04-23', '2016-04-29', '2016-04-29', 'Y', 29);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

DROP TABLE IF EXISTS `seats`;
CREATE TABLE `seats` (
  `Seat_ID` int(11) NOT NULL,
  `Room_ID` int(11) NOT NULL,
  `Seat_Name` varchar(255) DEFAULT NULL,
  `available` char(1) DEFAULT 'Y',
  `Run_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`Seat_ID`, `Room_ID`, `Seat_Name`, `available`, `Run_Time`) VALUES
(1, 1, 'A1', 'Y', '2016-04-30 09:30:00'),
(2, 1, 'A2', 'N', '2016-04-30 09:30:00'),
(3, 2, 'A1', 'Y', '2016-04-30 09:30:00'),
(4, 2, 'A2', 'Y', '2016-04-30 09:30:00'),
(5, 1, 'A3', 'Y', '2016-04-30 09:30:00'),
(6, 1, 'A4', 'N', '2016-04-30 09:30:00'),
(7, 1, 'A5', 'N', '2016-04-30 09:30:00'),
(8, 1, 'B1', 'Y', '2016-04-30 09:30:00'),
(9, 1, 'B2', 'N', '2016-04-30 09:30:00'),
(10, 1, 'B3', 'N', '2016-04-30 09:30:00'),
(11, 1, 'B4', 'N', '2016-04-30 09:30:00'),
(12, 1, 'B5', 'Y', '2016-04-30 09:30:00'),
(13, 2, 'A5', 'Y', '2016-04-30 09:30:00'),
(14, 2, 'B1', 'Y', '2016-04-30 09:30:00'),
(15, 2, 'B2', 'Y', '2016-04-30 09:30:00'),
(16, 2, 'B3', 'Y', '2016-04-30 09:30:00'),
(17, 2, 'B4', 'N', '2016-04-30 09:30:00'),
(18, 2, 'A3', 'Y', '2016-04-30 09:30:00'),
(19, 2, 'A4', 'Y', '2016-04-30 09:30:00'),
(20, 2, 'B5', 'Y', '2016-04-30 09:30:00'),
(21, 3, 'A1', 'N', '2016-04-30 09:30:00'),
(22, 3, 'A2', 'N', '2016-04-30 09:30:00'),
(23, 3, 'A3', 'N', '2016-04-30 09:30:00'),
(24, 3, 'A4', 'N', '2016-04-30 09:30:00'),
(25, 3, 'A5', 'Y', '2016-04-30 09:30:00'),
(26, 3, 'B1', 'Y', '2016-04-30 09:30:00'),
(27, 3, 'B2', 'Y', '2016-04-30 09:30:00'),
(28, 3, 'B3', 'Y', '2016-04-30 09:30:00'),
(29, 3, 'B4', 'Y', '2016-04-30 09:30:00'),
(30, 3, 'B5', 'Y', '2016-04-30 09:30:00'),
(31, 4, 'A1', 'Y', '2016-04-30 09:00:00'),
(32, 4, 'A2', 'N', '2016-04-30 09:00:00'),
(33, 4, 'A3', 'Y', '2016-04-30 09:00:00'),
(34, 4, 'A4', 'Y', '2016-04-30 09:00:00'),
(35, 4, 'A5', 'N', '2016-04-30 09:00:00'),
(36, 4, 'B1', 'Y', '2016-04-30 09:00:00'),
(37, 4, 'B2', 'Y', '2016-04-30 09:00:00'),
(38, 4, 'B3', 'Y', '2016-04-30 09:00:00'),
(39, 4, 'B4', 'Y', '2016-04-30 09:00:00'),
(40, 4, 'B5', 'Y', '2016-04-30 09:00:00'),
(41, 1, 'A1', 'Y', '2016-02-22 09:30:00'),
(42, 1, 'A2', 'N', '2016-02-22 09:30:00'),
(43, 1, 'A3', 'N', '2016-02-22 09:30:00'),
(44, 1, 'A4', 'N', '2016-02-22 09:30:00'),
(45, 1, 'A5', 'N', '2016-02-22 09:30:00'),
(46, 1, 'B1', 'N', '2016-02-22 09:30:00'),
(47, 1, 'B2', 'N', '2016-02-22 09:30:00'),
(48, 1, 'B3', 'N', '2016-02-22 09:30:00'),
(49, 1, 'B4', 'N', '2016-02-22 09:30:00'),
(50, 1, 'B5', 'N', '2016-02-22 09:30:00'),
(51, 1, 'A1', 'N', '2016-04-30 13:30:00'),
(52, 1, 'A2', 'N', '2016-04-30 13:30:00'),
(53, 1, 'A3', 'Y', '2016-04-30 13:30:00'),
(54, 1, 'A4', 'N', '2016-04-30 13:30:00'),
(55, 1, 'A5', 'N', '2016-04-30 13:30:00'),
(56, 1, 'B1', 'N', '2016-04-30 13:30:00'),
(57, 1, 'B2', 'N', '2016-04-30 13:30:00'),
(58, 1, 'B3', 'Y', '2016-04-30 13:30:00'),
(59, 1, 'B4', 'Y', '2016-04-30 13:30:00'),
(60, 1, 'B5', 'Y', '2016-04-30 13:30:00'),
(61, 1, 'A1', 'Y', '2016-04-30 19:35:00'),
(62, 1, 'A2', 'Y', '2016-04-30 19:35:00'),
(63, 1, 'A3', 'Y', '2016-04-30 19:35:00'),
(64, 1, 'A4', 'Y', '2016-04-30 19:35:00'),
(65, 1, 'A5', 'N', '2016-04-30 19:35:00'),
(66, 1, 'B1', 'Y', '2016-04-30 19:35:00'),
(67, 1, 'B2', 'Y', '2016-04-30 19:35:00'),
(68, 1, 'B3', 'Y', '2016-04-30 19:35:00'),
(69, 1, 'B4', 'Y', '2016-04-30 19:35:00'),
(70, 1, 'B5', 'Y', '2016-04-30 19:35:00'),
(71, 1, 'A1', 'Y', '2016-04-22 12:30:00'),
(72, 1, 'A2', 'N', '2016-04-22 12:30:00'),
(73, 1, 'A3', 'N', '2016-04-22 12:30:00'),
(74, 1, 'A4', 'N', '2016-04-22 12:30:00'),
(75, 1, 'A5', 'N', '2016-04-22 12:30:00'),
(76, 1, 'B1', 'N', '2016-04-22 12:30:00'),
(77, 1, 'B2', 'N', '2016-04-22 12:30:00'),
(78, 1, 'B3', 'N', '2016-04-22 12:30:00'),
(79, 1, 'B4', 'N', '2016-04-22 12:30:00'),
(80, 1, 'B5', 'N', '2016-04-22 12:30:00'),
(81, 1, 'A1', 'N', '2016-04-22 09:30:00'),
(82, 1, 'A2', 'N', '2016-04-22 09:30:00'),
(83, 1, 'A3', 'N', '2016-04-22 09:30:00'),
(84, 1, 'A4', 'N', '2016-04-22 09:30:00'),
(85, 1, 'A5', 'N', '2016-04-22 09:30:00'),
(86, 1, 'B1', 'N', '2016-04-22 09:30:00'),
(87, 1, 'B2', 'N', '2016-04-22 09:30:00'),
(88, 1, 'B3', 'Y', '2016-04-22 09:30:00'),
(89, 1, 'B4', 'N', '2016-04-22 09:30:00'),
(90, 1, 'B5', 'Y', '2016-04-22 09:30:00'),
(91, 2, 'A1', 'Y', '2016-04-30 13:30:00'),
(92, 2, 'A2', 'Y', '2016-04-30 13:30:00'),
(93, 2, 'A3', 'Y', '2016-04-30 13:30:00'),
(94, 2, 'A4', 'Y', '2016-04-30 13:30:00'),
(95, 2, 'A5', 'Y', '2016-04-30 13:30:00'),
(96, 2, 'B1', 'Y', '2016-04-30 13:30:00'),
(97, 2, 'B2', 'Y', '2016-04-30 13:30:00'),
(98, 2, 'B3', 'Y', '2016-04-30 13:30:00'),
(99, 2, 'B4', 'Y', '2016-04-30 13:30:00'),
(100, 2, 'B5', 'Y', '2016-04-30 13:30:00'),
(101, 2, 'A1', 'Y', '2016-04-30 19:30:00'),
(102, 2, 'A2', 'Y', '2016-04-30 19:30:00'),
(103, 2, 'A3', 'Y', '2016-04-30 19:30:00'),
(104, 2, 'A4', 'Y', '2016-04-30 19:30:00'),
(105, 2, 'A5', 'Y', '2016-04-30 19:30:00'),
(106, 2, 'B1', 'Y', '2016-04-30 19:30:00'),
(107, 2, 'B2', 'Y', '2016-04-30 19:30:00'),
(108, 2, 'B3', 'Y', '2016-04-30 19:30:00'),
(109, 2, 'B4', 'Y', '2016-04-30 19:30:00'),
(110, 2, 'B5', 'Y', '2016-04-30 19:30:00'),
(111, 3, 'A1', 'Y', '2016-04-30 13:30:00'),
(112, 3, 'A2', 'Y', '2016-04-30 13:30:00'),
(113, 3, 'A3', 'Y', '2016-04-30 13:30:00'),
(114, 3, 'A4', 'Y', '2016-04-30 13:30:00'),
(115, 3, 'A5', 'Y', '2016-04-30 13:30:00'),
(116, 3, 'B1', 'Y', '2016-04-30 13:30:00'),
(117, 3, 'B2', 'Y', '2016-04-30 13:30:00'),
(118, 3, 'B3', 'Y', '2016-04-30 13:30:00'),
(119, 3, 'B4', 'Y', '2016-04-30 13:30:00'),
(120, 3, 'B5', 'Y', '2016-04-30 13:30:00'),
(121, 3, 'A1', 'Y', '2016-04-30 19:30:00'),
(122, 3, 'A2', 'Y', '2016-04-30 19:30:00'),
(123, 3, 'A3', 'Y', '2016-04-30 19:30:00'),
(124, 3, 'A4', 'Y', '2016-04-30 19:30:00'),
(125, 3, 'A5', 'Y', '2016-04-30 19:30:00'),
(126, 3, 'B1', 'Y', '2016-04-30 19:30:00'),
(127, 3, 'B2', 'Y', '2016-04-30 19:30:00'),
(128, 3, 'B3', 'Y', '2016-04-30 19:30:00'),
(129, 3, 'B4', 'Y', '2016-04-30 19:30:00'),
(130, 3, 'B5', 'Y', '2016-04-30 19:30:00'),
(131, 3, 'A1', 'Y', '2016-04-22 09:30:00'),
(132, 3, 'A2', 'Y', '2016-04-22 09:30:00'),
(133, 3, 'A3', 'Y', '2016-04-22 09:30:00'),
(134, 3, 'A4', 'Y', '2016-04-22 09:30:00'),
(135, 3, 'A5', 'Y', '2016-04-22 09:30:00'),
(136, 3, 'B1', 'Y', '2016-04-22 09:30:00'),
(137, 3, 'B2', 'Y', '2016-04-22 09:30:00'),
(138, 3, 'B3', 'N', '2016-04-22 09:30:00'),
(139, 3, 'B4', 'N', '2016-04-22 09:30:00'),
(140, 3, 'B5', 'N', '2016-04-22 09:30:00'),
(141, 3, 'A1', 'N', '2016-04-22 13:30:00'),
(142, 3, 'A2', 'Y', '2016-04-22 13:30:00'),
(143, 3, 'A3', 'Y', '2016-04-22 13:30:00'),
(144, 3, 'A4', 'Y', '2016-04-22 13:30:00'),
(145, 3, 'A5', 'Y', '2016-04-22 13:30:00'),
(146, 3, 'B1', 'N', '2016-04-22 13:30:00'),
(147, 3, 'B2', 'N', '2016-04-22 13:30:00'),
(148, 3, 'B3', 'Y', '2016-04-22 13:30:00'),
(149, 3, 'B4', 'Y', '2016-04-22 13:30:00'),
(150, 3, 'B5', 'Y', '2016-04-22 13:30:00'),
(151, 3, 'A1', 'Y', '2016-04-29 09:30:00'),
(152, 3, 'A2', 'N', '2016-04-29 09:30:00'),
(153, 3, 'A3', 'Y', '2016-04-29 09:30:00'),
(154, 3, 'A4', 'Y', '2016-04-29 09:30:00'),
(155, 3, 'A5', 'N', '2016-04-29 09:30:00'),
(156, 3, 'B1', 'N', '2016-04-29 09:30:00'),
(157, 3, 'B2', 'Y', '2016-04-29 09:30:00'),
(158, 3, 'B3', 'N', '2016-04-29 09:30:00'),
(159, 3, 'B4', 'Y', '2016-04-29 09:30:00'),
(160, 3, 'B5', 'N', '2016-04-29 09:30:00'),
(161, 3, 'A1', 'N', '2016-04-29 13:30:00'),
(162, 3, 'A2', 'Y', '2016-04-29 13:30:00'),
(163, 3, 'A3', 'N', '2016-04-29 13:30:00'),
(164, 3, 'A4', 'N', '2016-04-29 13:30:00'),
(165, 3, 'A5', 'Y', '2016-04-29 13:30:00'),
(166, 3, 'B1', 'N', '2016-04-29 13:30:00'),
(167, 3, 'B2', 'N', '2016-04-29 13:30:00'),
(168, 3, 'B3', 'Y', '2016-04-29 13:30:00'),
(169, 3, 'B4', 'N', '2016-04-29 13:30:00'),
(170, 3, 'B5', 'Y', '2016-04-29 13:30:00'),
(171, 4, 'A1', 'Y', '2016-04-30 15:30:00'),
(172, 4, 'A2', 'Y', '2016-04-30 15:30:00'),
(173, 4, 'A3', 'Y', '2016-04-30 15:30:00'),
(174, 4, 'A4', 'Y', '2016-04-30 15:30:00'),
(175, 4, 'A5', 'N', '2016-04-30 15:30:00'),
(176, 4, 'B1', 'Y', '2016-04-30 15:30:00'),
(177, 4, 'B2', 'Y', '2016-04-30 15:30:00'),
(178, 4, 'B3', 'Y', '2016-04-30 15:30:00'),
(179, 4, 'B4', 'N', '2016-04-30 15:30:00'),
(180, 4, 'B5', 'Y', '2016-04-30 15:30:00'),
(181, 4, 'A1', 'Y', '2016-04-30 19:30:00'),
(182, 4, 'A2', 'Y', '2016-04-30 19:30:00'),
(183, 4, 'A3', 'Y', '2016-04-30 19:30:00'),
(184, 4, 'A4', 'Y', '2016-04-30 19:30:00'),
(185, 4, 'A5', 'Y', '2016-04-30 19:30:00'),
(186, 4, 'B1', 'Y', '2016-04-30 19:30:00'),
(187, 4, 'B2', 'Y', '2016-04-30 19:30:00'),
(188, 4, 'B3', 'Y', '2016-04-30 19:30:00'),
(189, 4, 'B4', 'Y', '2016-04-30 19:30:00'),
(190, 4, 'B5', 'Y', '2016-04-30 19:30:00'),
(191, 1, 'A1', 'N', '2016-04-29 09:30:00'),
(192, 1, 'A2', 'N', '2016-04-29 09:30:00'),
(193, 1, 'A3', 'N', '2016-04-29 09:30:00'),
(194, 1, 'A4', 'N', '2016-04-29 09:30:00'),
(195, 1, 'A5', 'N', '2016-04-29 09:30:00'),
(196, 1, 'B1', 'N', '2016-04-29 09:30:00'),
(197, 1, 'B2', 'N', '2016-04-29 09:30:00'),
(198, 1, 'B3', 'N', '2016-04-29 09:30:00'),
(199, 1, 'B4', 'N', '2016-04-29 09:30:00'),
(200, 1, 'B5', 'N', '2016-04-29 09:30:00'),
(201, 2, 'A1', 'Y', '2016-04-29 09:30:00'),
(202, 2, 'A2', 'Y', '2016-04-29 09:30:00'),
(203, 2, 'A3', 'Y', '2016-04-29 09:30:00'),
(204, 2, 'A4', 'Y', '2016-04-29 09:30:00'),
(205, 2, 'A5', 'Y', '2016-04-29 09:30:00'),
(206, 2, 'B1', 'N', '2016-04-29 09:30:00'),
(207, 2, 'B2', 'Y', '2016-04-29 09:30:00'),
(208, 2, 'B3', 'Y', '2016-04-29 09:30:00'),
(209, 2, 'B4', 'Y', '2016-04-29 09:30:00'),
(210, 2, 'B5', 'Y', '2016-04-29 09:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE `terms` (
  `terms_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`terms_id`, `title`, `info`) VALUES
(1, 'Definitions', 'Definitions.txt'),
(2, 'Purchasing tickets online', 'PurchasingOnline.txt'),
(3, 'Booking of Tickets', 'BookingTickets.txt'),
(4, 'Cancellation of tickets', 'CancellationTickets.txt'),
(5, 'General Conditions', 'GeneralCanditions.txt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`Cinema_ID`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`Film_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`),
  ADD KEY `Customer_Id` (`Customer_Id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`Reservation_Id`),
  ADD KEY `reservations_ibfk_2` (`Order_Id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`Room_ID`),
  ADD UNIQUE KEY `Room_Name` (`Room_Name`,`Cinema_ID`),
  ADD KEY `Cinema_ID` (`Cinema_ID`);

--
-- Indexes for table `running_films`
--
ALTER TABLE `running_films`
  ADD PRIMARY KEY (`running_films_id`),
  ADD UNIQUE KEY `Room_ID` (`Room_ID`,`Run_Time`),
  ADD KEY `fk_films` (`Film_Id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`Seat_ID`),
  ADD UNIQUE KEY `uc_seat` (`Room_ID`,`Seat_Name`,`Run_Time`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`terms_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `Cinema_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `Film_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `Reservation_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `Room_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `running_films`
--
ALTER TABLE `running_films`
  MODIFY `running_films_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `Seat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `terms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`Order_Id`) REFERENCES `orders` (`Order_Id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`Cinema_ID`) REFERENCES `cinemas` (`Cinema_ID`);

--
-- Constraints for table `running_films`
--
ALTER TABLE `running_films`
  ADD CONSTRAINT `fk_films` FOREIGN KEY (`Film_Id`) REFERENCES `films` (`Film_Id`),
  ADD CONSTRAINT `running_films_ibfk_1` FOREIGN KEY (`Room_ID`) REFERENCES `rooms` (`Room_ID`);

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`Room_ID`) REFERENCES `rooms` (`Room_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
