-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2016 at 07:05 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `password` char(20) NOT NULL,
  `qq` char(20) NOT NULL,
  `tel` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `qq`, `tel`) VALUES
(2, 'admin', 'admin', '21342352', '23453453');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `phone`, `email`, `address`, `message`) VALUES
(14, 'bin', 647, 's08150br@gmail.com', 'sasasas', 'How was your feeling?\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `hiring`
--

CREATE TABLE `hiring` (
  `id` int(20) NOT NULL,
  `hiretime` int(100) NOT NULL,
  `hirenumber` int(10) NOT NULL,
  `hirerequirement` varchar(255) NOT NULL,
  `jobtitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hiring`
--

INSERT INTO `hiring` (`id`, `hiretime`, `hirenumber`, `hirerequirement`, `jobtitle`) VALUES
(1, 0, 12, 'dsads', 'qwewq'),
(2, 1, 12, 'eqweqe', 'asdasd'),
(3, 0, 12, 'wqdqsd', 'qwewq'),
(10, 0, 0, 'qwrwerrr', 'wqeqw'),
(11, 0, 34, 'eqwrw', 'qwe'),
(18, 2147483647, 2147483647, '1111111111111111111111111111111', '22222222222222222'),
(22, 0, 0, 'efef', 'webdev'),
(23, 0, 0, 'efef', 'webdev'),
(36, 0, 2147483647, 'fwef', 'xxxxxxxxxxxxxxxxxxxxxx'),
(37, 0, 2147483647, 'fwef', 'xxxxxxxxxxxxxxxxxxxxxx'),
(38, 0, 0, 'efewf', 'fewfew'),
(39, 0, 0, 'rg', 'bin'),
(40, 0, 0, 'rg', 'bin'),
(41, 0, 0, '', ''),
(42, 0, 0, '', ''),
(43, 0, 0, 'fbd', 'fgbfd'),
(44, 0, 0, 'fbd', 'fgbfd'),
(45, 34, 324, '324', '32444444444444444444444444'),
(46, 34, 324, '324', '32444444444444444444444444'),
(47, 0, 0, '', ''),
(48, 0, 0, '', ''),
(49, 9, 90, '90-', '0-'),
(50, 9, 90, '90-', '0-'),
(51, 0, 0, 'sad', 'cxzd'),
(52, 0, 0, 'sad', 'cxzd'),
(53, 0, 9, '0-', '90-'),
(55, 0, 0, '', ''),
(56, 0, 0, '', ''),
(57, 0, 0, '', ''),
(58, 0, 0, '', ''),
(59, 324, 324, '342', '32444444444444444444444444324'),
(60, 324, 324, '342', '32444444444444444444444444324'),
(61, 0, 0, '', ''),
(62, 0, 0, '', ''),
(63, 0, 0, '', ''),
(64, 0, 0, '', ''),
(65, 0, 0, '', ''),
(66, 0, 0, '', ''),
(67, 0, 0, '', ''),
(68, 0, 0, '', ''),
(69, 0, 0, '', ''),
(70, 0, 0, '', ''),
(83, 0, 4, '	\r\n1.Ensure technical feasibility of UI/UX designs\r\n\r\n2.Strong understanding of communications, marketing, and customer service principles\r\n\r\n3.Digital Advertising experience a major asset\r\n\r\n4.Excellent understanding of web markup', 'Web developer'),
(84, 9, 10, '	\r\nOutstanding customer service and communication skills\r\n\r\nValid Drivers License Class C or E\r\n\r\n$3000+', 'Delverymanï¼ˆFulltimeï¼‰'),
(85, 9, 10, 'Good verbal communication skills in English â€“ additional language skills considered an asset\r\n\r\nA wonderful smile and great attitude working with a team', ' Cashierï¼ˆPart timeï¼‰'),
(86, 9, 2, 'Must maintain knowledge of current digital best practices and technologyã€‚\r\n\r\nExcellent critical thinking, problem solving, and analytic skills are necessary\r\n\r\nStrong organizational skills\r\n\r\nDetail oriented', 'Wen designerï¼ˆFull timeï¼‰'),
(87, 9, 10, 'Must maintain knowledge of current digital best practices and technologyã€‚\r\n\r\nExcellent critical thinking, problem solving, and analytic skills are necessary\r\n\r\nStrong organizational skills\r\n\r\nDetail oriented', 'Cashierï¼ˆPart timeï¼‰'),
(88, 0, 5, 'kind', 'Sever'),
(89, 0, 0, '', ''),
(90, 2, 1, '3', 'cao cesup'),
(91, 0, 1, '1', 'wc');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `hunfou` varchar(10) NOT NULL,
  `birthday` int(20) NOT NULL,
  `education` varchar(100) NOT NULL,
  `graduation` varchar(100) NOT NULL,
  `biyeschool` varchar(100) NOT NULL,
  `tel` int(20) NOT NULL,
  `xiandxi` varchar(200) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `name`, `sex`, `hunfou`, `birthday`, `education`, `graduation`, `biyeschool`, `tel`, `xiandxi`, `mark`) VALUES
(132, 'bbbbbbbbee', 'Male', 'Married', 0, '', '', '', 0, '', 0),
(133, '', 'Male', 'Married', 0, '', '', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(20) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `answer3` varchar(255) NOT NULL,
  `answer4` varchar(255) NOT NULL,
  `mark` int(100) NOT NULL,
  `rights` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `mark`, `rights`, `name`) VALUES
(19, '232vvv', 'function randomize($parm1 = 5, $&parm2) {', 'function randomize($parm1, $parm2 = 5) {', 'function randomize($parm1 = 5, $parm2) {', 'function randomize($&parm1, $parm2 = 5) {', 0, '23', 'bbbbbbbbbbbbbbbbbb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiring`
--
ALTER TABLE `hiring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `hiring`
--
ALTER TABLE `hiring`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
