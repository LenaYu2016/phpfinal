-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2016 at 12:39 AM
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
(19, '232vvv', 'function randomize($parm1 = 5, $&parm2) {', 'function randomize($parm1, $parm2 = 5) {', 'function randomize($parm1 = 5, $parm2) {', 'function randomize($&parm1, $parm2 = 5) {', 0, '23', 'bbbbbbbbbbbbbbbbbb'),
(20, 'bbb', 'function randomize($parm1 = 5, $&parm2) {', 'function randomize($parm1, $parm2 = 5) {', 'function randomize($parm1 = 5, $parm2) {', '4', 0, '23', '111111111111111111'),
(21, 'nhgh', 'bin', 'function randomize($parm1, $parm2 = 5) {', 'sungiel', 'zhaoyi', 0, '23', 'bin'),
(22, '21451', 'function randomize($parm1 = 5, $&parm2) {', 'function randomize($parm1, $parm2 = 5) {', 'function randomize($parm1 = 5, $parm2) {', 'function randomize($&parm1, $parm2 = 5) {', 0, '23', 'gtg5'),
(23, 'bbb', 'function randomize($parm1 = 5, $&parm2) {', 'lena', 'function randomize($parm1 = 5, $parm2) {', 'function randomize($&parm1, $parm2 = 5) {', 4, '54', 'xxxx'),
(24, 'dfdsf', 'function randomize($parm1 = 5, $&parm2) {', 'lena', '4', 'function randomize($&parm1, $parm2 = 5) {', 0, '43', 'xxxx'),
(25, 'ddgg', 'function randomize($parm1 = 5, $&parm2) {', 'lena', 'function randomize($parm1 = 5, $parm2) {', 'zhaoyi', 0, '43', 'ddg'),
(26, 'dfs', 'bin', 'function randomize($parm1, $parm2 = 5) {', 'sungiel', 'function randomize($&parm1, $parm2 = 5) {', 4, '23', 'cccccccccccccc'),
(27, 'wddddd', 'function randomize($parm1 = 5, $&parm2) {', 'lena', 'function randomize($parm1 = 5, $parm2) {', 'function randomize($&parm1, $parm2 = 5) {', 0, '66', '111111111111111111'),
(28, '232vvv', 'function randomize($parm1 = 5, $&parm2) {', '3432', '4', 'function randomize($&parm1, $parm2 = 5) {', 0, '66', 'milk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
